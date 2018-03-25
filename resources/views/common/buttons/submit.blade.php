<button type="submit" 
        name="{{ $name or 'submit' }}" 
        value="{{ $value or '' }}" 
        target="{{ $target or '' }}" 
        class="btn btn-{{ $color or 'default' }} btn-{{ $size or 'md' }} {{ $class or '' }}" 
        style="{{ $style or '' }}">
    
    <i class="fa fa-{{ $icon or '' }}"></i> 
    
    {{ $text or 'Submit' }}

</button>