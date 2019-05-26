@inject('carbon', 'Illuminate\Support\Carbon')

@foreach($categories as $key => $category)
@if($category->count() > 0)
<div class="col-md-6">
    <div class="title-wrap title-wrap--line">
        <h3 class="section-title">{{ str_plural($key) }}</h3>
    </div>
    <div class="row">
        @foreach($category as $article)
        @if($loop->first)
        <div class="col-lg-6">
            <article class="entry thumb thumb--size-2">
                <div class="entry__img-holder thumb__img-holder" style="background-image: url('images/282/298/{{ optional($article->thumbnail)->hash }}/center')">
                    <div class="bottom-gradient"></div>
                    <div class="thumb-text-holder thumb-text-holder--1">
                        <h2 class="thumb-entry-title">
                            <a href="{{ $article->url }}" target='_blank' style="color: white !important">{{ $article->title }}</a>
                        </h2>
                        <ul class="entry__meta">
                            <li class="entry__meta-author">
                                <span>by</span>
                                <a href="#">{{ $article->displayed_author }}</a>
                            </li>
                            <li class="entry__meta-date">
                                {{ $carbon::parse($article->posted_at)->format('M j, Y') }}
                            </li>
                        </ul>
                    </div>
                    <a href="{{ $article->url }}" target="_blank" class="thumb-url"></a>
                </div>
            </article>
        </div>
        <div class="col-lg-6">
            @else
            <ul class="post-list-small post-list-small--dividers post-list-small--arrows mb-24">
                <li class="post-list-small__item">
                    <article class="post-list-small__entry">
                        <div class="post-list-small__body">
                            <h3 class="post-list-small__entry-title">
                                <a href="{{ $article->url }}" target="_blank">{{ $article->title }}</a>
                            </h3>
                        </div>
                    </article>
                </li>
            </ul>
            @endif
        @endforeach
        </div>
    </div>
</div>
@endif
@endforeach