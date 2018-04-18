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
				<div class="partner grid-x grid-padding-x" id="partner-hotel-kristal">
					<div class="cell xsmall-12 large-3 text-center">
						<img src="{{ asset('assets/img/logo-hotel-kristal.png') }}">
					</div>
					
					<div class="cell xsmall-12 large-9">
						<h3>Hotel Kristal</h3>
						
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
					</div>
				</div>
				
				<div class="partner grid-x grid-padding-x" id="partner-seascape">
					<div class="cell xsmall-12 large-3 text-center">
						<img src="{{ asset('assets/img/logo-seascape.png') }}">
					</div>
					
					<div class="cell xsmall-12 large-9">
						<h3>Seascape</h3>
						
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
					</div>
				</div>
				
				<div class="partner grid-x grid-padding-x" id="partner-star-deli">
					<div class="cell xsmall-12 large-3 text-center">
						<img src="{{ asset('assets/img/logo-star-deli.png') }}">
					</div>
					
					<div class="cell xsmall-12 large-9">
						<h3>Star Deli</h3>
						
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
					</div>
				</div>
				
				<div class="partner grid-x grid-padding-x" id="partner-tesco">
					<div class="cell xsmall-12 large-3 text-center">
						<img src="{{ asset('assets/img/logo-tesco.png') }}">
					</div>
					
					<div class="cell xsmall-12 large-9">
						<h3>Tesco</h3>
						
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
					</div>
				</div>
				
				<div class="partner grid-x grid-padding-x" id="partner-v-door">
					<div class="cell xsmall-12 large-3 text-center">
						<img src="{{ asset('assets/img/logo-v-door.png') }}">
					</div>
					
					<div class="cell xsmall-12 large-9">
						<h3>V Door</h3>
						
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
					</div>
				</div>
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
	
	<div class="grid-container full" data-interchange="[{{ url('interchange/support-thumbnails-xsmall') }}, xsmall], [{{ url('interchange/support-thumbnails-xsmall') }}, small], [{{ url('interchange/support-thumbnails-medium') }}, medium], [{{ url('interchange/support-thumbnails-large') }}, large], [{{ url('interchange/support-thumbnails-large') }}, xlarge], [{{ url('interchange/support-thumbnails-xxlarge') }}, xxlarge], [{{ url('interchange/support-thumbnails-xxxlarge') }}, xxxlarge]">
	</div>
	
	@include('front-end.common.elements.goals')
	
	<div class="grid-container">
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