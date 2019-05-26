<li class="tabs__item">
@foreach($categories as $category)
    @if ($loop->first)
    <li class="tabs__item tabs__item--active">
    @else
    <li class="tabs__item">
    @endif
        <a href="#tab-{{ kebab_case($category->article_category) }}"
           class="tabs__trigger">{{ str_plural($category->article_category) }}
        </a>
    </li>
@endforeach
</li>
