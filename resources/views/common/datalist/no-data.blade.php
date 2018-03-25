<div class="alert alert-{{ $color or 'default' }}"
     style="border: {{ $border or '1px solid lightgray;' }} {{ $border_style or '' }}">

    <p class="{{ $text_alignment or 'text-center' }} text-muted"
        style="font-size: {{ $text_size or '16px;' }} {{ $text_style or '' }}">

        {{ $text or 'No data found' }}
    </p>

</div>