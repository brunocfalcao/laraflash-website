<div class="container">
    <div class="trending-now">
        <span class="trending-now__label">
        <i class="ui-flash"></i>
        Newsflash</span>
        <div class="newsticker">
            <ul class="newsticker__list">
                @foreach($newsflash as $flash)
                    <li class="newsticker__item"><a href="{{ $flash->url }}" target="_blank" class="newsticker__item-url">{{ $flash->title }}</a>, by <a href="{{ $flash->url_contributor }}" target="_blank" class="newsticker__item-url">{{ $flash->displayed_author }}</a></li>
                @endforeach
            </ul>
        </div>
        <div class="newsticker-buttons">
            <button class="newsticker-button newsticker-button--prev" id="newsticker-button--prev" aria-label="next article"><i class="ui-arrow-left"></i></button>
            <button class="newsticker-button newsticker-button--next" id="newsticker-button--next" aria-label="previous article"><i class="ui-arrow-right"></i></button>
        </div>
    </div>
</div>
