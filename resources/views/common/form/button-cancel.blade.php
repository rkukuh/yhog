@if (URL::current() == $route_edit)

    <a href="{{ $route_redirect or '#' }}"
       class="btn btn-{{ $color or 'default' }} {{ $alignment or '' }}"
       data-dismiss="{{ $data_dismiss or '' }}">

        <i class="fa fa-ban"></i>

        {{ $text or 'Cancel' }}
    </a>

@endif