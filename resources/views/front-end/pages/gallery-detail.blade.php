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
			@if ( ! $gallery->events->isEmpty() )
				<div class="grid-x grid-padding-x">
					<div class="cell xsmall-12 large-6">
						@if ($gallery->events()->first()->featured_image)
							<img src="{{ asset('storage/' . $gallery->events()->first()->featured_image->path) }}">
						@endif
					</div>
					
					<div class="cell xsmall-12 large-6">
						<h2>
							<span>{{ $gallery->events()->first()->name }}</span>
						</h2>
						
						<p>{{ $gallery->events()->first()->description }}</p>
					</div>
				</div>
			@endif
		</div>
	</section>

	@if ( ! $gallery->images->isEmpty() )
		<section class="detail">
			<div class="grid-container">

				@foreach ($gallery->images->chunk(4) as $chunked_images)
					<div class="gallery grid-x grid-padding-x xsmall-up-1 medium-up-3 large-up-4">

						@foreach ($chunked_images as $image)
							<div class="cell">
								<img  class="fs-gal" alt="" title="" src="{{ asset('storage/' . $image->path) }}" data-url="{{ asset('storage/' . $image->path) }}">
							</div>
						@endforeach

					</div>
				@endforeach

			</div>
		</section>
	@endif
	
	<section class="detail">
		<div class="grid-container">
			<div class="gallery grid-x grid-padding-x xsmall-up-1 medium-up-3 large-up-4">
				<div class="cell">
					<img  class="fs-gal" alt="Example Image 1" title="Example Image 1" src="{{ asset('assets/img/tn-gallery-sample.jpg') }}" data-url="{{ asset('assets/img/hero-image-home.jpg') }}">
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
					
					<a class="cta" href="{{ url('/donations') }}">Support Us Today!</a>
				</div>
			</div>
		</div>
	</section>
	
	<div class="fs-gal-view">
		<h1></h1>
		<img class="fs-gal-prev fs-gal-nav" src="{{ asset('assets/img/prev.svg') }}" alt="Previous picture" title="Previous picture" />
		<img class="fs-gal-next fs-gal-nav" src="{{ asset('assets/img/next.svg') }}" alt="Next picture" title="Next picture" />
		<img class="fs-gal-close" src="{{ asset('assets/img/close.svg') }}" alt="Close gallery" title="Close gallery" />
		<img class="fs-gal-main" src="" alt="">
	</div>
@endsection

@push('page-styles')
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/fs-gal.css') }}">
@endpush

@push('page-scripts')
	<script src="{{ asset('assets/js/fs-gal.js') }}"></script>
@endpush