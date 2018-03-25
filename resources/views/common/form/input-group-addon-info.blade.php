<div class="input-group-addon"
     style="border: {{ $border or 'none' }};">

    <i class="fa fa-info-circle"
       style="color: {{ $icon_color or 'cornflowerblue' }};"></i>

    <span style="color: {{ $text_color or 'gray' }};">
        {{ $text or 'Info here' }}
    </span>

</div>