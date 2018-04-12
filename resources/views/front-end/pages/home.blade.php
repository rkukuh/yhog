@extends('front-end.templates._base')

@push('page-meta-tags')
<title></title>
@endpush

@push('body-class')
<body id="home-page">
@endpush

@section('content')
<section class="hero-image" data-interchange="[{{ asset('assets/img/hero-image-home.jpg') }}, xsmall], [{{ asset('assets/img/hero-image-home.jpg') }}, large]">
	<div class="grid-container">
		<div class="grid-x grid-padding-x align-middle align-right">
			<h1>
				<span>Since 1987 we have helped change</span><br>
				<span>the lives of over 2000 children</span><br>
				<span>from impoverished communties</span><br>
				<span>throughout Indonesia</span>
			</h1>
		</div>
	</div>
</section>

<section class="donate">
	<div class="grid-container">
		<div class="grid-x grid-padding-x align-center">
			<div class="cell xsmall-12 large-8 text-center">
				<p>Through your donations we provide facial reconstructive surgery for infants and children born with harelip or cleft palate defects.</p>
				
				<a class="cta">Donate Today</a>
			</div>
		</div>
	</div>
</section>

<section class="support-us">
	<div class="grid-container full" data-interchange="[{{ url('interchange/support-thumbnails-xsmall') }}, xsmall], [{{ url('interchange/support-thumbnails-xsmall') }}, small], [{{ url('interchange/support-thumbnails-medium') }}, medium], [{{ url('interchange/support-thumbnails-large') }}, large], [{{ url('interchange/support-thumbnails-large') }}, xlarge], [{{ url('interchange/support-thumbnails-xxlarge') }}, xxlarge], [{{ url('interchange/support-thumbnails-xxxlarge') }}, xxxlarge]">
		
	</div>
	
	@include('front-end.common.elements.goals')
	
	<div class="grid-container">
		<div class="grid-x grid-padding-x">
			<div class="cell xsmall-12 large-8">
				<p>The incidence of these birth defects remains terribly high in Indonesia, and many families cannot afford the surgery needed. Yet, without these relatively simple operations, these children can become outcasts in their own society and face a future of even greater hardship and struggle. Your assistance to these children truly helps change lives for the better.</p>
			</div>
			
			<div class="cell xsmall-12 large-4 text-center">
				<h2>Help us, help more kids.</h2>
				
				<a class="cta">Support Us Today!</a>
			</div>
		</div>
	</div>
</section>

<section class="support-us option-2">
	<div class="grid-container full" data-interchange="[{{ url('interchange/support-thumbnails-xsmall') }}, xsmall], [{{ url('interchange/support-thumbnails-xsmall') }}, small], [{{ url('interchange/support-thumbnails-medium') }}, medium], [{{ url('interchange/support-thumbnails-large') }}, large], [{{ url('interchange/support-thumbnails-large') }}, xlarge], [{{ url('interchange/support-thumbnails-xxlarge') }}, xxlarge], [{{ url('interchange/support-thumbnails-xxxlarge') }}, xxxlarge]">
		
	</div>
	
	@include('front-end.common.elements.goals')
	
	<div class="grid-container">
		<div class="grid-x grid-padding-x">
			<div class="cell xsmall-12 large-9">
				<div class="grid-x grid-padding-x">
					<div class="cell xsmall-12 large-6">
						<h2>Help us, help more kids.</h2>
					</div>
					
					<div class="cell xsmall-12 large-6">
						<a class="cta">Support Us Today!</a>
					</div>
				</div>
				
				<p>The incidence of these birth defects remains terribly high in Indonesia, and many families cannot afford the surgery needed. Yet, without these relatively simple operations, these children can become outcasts in their own society and face a future of even greater hardship and struggle. Your assistance to these children truly helps change lives for the better.</p>
			</div>
			
			<div class="cell xsmall-12 large-3">
				<img src="{{ asset('assets/img/ad-unit.png') }}">
			</div>
		</div>
	</div>
</section>

<section class="partners">
	<div class="grid-container">
		<div class="grid-x grid-padding-x">
			<div class="cell text-center">
				<h2>Supporting Partners</h2>
				
				<ul class="partners">
					<li>
						<img src="{{ asset('assets/img/logo-hotel-kristal.png') }}"
					</li>
					
					<li>
						<img src="{{ asset('assets/img/logo-v-door.png') }}"
					</li>
					
					<li>
						<img src="{{ asset('assets/img/logo-seascape.png') }}"
					</li>
					
					<li>
						<img src="{{ asset('assets/img/logo-tesco.png') }}"
					</li>
					
					<li>
						<img src="{{ asset('assets/img/logo-star-deli.png') }}"
					</li>
				</ul>
				
				<p>Over the years the financial support of these caring organizations has helped us change the lives of 1000’s of children.</p>
			</div>
		</div>
	</div>
