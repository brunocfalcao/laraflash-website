<?php

namespace Laraflash\Website\Features\Welcome\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;
use Laraflash\DAL\Models\Article;
use Laraflash\DAL\Models\Newsletter;
use Laraflash\DAL\Models\CategoryMap;
use Laraflash\DAL\Models\CategoryPosition;

class FeatureController extends Controller
{
    public function __construct()
    {
        $this->middleware('throttle:10,1')->only('registerNewsletter');
    }

    public function index()
    {
        if (is_null(request()->input('q'))) {
            $universe = function () {
                return Article::query();
            };
        };

        // Random articles from last 30 days.
        if (request()->input('q') == 1) {
            $universe = function () {
                return Article::where('posted_at', '>', now()->subMonth(1))
                                           ->orderByRaw('rand()');
            };
        };

        // Random articles from last 60 days.
        if (request()->input('q') == 2) {
            $universe = function () {
                return Article::where('posted_at', '>', now()->subMonth(2))
                                           ->orderByRaw('rand()');
            };
        };

        // Random articles.
        if (request()->input('q') == 99) {
            $universe = function () {
                return Article::orderByRaw('rand()');
            };
        };

        // Featured articles -- Latest 4 not tweets.
        $featured = $universe()->where('type', '<>', 'tweet')
                               //->whereNotNull('thumbnail_id')
                               ->newest()
                               ->take(4)
                               ->get();

        // No articles?
        if ($featured->count() == 0) {
            return flame()->with('total', 0);
        }

        // Create a new articles universe for the categories navbar and category squares.
        $universeWithoutFeatured = function () use ($universe, $featured) {
            return $universe()->whereNotIn('id', $featured->pluck('id'));
        };

        // Newsflash -- Latest 10 articles, without the ones from the featured articles.
        $newsflash = $universeWithoutFeatured()->where('type', '<>', 'tweet')
                                             ->newest()
                                             ->take(10)
                                             ->get()
                                             ->shuffle();

        // Get categories ordered by position.
        $categories = CategoryPosition::whereIn('article_category', ['Blog', 'Tutorial', 'Podcast', 'Job', 'Package'])
                                      ->orderBy('navbar_position')
                                      ->get();

        // Auxiliary string, and array with the featured article ids to be used in a in() clause.
        $featuredIds = $featured->pluck('id')->map(function ($item) {
            return "'{$item}'";
        })->implode(',');
        $featuredIdsArray = $featured->pluck('id')->toArray();

        $articlesPerCategory = collect();
        $categories->each(function ($item, $key) use ($articlesPerCategory, $featuredIds, $featuredIdsArray) {
            // For each category, we need to retrieve the newest
            // "posted_at" 6 distict article source ids (without tweets)
            // and without the id's from the featured articles.
            $distinctDataSources = DB::select("select data_source_id,
                                                      max(posted_at) posted_at
                                                      from articles
                                                      where type <> 'tweet'
                                                      and category_mapped = '{$item->article_category}'
                                                      and id not in ({$featuredIds})
                                                      group by data_source_id
                                                      order by posted_at desc
                                                      limit 6");

            $categoryArticles = collect();
            // Grab each of those distinct data_source_id articles, and put them into an Article collection.
            collect($distinctDataSources)->each(function ($item) use ($categoryArticles, $featuredIdsArray) {
                $categoryArticles->push(Article::where('posted_at', $item->posted_at)
                                               ->where('data_source_id', $item->data_source_id)
                                               ->whereNotIn('id', $featuredIdsArray)
                                               ->orderBy('id', 'desc')
                                               ->first());
            });

            $categoryArticlesIds = $categoryArticles->pluck('id')
                                                    ->map(function ($item) {
                                                          return "'{$item}'";
                                                    });

            if ($categoryArticles->count() < 6) {
                // Add the remaining articles until they make 6 in total.
                // Grab the newest articles from this category that are not included
                // in the current ones, and not included in the featured items.
                // Doesn't matter the source id.
                $remainingCategoryArticles = Article::where('category_mapped', $item->article_category)
                                                    ->whereNotIn('id', $featuredIdsArray)
                                                    ->whereNotIn('id', $categoryArticlesIds)
                                                    ->newest()
                                                    ->take(6-$categoryArticles->count())
                                                    ->offset(1)
                                                    ->get();

                // Add remaining articles to the main category articles collection.
                $remainingCategoryArticles->each(function ($item) use ($categoryArticles) {
                    $categoryArticles->push($item);
                });
            };

            $articlesPerCategory->put($item->article_category, $categoryArticles);
        });

        // Latest influencer tweets, distinct data sources, random order.
        $dataSources = DB::select("select articles.*
                                   from (select data_source_id, max(posted_at) posted_at
                                         from articles
                                         where `type` = 'tweet'
                                         group by data_source_id limit 10) articles
                                   order by rand()");

        $tweets = collect();
        // Grab latest tweet per distinct data source.
        collect($dataSources)->each(function ($item, $key) use ($tweets, $universe) {
            $tweets->push(Article::with('dataSource')
                                 ->where('posted_at', $item->posted_at)
                                 ->where('data_source_id', $item->data_source_id)
                                 ->first());
        });

        // Category squares.
        // Grab all categories by the right sort order.
        $categoriesSquare = CategoryPosition::with('categoryMap')
                                            ->orderBy('square_position')
                                            ->get();

        // Grab the latest 5 articles per category, without being part of the featured neither the categories navbar items.
        $articlesCategorySquare = collect();
        $categoriesSquare->each(function ($item, $key) use ($articlesCategorySquare, $articlesPerCategory, $universe, $featured) {
            $articlesCategorySquare->put($item->article_category, $universe()->whereIn('category', CategoryMap::where('article_category', $item->article_category)
                                                                                                              ->get()
                                                                                                              ->pluck('feed_category'))
                                                                         ->whereNotIn('id', $this->safeIdsPerCategory($articlesPerCategory, $item->article_category))
                                                                         ->whereNotIn('id', $featured->pluck('id'))
                                                                         ->newest()
                                                                         ->take(5)
                                                                         ->get());
        });

        // Get total articles count.
        if (is_null(request()->input('q'))) {
            $count = DB::select(DB::raw('select count(1) as total from articles where deleted_at is null'));
            $articlesTotal = $count[0]->total;
        } else {
        // Get total articles count.
            $articlesTotal = $universe()->get()->count();
        }

        return flame()->with('newsflash', $newsflash)
                      ->with('featured', $featured)
                      ->with('categories', $categories)
                      ->with('articlesPerCategory', $articlesPerCategory)
                      ->with('tweets', $tweets)
                      ->with('message', $message ?? null)
                      ->with('total', $articlesTotal)
                      ->with('articlesCategoriesSquare', $articlesCategorySquare);
    }

    private function safeIdsPerCategory($items, $category)
    {
        if (array_key_exists($category, $items->toArray())) {
            return $items[$category]->pluck('id');
        }

        return [];
    }

    public function registerNewsletter()
    {
        Newsletter::create(['email' => request()->input('email')]);
        return flame('newsletter-done');
    }
}
