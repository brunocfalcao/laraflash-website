@extends('common::layout.default')

@if($total == 0)
    @section('additional.stylesheets')
    <link rel="stylesheet" href="css/sticky-footer.css" />
    @endsection

    @section('body')
    <div class="blog__content mb-72">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <h2>Sorry! No articles were found in the database.</h2>
                <p>.. maybe it's time to run a laraflash crawl :)</p>
            </div>
        </div>
    </div>
    @endsection
@else
    @section('newsflash')
        @twinkle('newsflash', ['newsflash' => $newsflash])
    @endsection

    @section('featured')
        @twinkle('featured_articles', ['featured' => $featured])
    @endsection

    @section('body')
        <!-- Content -->
        <div class="row">
            <!-- Posts -->
            <div class="col-lg-8 blog__content">
                <!-- Latest News -->
                @twinkle('latest_news_per_category', ['categories' => $categories, 'articles' => $articlesPerCategory])
            </div>
            <aside class="col-lg-4 sidebar sidebar--right">
                @twinkle('latest-tweets', ['tweets' => $tweets])
            </aside>
            <!-- end sidebar -->
        </div>
        <!-- end content -->
        <!-- Posts from categories -->
        <section class="section mb-0">
            <div class="row">
                @twinkle('category_squares', ['categories' => $articlesCategoriesSquare])
            </div>
        </section>
        <!-- end posts from categories -->
    @endsection
@endif