<?php

namespace Laraflash\Website\Controllers;

use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;
use Laraflash\DAL\Models\Article;
use Laraflash\DAL\Models\CategoryMap;

class WelcomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('throttle:20,1');
        $this->middleware('firewall-blacklist');
        $this->middleware('firewall-blockattacks');
    }

    public function index()
    {
        // Featured articles -- Latest 4 articles from distinct data sources, randomly.
        // Queries
        // select data_source_id, max(posted_at) from articles group by data_source_id order by posted_at desc limit 4;
        // select max(id) from articles where posted_at = '2018-06-20 21:05:00' and data_source_id = 16;
        // select max(id) from articles where posted_at = '2018-06-21 14:55:53' and data_source_id = 18;
        // select max(id) from articles where posted_at = '2018-06-20 15:32:00' and data_source_id = 10;
        // select max(id) from articles where posted_at = '2018-06-21 13:15:00' and data_source_id = 8;
        $featuredIds = collect(DB::select('select id from (select data_source_id, id, max(posted_at) newest from articles group by data_source_id) items order by items.newest desc limit 4'))
                                 ->pluck('id')
                                 ->toArray();

        $featured = Article::whereIn('id', $featuredIds)->newest()
                                                        ->take(4)
                                                        ->get()
                                                        ->shuffle();

        // Newsflash -- Latest 10 articles, from  without the ones from the featured articles.
        $newsflash = Article::newest()->take(10)
                                      ->get()
                                      ->shuffle();

        // Category rendering. Show all except Other, Package and Interview.
        // Get distinct mappings without other, package and interview.
        $categories = CategoryMap::all()->take(5);

        //dd($articlesPerCategory);

        // Get all distinct categories with timespan of 1 month
        // and grab the latest 8 articles per category.
        return View::make('laraflash::welcome')->with('featured', $featured)
                                               ->with('newsflash', $newsflash)
                                               ->with('categories', $categories);
    }
}
