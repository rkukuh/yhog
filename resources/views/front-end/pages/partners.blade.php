@extends('front-end.templates._base')

@push('page-meta-tags')
<title>Yayasan HOG Partners</title>
@endpush

@push('body-class')
<body id="about-us-page">
@endpush

@section('content')
<section class="hero-image">
	<div class="grid-container">
		<div class="grid-x">
			<div class="cell xsmall-12 large-6">
				<img src="{{ asset('assets/img/hero-image-our-projects.jpg') }}">
			</div>
			
			<div class="cell xsmall-12 large-6 grid-x align-center-middle text-center">
				<h2>Over the years the financial support of these caring organizations helped us change the lives of 1000’s of children.</h2>
			</div>
		</div>
	</div>
</section>

<section class="content">
	<div class="grid-container">
		<div class="grid-x grid-padding-x">
			<div class="cell xsmall-12">
				
				@foreach($partners as $partner)
					<div class="partner grid-x grid-padding-x" id="partner-hotel-kristal">
						<div class="cell xsmall-12 large-3 text-center">
							@if ($partner->featured_image)
								<img src="{{ asset('storage/' . $partner->featured_image->path) }}">
							@endif
						</div>
						
						<div class="cell xsmall-12 large-9">
							<h3>{{ $partner->title }}</h3>
							
							<p>
								{!! $partner->body !!}
							</p>
						</div>
					</div>
				@endforeach

			</div>
		</div>
	</div>
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
	
	<div class="grid-container full" data-interchange="[{{ url('interchange/thumbnails/support-thumbnails-xsmall') }}, xsmall], [{{ url('interchange/thumbnails/support-thumbnails-xsmall') }}, small], [{{ url('interchange/thumbnails/support-thumbnails-medium') }}, medium], [{{ url('interchange/thumbnails/support-thumbnails-large') }}, large], [{{ url('interchange/thumbnails/support-thumbnails-large') }}, xlarge], [{{ url('interchange/thumbnails/support-thumbnails-xxlarge') }}, xxlarge], [{{ url('interchange/thumbnails/support-thumbnails-xxxlarge') }}, xxxlarge]">
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-scrollTo/2.1.2/jquery.scrollTo.min.js"></script>

<script>
if (location.hash) {
	var target = window.location.hash;
	window.location.hash = "";
	
	setTimeout(function() {
		
		$.scrollTo($(target), 1000, {
			offset: -87,
		});
    	//window.scrollTo(0, 0);
	}, 1);
}
</script>
@endpush