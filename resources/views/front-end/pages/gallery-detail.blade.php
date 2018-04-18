@extends('front-end.templates._base')

@push('page-meta-tags')
<title>Gallery Detail - Yayasan HOG</title>
@endpush

@push('body-class')
<body id="gallery-detail-page">
@endpush

@section('content')
<section class="featured">
	<div class="grid-container">
		<div class="grid-x grid-padding-x">
			<div class="cell xsmall-12 large-6">
				<img src="{{ asset('assets/img/event-sample-large.jpg') }}">
			</div>
			
			<div class="cell xsmall-12 large-6">
				<h2><span>Yayasan Harley Owners Group</span><br><span>2018 Charity Golf Scramble</span></h2>
				
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit.</p>
			</div>
		</div>
	</div>
</section>

<section class="detail">
	<div class="grid-container">
		<div class="gallery grid-x grid-padding-x xsmall-up-1 medium-up-3 large-up-4">
			<div class="cell">
				<a data-popup href="{{ asset('assets/img/hero-image-home.jpg') }}" title="image 1">
					<img src="{{ asset('assets/img/tn-gallery-sample.jpg') }}">
				</a>
			</div>
			
			<div class="cell">
				<a data-popup href="{{ asset('assets/img/hero-image-home.jpg') }}" title="image 2">
					<img src="{{ asset('assets/img/tn-gallery-sample.jpg') }}">
				</a>
			</div>
			
			<div class="cell">
				<a data-popup href="{{ asset('assets/img/hero-image-home.jpg') }}" title="image 3">
					<img src="{{ asset('assets/img/tn-gallery-sample.jpg') }}">
				</a>
			</div>
			
			<div class="cell">
				<a data-popup href="{{ asset('assets/img/hero-image-home.jpg') }}" title="image 4">
					<img src="{{ asset('assets/img/tn-gallery-sample.jpg') }}">
				</a>
			</div>
			
			<div class="cell">
				<a data-popup href="{{ asset('assets/img/hero-image-home.jpg') }}" title="image 5">
					<img src="{{ asset('assets/img/tn-gallery-sample.jpg') }}">
				</a>
			</div>
			
			<div class="cell">
				<a data-popup href="{{ asset('assets/img/hero-image-home.jpg') }}" title="image 6">
					<img src="{{ asset('assets/img/tn-gallery-sample.jpg') }}">
				</a>
			</div>
		</div>
	</div>
</section>

<section class="support-us">
	<header>
		<div class="grid-container">
			<div class="grid-x grid-padding-x align-center">
				<div class="cell xsmall-12 large-10 text-center">
					<p>Every ticket purchased goes a long way in helping us achieve our fundraising goals.</p>
				</div>
			</div>
		</div>
	</header>
	
	<div class="grid-container">
		@include('front-end.common.elements.goals')
	
		<div class="grid-x grid-padding-x">
			<div class="cell xsmall-12 text-center">
				<h2>Help us, help more kids.</h2>
				
				<a class="cta">Support Us Today!</a>
			</div>
		</div>
	</div>
</section>
@endsection

@push('page-styles')
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css">
@endpush

@push('page-scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script>

<script>
$('.gallery').each(function() { // the containers for all your galleries
    $(this).magnificPopup({
        delegate: 'a', // the selector for gallery item
        type: 'image',
        closeMarkup: '',
        image: {
		  	markup: '<div class="mfp-figure">'+
		  				'<button class="btn-close" data-close-image><i class="fas fa-times"></i></button>'+
			            '<div class="mfp-img"></div>'+
			            '<div class="mfp-bottom-bar">'+
			            	'<p class="mfp-title"></p>'+
							'<div class="button-arrows">'+
			              		'<button class="button-arrow" data-gallery-prev><i class="fas fa-angle-left"></i></button>'+
			              		'<button class="button-arrow" data-gallery-next><i class="fas fa-angle-right"></i></button>'+
						  	'</div>'+
			            '</div>'+
					'</div>',
        },
        gallery: {
          enabled: true,
          arrowMarkup: '',
          tPrev: '',
          tNext: '',
        }
    });
});

$(document).on('click', '[data-close-image]', function(){
	$.magnificPopup.close();
});

$(document).on('click', '[data-gallery-prev]', function(){
	$.magnificPopup.instance.prev();
});

$(document).on('click', '[data-gallery-next]', function(){
	$.magnificPopup.instance.next();
});
</script>
@endpush