@extends('front-end.templates._base')

@push('page-meta-tags')
<title>Gallery - Yayasan HOG</title>
@endpush

@push('body-class')
<body id="blog-page">
@endpush

@section('content')
<section class="featured">
	<div class="grid-container">
		<div class="grid-x">
			<div class="cell xsmall-12 large-6">
				<img src="{{ asset('assets/img/event-sample-large.jpg') }}">
			</div>
			
			<div class="cell xsmall-12 large-6">
				<h2><span>Yayasan Harley Owners Group</span><br><span>2018 Charity Golf Scramble Image Gallery</span></h2>
				
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam&hellip;</p>
				
				<p class="text-right"><a class="cta" href="{{ url('gallery/detail') }}">Full Details</a></p>
			</div>
		</div>
	</div>
</section>

<section class="article-list">
	<div class="grid-container">
		<div class="items grid-x grid-margin-x xsmall-up-1 medium-up-2 large-up-4">
			<div class="item cell">
				<img src="{{ asset('assets/img/event-sample-large.jpg') }}">
				
				<h3>Yayasan Harley Owners Group 2018 Charity Golf Scramble Image Gallery</h3>
				
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam&hellip;</p>
				
				<div class="text-center"><a class="cta" href="{{ url('gallery/detail') }}">Full Details</a></div>
			</div>
			
			<div class="item cell">
				<img src="{{ asset('assets/img/event-sample-large.jpg') }}">
				
				<h3>Yayasan Harley Owners Group 2018 Charity Golf Scramble Image Gallery</h3>
				
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam&hellip;</p>
				
				<div class="text-center"><a class="cta" href="{{ url('gallery/detail') }}">Full Details</a></div>
			</div>
			
			<div class="item cell">
				<img src="{{ asset('assets/img/event-sample-large.jpg') }}">
				
				<h3>Yayasan Harley Owners Group 2018 Charity Golf Scramble Image Gallery</h3>
				
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam&hellip;</p>
				
				<div class="text-center"><a class="cta" href="{{ url('gallery/detail') }}">Full Details</a></div>
			</div>
			
			<div class="item cell">
				<img src="{{ asset('assets/img/event-sample-large.jpg') }}">
				
				<h3>Yayasan Harley Owners Group 2018 Charity Golf Scramble Image Gallery</h3>
				
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam&hellip;</p>
				
				<div class="text-center"><a class="cta" href="{{ url('gallery/detail') }}">Full Details</a></div>
			</div>
			
			<div class="item cell">
				<img src="{{ asset('assets/img/event-sample-large.jpg') }}">
				
				<h3>Yayasan Harley Owners Group 2018 Charity Golf Scramble Image Gallery</h3>
				
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam&hellip;</p>
				
				<div class="text-center"><a class="cta" href="{{ url('gallery/detail') }}">Full Details</a></div>
			</div>
			
			<div class="item cell">
				<img src="{{ asset('assets/img/event-sample-large.jpg') }}">
				
				<h3>Yayasan Harley Owners Group 2018 Charity Golf Scramble Image Gallery</h3>
				
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam&hellip;</p>
				
				<div class="text-center"><a class="cta" href="{{ url('gallery/detail') }}">Full Details</a></div>
			</div>
			
			<div class="item cell">
				<img src="{{ asset('assets/img/event-sample-large.jpg') }}">
				
				<h3>Yayasan Harley Owners Group 2018 Charity Golf Scramble Image Gallery</h3>
				
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam&hellip;</p>
				
				<div class="text-center"><a class="cta" href="{{ url('gallery/detail') }}">Full Details</a></div>
			</div>
			
			<div class="item cell">
				<img src="{{ asset('assets/img/event-sample-large.jpg') }}">
				
				<h3>Yayasan Harley Owners Group 2018 Charity Golf Scramble Image Gallery</h3>
				
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam&hellip;</p>
				
				<div class="text-center"><a class="cta" href="{{ url('gallery/detail') }}">Full Details</a></div>
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
@endpush