<a href="{{ $route }}"
   class="btn btn-{{ $color or 'default' }} btn-{{ $size or 'sm' }}">

    <span class="{{ $icon or 'fa fa-search-plus' }}"></span>

    {{ $text or 'Detail' }}
</a>