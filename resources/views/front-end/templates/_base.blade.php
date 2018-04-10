<!doctype html>
<html class="no-js" lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <meta name="csrf-token" content="{{ csrf_token() }}">

        @stack('page-meta-tags')
         
        @stack('page-styles')

        @include('front-end.templates._base-elements.styles')
        
        <!-- laravel csrf token -->
        <script>
            window.Laravel = {!! json_encode([
                'csrfToken' => csrf_token(),
            ]) !!};
        </script>
        <!-- laravel csrf token -->

        <!-- google analytics -->
        <!-- google analytics -->
    </head>
    
    @stack('body-class')
    	@include('front-end.templates._base-elements.header')
    	
	    <div class="off-canvas-wrapper">
		    <div class="off-canvas position-left" id="offCanvas" data-off-canvas>
		    	 @include('front-end.templates._base-elements.main-navigation')
		    </div>
		    
		    <div class="off-canvas-content" data-off-canvas-content>
			    @yield('content')
				
				@include('front-end.templates._base-elements.footer')

				@include('front-end.templates._base-elements.scripts')
    		</div>
	    </div>
                
        @stack('page-scripts')
    </body>
</html>