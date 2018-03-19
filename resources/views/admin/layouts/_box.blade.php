<div class="box {{ $boxClass or '' }}">
    <div class="box-header with-border">
        <h3 class="box-title">
            {{ $title or '' }}
        </h3>
    </div>
    <div class="box-body {{ $bodyClass or '' }}">
        {{ $slot }}
    </div>
    <div class="box-footer">
        {{ $footer or '' }}
    </div>
</div>