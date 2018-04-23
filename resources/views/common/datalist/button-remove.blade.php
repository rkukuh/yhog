<form method="post"
      action="{{ $route }}" 
      class="{{ $class or '' }}" 
      style="{{ $style or 'display: inline;' }}">

    {{ method_field('DELETE') }}

    {!! csrf_field() !!}

    <button class="btn btn-{{ $color or 'danger' }} btn-{{ $size or 'sm'}} {{ $confirm or 'remove-confirm' }}">
        <span class="{{ $icon or 'fa fa-trash-o' }}"></span>

        {{ $text or 'Remove' }}
    </button>

</form>