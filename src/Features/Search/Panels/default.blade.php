@inject('carbon', 'Illuminate\Support\Carbon')

@extends('common::layout.default')
@section('body')
<div class="row">
    <!-- Posts -->
    <div class="col-lg-9 blog__content mb-72">
        <h1 class="page-title">Search results for: {{ substr($search, 0, 20) }}</h1>
        @foreach($articles as $article)
        <article class="entry card post-list">
            <div class="entry__img-holder post-list__img-holder card__img-holder" style="background-image: url(images/401/241/{{ optional($article->thumbnail)->hash }}/left)">
                <a href="{{ $article->url }}" class="thumb-url"></a>
                <!--<img src="img/content/list/list_post_1.jpg" alt="" class="entry__img d-none">-->
                <a href="#" class="entry__meta-category entry__meta-category--label entry__meta-category--align-in-corner entry__meta-category--blue">{{ $article->category }}</a>
            </div>
            <div class="entry__body post-list__body card__body">
                <div class="entry__header">
                    <h2 class="entry__title">
                        <a href="{{ $article->url }}">{{ $article->title }}</a>
                    </h2>
                    <ul class="entry__meta">
                        <li class="entry__meta-author">
                            <span>by</span>
                            <a href="{{ $article->url_contributor }}">{{ $article->displayed_author }}</a>
                        </li>
                        <li class="entry__meta-date">
                            {{ $carbon::parse($article->posted_at)->format('M j, Y') }}
                        </li>
                    </ul>
                </div>
                <div class="entry__excerpt">
                    <p>{{ substr(strip_tags($article->subtitle),0,150) }} ...</p>
                </div>
            </div>
        </article>
        @endforeach
        <nav class="pagination">
        @for($i = 1; $i <= $articles->lastPage(); $i++)
            @if($i == $articles->currentPage())
                <span class="pagination__page pagination__page--current" href="#">{{ $i }}</span>
            @else
                <a href="{{ $articles->appends(['search' => $search])->url($i) }}" class="pagination__page">{{ $i }}</a>
            @endif
        @endfor
        </nav>
    </div>
</div>
@endsection
