@component('common.buttons.submit')
    @slot('size', 'lg')
    @slot('text', 'Preview')
    @slot('target', '_blank')
    @slot('class', 'btn-block')
    @slot('value', 'preview')
@endcomponent

@component('common.buttons.submit')
    @slot('size', 'lg')
    @slot('color', 'warning')
    @slot('text', 'Save Draft')
    @slot('class', 'btn-block')
    @slot('value', 'draft')
@endcomponent

@component('common.buttons.submit')
    @slot('size', 'lg')
    @slot('color', 'primary')
    @slot('text', 'Publish')
    @slot('class', 'btn-block')
    @slot('value', 'publish')
@endcomponent