</section>

<section class="gentur-cleft-foundation">
	<div class="grid-container">
		<div class="grid-x grid-padding-x">
			<div class="cell xsmall-12 large-8">
				<h2>We support Dr. Gentur and the Gentur Cleft Foundation</h2>
			</div>
		</div>
		
		<div class="grid-x grid-padding-x">
			<div class="cell xsmall-12 medium-7 large-8">
				<p><img src="{{ asset('assets/img/logo-gentur-cleft-foundation.jpg') }}" class="align left">For many years we have worked closely in support of Dr. Gentur and his surgical team. Dr. Gentur is widely respected both in Indonesia and abroad for his wealth of knowledge in the reconstructive surgery field, and in particular for his pioneering work in Indonesia in operating on babies and infants.</p>
			</div>
			
			<div class="cell xsmall-12 medium-5 large-4">
				<img src="{{ asset('assets/img/gentur-cleft-foundation.jpg') }}">
			</div>
		</div>
	</div>
</section>

<section class="upcoming-events">
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
								
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do. <br> <a href="{{ url('events/detail') }}">Continue</a></p>
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
								
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do. <br> <a href="{{ url('events/detail') }}">Continue</a></p>
							</div>
						</div>
					</div>
				</div>
				
				<a class="cta"  href="{{ url('events') }}">View all events</a>
			</div>
		</div>
	</div>
</section>

<section class="yayasan-hog">
	<div class="grid-container">
		<div class="grid-x grid-padding-x">
			<div class="cell xsmall-12 large-7">
				<h2>About YAYASAN HOG</h2>
			</div>
		</div>
		
		<div class="grid-x grid-padding-x">
			<div class="cell xsmall-12 large-7">
				<p><img src="{{ asset('assets/img/logo-yayasan-hog.jpg') }}" class="align left">Yayasan HOG was established by the ten founding members in 1987 and was right from the very start intended to be primarily a charitable organisation, having as its main objective the improvement of the lot of the children of impoverished Indonesian families.</p>
				
				<p>YHOG was founded by ten Jakarta based friends in 1987 – and is the longest established HOG group in Indonesia, and one of the oldest HOG Chapters in the world – and has been active ever since.</p>

				<p>Yayasan HOG is a  non-profit group, leveraging our shared love of the Harley-Davidson motorbike to raise funds exclusively in support of a variety of Jakarta children’s charities through our activities. We are one of Indonesia’s major charities for Cranial Facial Reconstructive surgery for cleft lip and cleft palate.</p>
			</div>
			
			<div class="cell xsmall-12 large-5">
				<blockquote>&ldquo;The Yayasan HOG committee and members give their time and efforts free of charge, we are proud to say that <strong>over 97 cents of every dollar</strong> raise goes straight to supporting our surgical programs, bettering young and impoverished Indonesian children’s lives.&rdquo;</blockquote>
			</div>
		</div>
	</div>
</section>

<section class="yayasan-hog">
	<div class="grid-container">
		<div class="grid-x grid-padding-x">
			<div class="cell xsmall-12 large-9">
				<h2>About YAYASAN HOG</h2>
			</div>
		</div>
		
		<div class="grid-x grid-padding-x">
			<div class="cell xsmall-12 large-9">
				<p><img src="{{ asset('assets/img/logo-yayasan-hog.jpg') }}" class="align left">Yayasan HOG was established by the ten founding members in 1987 and was right from the very start intended to be primarily a charitable organisation, having as its main objective the improvement of the lot of the children of impoverished Indonesian families.</p>
				
				<p>YHOG was founded by ten Jakarta based friends in 1987 – and is the longest established HOG group in Indonesia, and one of the oldest HOG Chapters in the world – and has been active ever since.</p>

				<p>Yayasan HOG is a  non-profit group, leveraging our shared love of the Harley-Davidson motorbike to raise funds exclusively in support of a variety of Jakarta children’s charities through our activities. We are one of Indonesia’s major charities for Cranial Facial Reconstructive surgery for cleft lip and cleft palate.</p>
			</div>
			
			<div class="cell xsmall-12 large-3">
				<img src="{{ asset('assets/img/ad-unit.png') }}">
			</div>
		</div>
		
		<div class="grid-x grid-padding-x">
			<div class="cell xsmall-12">
				<blockquote>&ldquo;The Yayasan HOG committee and members give their time and efforts free of charge, we are proud to say that <strong>over 97 cents of every dollar</strong> raise goes straight to supporting our surgical programs, bettering young and impoverished Indonesian children’s lives.&rdquo;</blockquote>
			</div>
		</div>
	</div>
</section>
@endsection

@push('page-styles')
@endpush

@push('page-scripts')
@endpush