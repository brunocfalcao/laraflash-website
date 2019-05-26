@inject('carbon', 'Illuminate\Support\Carbon')

<!-- Featured Posts Grid -->
<section class="featured-posts-grid">
    <div class="container">
        <div class="row row-8">
            <div class="col-lg-6">
                <!-- Small post -->
                <div class="featured-posts-grid__item featured-posts-grid__item--sm">
                    <article class="entry card post-list featured-posts-grid__entry">
                        <div class="entry__img-holder post-list__img-holder card__img-holder" style="background-image: url(images/303/182/{{ optional($featured[1]->thumbnail)->hash }}/right)">
                            <a href="{{ $featured[1]->url }}" target='_blank' class="thumb-url"></a>
                            <img src="images/302/182/{{ optional($featured[1]->thumbnail)->hash }}/right" alt="" class="entry__img d-none">
                            <a href="#" class="entry__meta-category entry__meta-category--label entry__meta-category--align-in-corner entry__meta-category--violet">{{ $featured[1]->category }}</a>
                        </div>
                        <div class="entry__body post-list__body card__body">
                            <h2 class="entry__title">
                                <a href="{{ $featured[1]->url }}" target='_blank'>{{ $featured[1]->title }}</a>
                            </h2>
                            <ul class="entry__meta">
                                <li class="entry__meta-author">
                                    <span>by</span>
                                    <a href="{{ $featured[1]->url_contributor }}" target='_blank'>{{ $featured[1]->displayed_author }}</a>
                                </li>
                                <li class="entry__meta-date">
                                    {{ $carbon::parse($featured[1]->posted_at)->format('M j, Y') }}
                                </li>
                            </ul>
                        </div>
                    </article>
                </div>
                <!-- end post -->
                <!-- Small post -->
                <div class="featured-posts-grid__item featured-posts-grid__item--sm">
                    <article class="entry card post-list featured-posts-grid__entry">
                        <div class="entry__img-holder post-list__img-holder card__img-holder" style="background-image: url(images/303/182/{{ optional($featured[2]->thumbnail)->hash }}/left)">
                            <a href="{{ $featured[2]->url }}" target='_blank' class="thumb-url"></a>
                            <img src="images/303/182/{{ optional($featured[2]->thumbnail)->hash }}/left" alt="" class="entry__img d-none">
                            <a href="#" class="entry__meta-category entry__meta-category--label entry__meta-category--align-in-corner entry__meta-category--purple">{{ $featured[2]->category }}</a>
                        </div>
                        <div class="entry__body post-list__body card__body">
                            <h2 class="entry__title">
                                <a href="{{ $featured[2]->url }}" target='_blank' >{{ $featured[2]->title }}</a>
                            </h2>
                            <ul class="entry__meta">
                                <li class="entry__meta-author">
                                    <span>by</span>
                                    <a href="{{ $featured[2]->url_contributor }}" target='_blank'>{{ $featured[2]->displayed_author }}</a>
                                </li>
                                <li class="entry__meta-date">
                                    {{ $carbon::parse($featured[2]->posted_at)->format('M j, Y') }}
                                </li>
                            </ul>
                        </div>
                    </article>
                </div>
                <!-- end post -->
                <!-- Small post -->
                <div class="featured-posts-grid__item featured-posts-grid__item--sm">
                    <article class="entry card post-list featured-posts-grid__entry">
                        <div class="entry__img-holder post-list__img-holder card__img-holder" style="background-image: url(images/303/182/{{ optional($featured[3]->thumbnail)->hash }}/right)">
                            <a href="{{ $featured[3]->url }}" target='_blank' class="thumb-url"></a>
                            <img src="images/303/182/{{ optional($featured[3]->thumbnail)->hash }}/right" alt="" class="entry__img d-none">
                            <a href="#" class="entry__meta-category entry__meta-category--label entry__meta-category--align-in-corner entry__meta-category--blue">{{ $featured[3]->category }}</a>
                        </div>
                        <div class="entry__body post-list__body card__body">
                            <h2 class="entry__title">
                                <a href="{{ $featured[3]->url }}" target='_blank'>{{ $featured[3]->title }}</a>
                            </h2>
                            <ul class="entry__meta">
                                <li class="entry__meta-author">
                                    <span>by</span>
                                    <a href="{{ $featured[3]->url_contributor }}" target='_blank'>{{ $featured[3]->displayed_author }}</a>
                                </li>
                                <li class="entry__meta-date">
                                    {{ $carbon::parse($featured[3]->posted_at)->format('M j, Y') }}
                                </li>
                            </ul>
                        </div>
                    </article>
                </div>
                <!-- end post -->
            </div>
            <!-- end col -->
            <div class="col-lg-6">
                <!-- Large post -->
                <div class="featured-posts-grid__item featured-posts-grid__item--lg">
                    <article class="entry card featured-posts-grid__entry">
                        <div class="entry__img-holder card__img-holder">
                            <a href="{{ $featured[0]->url }}" target='_blank'>
                                <img src="images/605/357/{{ optional($featured[0]->thumbnail)->hash }}" alt="" class="entry__img">
                            </a>
                            <a href="#" class="entry__meta-category entry__meta-category--label entry__meta-category--align-in-corner entry__meta-category--green">{{ $featured[0]->category }}</a>
                        </div>
                        <div class="entry__body card__body">
                            <h2 class="entry__title">
                                <a href="{{ $featured[0]->url }}" target='_blank'>{{ $featured[0]->title }}</a>
                            </h2>
                            <ul class="entry__meta">
                                <li class="entry__meta-author">
                                    <span>by</span>
                                    <a href="{{ $featured[0]->url_contributor }}" target='_blank'>{{ $featured[0]->displayed_author }}</a>
                                </li>
                                <li class="entry__meta-date">
                                    {{ $carbon::parse($featured[0]->posted_at)->format('M j, Y') }}
                                </li>
                            </ul>
                        </div>
                    </article>
                </div>
                <!-- end large post -->
            </div>
        </div>
    </div>
</section>
<!-- end featured posts grid -->
