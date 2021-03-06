<div class="row">
    <div class="col-md-5">
        @include('admin.donation.form.field-left-side')
    </div>

    <div class="col-md-5 hide">
        @include('admin.donation.form.field-right-side')
    </div>
</div>

<hr>

<div class="row">
    <div class="col-md-5">
        @component('common.form.button-cancel')
            @slot('route_edit', route('admin.donation.edit', ($donation ?? 0)))
            @slot('route_redirect', route('admin.donation.index'))
        @endcomponent

        @component('common.form.button-save-new-or-save-changes')
            @slot('route_create', route('admin.donation.create'))
            @slot('route_edit', route('admin.donation.edit', ($donation ?? 0)))
        @endcomponent
    </div>
</div>


@push('header-scripts')
    <link rel="stylesheet" href="{{ asset('assets/adminlte/bower_components/select2/dist/css/select2.min.css') }}">
@endpush

@push('footer-scripts')
    <script src="{{ asset('assets/adminlte/bower_components/select2/dist/js/select2.full.min.js') }}"></script>
@endpush

@push('footer-scripts')
    <script src="https://rawgit.com/RobinHerbots/Inputmask/3.x/dist/jquery.inputmask.bundle.js"></script>

    <script>
        $(function () {

            $('.select2').select2();

            $("#end_at").inputmask("dd/mm/yyyy");

        });
    </script>
@endpush

@push('header-scripts')
    <link rel="stylesheet" href="{{ asset('assets/adminlte/plugins/iCheck/all.css') }}">
@endpush

@push('footer-scripts')
    <script src="{{ asset('assets/adminlte/plugins/iCheck/icheck.min.js') }}"></script>
@endpush

@push('header-scripts')
    <style>
        .radio > label:first-child { margin-left: -20px; }
        .radio > label { margin-right: 20px; }
    </style>
@endpush

@push('header-scripts')
    <link rel="stylesheet" href="{{ asset('assets/summernote/summernote.css') }}">
@endpush

@push('footer-scripts')
    <script src="{{ asset('assets/summernote/summernote.min.js') }}"></script>

    <script>
        $(function () {

            // $('#description').summernote({
            //     height: 200
            // });

        });
    </script>
@endpush