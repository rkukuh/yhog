<div class="row">
        <div class="col-md-6">
            @include('admin.post.form.fields')
        </div>
        <div class="col-md-2" style="margin-left: 40px;">
            @include('admin.post.form.buttons')
        </div>
    </div>
    
    
    @push('header-scripts')
        <link rel="stylesheet" href="{{ asset('assets/adminlte/bower_components/select2/dist/css/select2.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/adminlte/plugins/iCheck/all.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/summernote/summernote.css') }}">
    
        <style>
            fieldset h4 {
                border-bottom: 1px solid #ddd;
                margin: 20px 0;
                padding-bottom: 5px;
            }
    
            .radio > label:first-child { margin-left: -40px; }
            /* .radio > label { margin-right: 20px; } */
        </style>
    @endpush
    
    @push('footer-scripts')
        <script src="{{ asset('assets/adminlte/bower_components/select2/dist/js/select2.full.min.js') }}"></script>
        <script src="{{ asset('assets/adminlte/plugins/iCheck/icheck.min.js') }}"></script>
        <script src="{{ asset('assets/summernote/summernote.min.js') }}"></script>
    
        <script>
            $(function () {
                $('.select2').select2();
    
                $('#body').summernote({
                    height: 200
                });
    
                $('input').iCheck({
                    checkboxClass: 'icheckbox_flat-blue',
                    radioClass: 'iradio_flat-blue'
                });
            });
        </script>
    @endpush