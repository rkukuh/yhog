<a href="{{ $route or '#' }}"
   class="btn btn-{{ $color or 'primary' }} 
          btn-{{ $size or 'lg' }} 
          {{ $alignment or 'pull-right' }} 
          {{ $class or '' }}"

    @if (isset($data_target))
        data-toggle="{{ $data_toggle = 'modal' }}"
        data-target="{{ $data_target or '#' }}"
    @endif

    style="{{ $style or 'margin-bottom: 20px;' }}">

    <i class="{{ $icon or 'fa fa-plus-circle' }}"></i>

    {{ $text or 'Create New' }}
</a>