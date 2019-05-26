<?php

namespace Laraflash\Website\Features\Search\Controllers;

use App\Http\Controllers\Controller;
use Laraflash\DAL\Models\Article;

class FeatureController extends Controller
{
    public function __construct()
    {
        $this->middleware('throttle:20,1');
    }

    public function search()
    {
        $search = request()->input('search');
        // Retrieve all the articles that have a title or description with that text.
        // No tweets.
        $articles = Article::where(function ($query) use ($search) {
                                $query->where('title', 'like', "%{$search}%")
                                      ->orWhere('subtitle', 'like', "%{$search}%");
        })
                           ->where('type', '<>', 'tweet')
                           ->newest()
                           ->paginate(10);

        $articles->withPath('search');

        return flame()->with('articles', $articles)
                      ->with('search', $search);
    }
}
