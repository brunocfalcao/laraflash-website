@inject('carbon', 'Illuminate\Support\Carbon')

<!-- Widget Popular Posts -->
<aside class="widget widget-popular-posts">
    <h4 class="widget-title">Latest Community Tweets</h4>
    <ul class="post-list-small">
        @foreach($tweets as $tweet)
        <li class="post-list-small__item">
            <article class="post-list-small__entry clearfix">
                <div class="post-list-small__img-holder">
                    <div class="thumb-container thumb-100">
                        <a href="{{ $tweet->dataSource->website_url }}" target="_blank">
                            <img data-src="images/88/88/{{ $tweet->thumbnail->hash }}/center" src="images/88/88/{{ optional($tweet->thumbnail)->hash }}/center" alt="" class="post-list-small__img--rounded lazyload">
                        </a>
                    </div>
                </div>
                <div class="post-list-small__body">
                    <h3 class="post-list-small__entry-title">
                        <a href="{{ $tweet->url }}" target="_blank">{{ $tweet->title }}</a>
                    </h3>
                    <ul class="entry__meta">
                        <li class="entry__meta-author">
                            <span>by</span>
                            <a href="{{ $tweet->dataSource->website_url }}">{{ $tweet->displayed_author }}</a>
                        </li>
                        <li class="entry__meta-date">
                            {{ $carbon::parse($tweet->posted_at)->format('M j, Y') }}
                        </li>
                    </ul>
                </div>
            </article>
        </li>
        @endforeach
    </ul>
</aside>