<section class="content">
    <div class="box">
        <div class="row">

            <div class="col-md-{{ $left_content_size or 6 }}">
                <div class="box-header with-border">
                    <h3 class="box-title">
                        @yield('content-alt-header')
                    </h3>
                </div>
                <div class="box-body">
                    @yield('content-alt-body')
                </div>
                <div class="box-footer">
                    @yield('content-alt-footer')
                </div>
            </div>

            <div class="col-md-offset-1 col-md-{{ $right_content_size or 5 }} form">
                @yield('content-alt-form')
            </div>

        </div>
    </div>
</section>