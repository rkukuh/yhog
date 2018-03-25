<button type="submit"
        class="btn 
               btn-{{ $color or 'primary' }} 
               {{ $alignment or 'pull-right' }} 
               {{ $class or '' }}">

    <i class="{{ $icon or 'fa fa-save' }}"></i>

    @if (URL::current() == $route_create)

        Save New

    @elseif (URL::current() == $route_edit)

        Save Changes

    @endif

    {{ $text or '' }}

</button>