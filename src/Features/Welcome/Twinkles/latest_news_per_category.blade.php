@inject('carbon', 'Illuminate\Support\Carbon')

<section class="section tab-post mb-16">
    <div class="title-wrap title-wrap--line">
        <h3 class="section-title">Popular Categories</h3>
        <div class="tabs tab-post__tabs">
            <ul class="tabs__list">
                @twinkle('categories_navbar', ['categories' => $categories])
            </ul>
            <!-- end tabs -->
        </div>
    </div>
    <!-- tab content -->
    <div class="tabs__content tabs__content-trigger tab-post__tabs-content">
        @foreach($articles as $key => $category)
            @if($loop->first)
                <div class="tabs__content-pane tabs__content-pane--active" id="tab-{{ kebab_case($key) }}">
            @else
                <div class="tabs__content-pane" id="tab-{{ kebab_case($key) }}">
            @endif

            @foreach($category as $article)
            <article class="entry card post-list">
                <div class="entry__img-holder post-list__img-holder card__img-holder" style="background-image: url(images/401/242/{{ optional($article->thumbnail)->hash }}/center)">
                    <a href="{{ $article->url }}" target='_blank' class="thumb-url"></a>
                    <img src="images/401/242/{{ optional($article->thumbnail)->hash }}/center" alt="" class="entry__img d-none">
                    <a href="#" class="entry__meta-category entry__meta-category--label entry__meta-category--align-in-corner entry__meta-category--blue">{{ $article->category }}</a>
                </div>
                <div class="entry__body post-list__body card__body">
                    <div class="entry__header">
                        <h2 class="entry__title">
                            <a href="{{ $article->url }}" target='_blank'>{{ $article->title }}</a>
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
                        <p>{{ substr(strip_tags($article->subtitle),0,100) }} [...]</p>
                    </div>
                </div>
            </article>
            @endforeach
            </div>
        @endforeach
    </div>
</section>
