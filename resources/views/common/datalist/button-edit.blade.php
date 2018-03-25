<a href="{{ $route }}"
   class="btn btn-{{ $color or 'default' }} btn-{{ $size or 'sm'}}">

    <span class="{{ $icon or 'fa fa-edit' }}"></span>

    {{ $text or 'Edit' }}
</a>