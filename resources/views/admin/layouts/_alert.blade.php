@if (session('info-message'))
    @include('common.alerts.info')
@endif

@if (session('success-message'))
    @include('common.alerts.success')
@endif

@if (session('warning-message'))
    @include('common.alerts.warning')
@endif

@if (session('fail-message'))
    @include('common.alerts.failed')
@endif

@if (session('feature-unavailable'))
    @include('common.alerts.feature-unavailable')
@endif
