@extends('front-end.templates._base')

@push('page-meta-tags')
	<title>Gallery - Yayasan HOG</title>
@endpush

@push('body-class')
	<body id="blog-page">
@endpush

@section('content')

	@if (isset($latest_gallery))
		<section class="featured">
			<div class="grid-container">
				<div class="grid-x grid-padding-x">
					<div class="cell xsmall-12 large-6">
						@if ($latest_gallery->featured_image)
							<img src="{{ asset('storage/' . $latest_gallery->featured_image->path) }}">
						@endif
					</div>
					
					<div class="cell xsmall-12 large-6">
						<h2>
							<span>{{ $latest_gallery->title }}</span>
						</h2>
						
						<p>
							{{ $latest_gallery->description }}&hellip;
						</p>
						
						<p class="text-right">
							<a class="cta" href="{{ url('gallery/detail/' . $latest_gallery->id) }}">
								Full Details
							</a>
						</p>
					</div>
				</div>
			</div>
		</section>
	@endif

	<section class="article-list">

		@if (isset($galleries))
			<div class="grid-container">

				@foreach ($galleries->chunk(4) as $chunked_galleries)
				<div class="items grid-x grid-margin-x xsmall-up-1 medium-up-2 large-up-4">

					@foreach ($chunked_galleries as $gallery)
						<div class="item cell">
							@if ($gallery->featured_image)
								<img src="{{ asset('storage/' . $gallery->featured_image->path) }}">
							@endif
							
							<h3>{{ $gallery->title }}</h3>
							
							<p>{{ $gallery->description }}&hellip;</p>
							
							<div class="text-center">
								<a class="cta" href="{{ url('gallery/detail/' . $gallery->id) }}">
									Full Details
								</a>
							</div>
						</div>
					@endforeach

				</div>
				@endforeach

			</div>
		@endif
		
	</section>

	<section class="support-us">
		<header>
			<div class="grid-container">
				<div class="grid-x grid-padding-x align-center">
					<div class="cell xsmall-12 large-10 text-center">
						<p>All funds raised through our events go directly towards providing facial reconstructive surgery for infants and children born with harelip or cleft palate defects.</p>
					</div>
				</div>
			</div>
		</header>
		
		<div class="grid-container full" data-interchange="[{{ url('interchange/support-thumbnails-xsmall') }}, xsmall], [{{ url('interchange/support-thumbnails-xsmall') }}, small], [{{ url('interchange/support-thumbnails-medium') }}, medium], [{{ url('interchange/support-thumbnails-large') }}, large], [{{ url('interchange/support-thumbnails-large') }}, xlarge], [{{ url('interchange/support-thumbnails-xxlarge') }}, xxlarge], [{{ url('interchange/support-thumbnails-xxxlarge') }}, xxxlarge]">
		</div>
		
		@include('front-end.common.elements.goals')
		
		<div class="grid-container">
			<div class="grid-x grid-padding-x">
				<div class="cell xsmall-12 text-center">
					<h2>Help us, help more kids.</h2>
					
					<a class="cta" href="{{ url('/donations') }}">Support Us Today!</a>
				</div>
			</div>
		</div>
	</section>
@endsection

@push('page-styles')
@endpush

@push('page-scripts')
@endpush