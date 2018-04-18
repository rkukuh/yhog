@extends('front-end.templates._base')

@push('page-meta-tags')
<title>About Yayasan HOG</title>
@endpush

@push('body-class')
<body id="about-us-page">
@endpush

@section('content')
<section class="hero-image">
	<div class="grid-container">
		<div class="grid-x grid-padding-x">
			<div class="cell xsmall-12 large-6 grid-x align-middle align-right" data-interchange="[{{ asset('assets/img/hero-image-home.jpg') }}, xsmall], [{{ asset('assets/img/hero-image-home.jpg') }}, large]">
				<h1>
					<span>Bettering lives</span><br>
					<span>of impoverished children</span><br>
					<span>in Indonesia since 1987</span><</span>
				</h1>
			</div>
			
			<div class="cell xsmall-12 large-6 grid-x align-center-middle text-center">
				<img src="{{ asset('assets/img/logo-yayasan-hog-large.png') }}">
			</div>
		</div>
	</div>
</section>

<section class="content">
	<div class="grid-container">
		<div class="grid-x grid-padding-x">
			<div class="cell xsmall-12 large-6">
				<p>The Yayasan HOG Indonesian Chapter (YHOG) is a registered charity of bike riders and non-riders alike. The Chapter was incorporated in 1987 and is the first Harley Davidson Owners Group Chapter to be registered outside of the United States. Since our incorporation, we have focused our fund-raising efforts on helping orphanages, and in particular supporting facial reconstructive surgery for infants and children born with harelip or cleft palate defects. By the end of this year YHOG will have helped change the lives of over 3,250 Indonesian children.</p>
	
				<p>The incidence of such birth defects remains high in Indonesia, and many families cannot afford the surgery needed. Yet, without these quite simple operations, these children can become outcasts in their own society and face a future of even greater hardship and struggle. Your assistance to these children truly helps change lives for the better.</p>
			</div>
			
			<div class="cell xsmall-12 large-6">
				<img src="{{ asset('assets/img/content-about-us-01.jpg') }}">
			</div>
		</div>
		
		<div class="grid-x grid-padding-x">
			<div class="cell xsmall-12">
				<p>For many years we have worked closely in support of Dr. Gentur and his surgical team. Dr. Gentur was until recently the Head of the Reconstructive and Plastic Surgery Unit at the Cipto Mangukusumo Hospital in Jakarta, and is widely respected both in Indonesia and abroad for his wealth of knowledge in the reconstructive surgery field, and in particular for his pioneering work in Indonesia in operating on babies and infants. Since his retirement, Dr. Gentur has established the Gentur Cleft Foundation, where he and his team can continue to provide their surgical time and expertise, while YHOG covers all other hospital and associated medical expenses, from transporting children and families to the hospital through the provision of post-operative care and medication.</p>
			</div>
		</div>
	</div>
</section>

<section class="blockquote">
	<div class="grid-container">
		<div class="grid-x grid-padding-x">
			<div class="cell xsmall-12">
				<blockquote>&ldquo;The Yayasan HOG committee and members give their time and efforts free of charge, we are proud to say that <strong>over 97 cents of every dollar</strong> raise goes straight to supporting our surgical programs, bettering young and impoverished Indonesian children’s lives.&rdquo;</blockquote>
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

<section class="upcoming-events">
	<div class="grid-container full" data-interchange="[{{ url('interchange/events-thumbnails-xsmall') }}, xsmall], [{{ url('interchange/events-thumbnails-small') }}, small], [{{ url('interchange/events-thumbnails-small') }}, medium], [{{ url('interchange/events-thumbnails-large') }}, large], [{{ url('interchange/events-thumbnails-large') }}, xlarge], [{{ url('interchange/events-thumbnails-xxlarge') }}, xxlarge], [{{ url('interchange/events-thumbnails-xxxlarge') }}, xxxlarge]">
		
	</div>
	<div class="grid-container">
		<div class="grid-x grid-padding-x align-center">
			<div class="cell medium-11 large-10 text-center">
				<h2>Upcoming Events</h2>
				
				<div class="events grid-x grid-padding-x align-justify text-left">
					<div class="event cell medium-12 large-5">
						<div class="grid-x grid-padding-x">
							<div class="cell medium-3 large-5 hide-for-xsmall-only hide-for-small-only">
								<img src="{{ asset('assets/img/tn-event-sample.jpg') }}">
							</div>
							
							<div class="cell xsmall-12 medium-9 large-7 text">
								<p class="title">HOG FEST</p>
								
								<p>May 1, 2018<br>Location</p>
								
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do. <br> <a>Continue</a></p>
							</div>
						</div>
					</div>
					
					<div class="event cell medium-12 large-5">
						<div class="grid-x grid-padding-x">
							<div class="cell medium-3 large-5 hide-for-xsmall-only hide-for-small-only">
								<img src="{{ asset('assets/img/tn-event-sample.jpg') }}">
							</div>
							
							<div class="cell xsmall-12 medium-9 large-7 text">
								<p class="title">HOG FEST</p>
								
								<p>May 1, 2018<br>Location</p>
								
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do. <br> <a>Continue</a></p>
							</div>
						</div>
					</div>
				</div>
				
				<a class="cta">View all events</a>
			</div>
		</div>
	</div>
</section>
@endsection

@push('page-styles')
@endpush

@push('page-scripts')
@endpush