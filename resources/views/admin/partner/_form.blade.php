<div class="row">
    <div class="col-md-6">
        @include('admin.partner.form.fields')
    </div>
    <div class="col-md-2" style="margin-left: 40px;">
        @include('admin.partner.form.buttons')
    </div>
</div>


@push('header-scripts')
    <link rel="stylesheet" href="{{ asset('assets/adminlte/bower_components/select2/dist/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/adminlte/plugins/iCheck/all.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/summernote/summernote.css') }}">
@endpush

@push('footer-scripts')
    <script src="{{ asset('assets/adminlte/bower_components/select2/dist/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('assets/adminlte/plugins/iCheck/icheck.min.js') }}"></script>
    <script src="{{ asset('assets/summernote/summernote.min.js') }}"></script>

    <script>
        $(function () {
            $('.select2').select2();

            $('#body').summernote({
                height: 200,
                toolbar: [
                    ['insert', ['link']],
                    ['misc', ['fullscreen', 'codeview', 'help']],
                ],
            });

            $('input').iCheck({
                checkboxClass: 'icheckbox_flat-blue',
                radioClass: 'iradio_flat-blue'
            });
        });
    </script>
@endpush