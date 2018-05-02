@extends('front-end.templates._base')

@push('page-meta-tags')
<title>Our Projects - Yayasan HOG</title>
@endpush

@push('body-class')
<body id="our-projects-page">
@endpush

@section('content')
<section class="hero-image">
	<div class="grid-container">
		<div class="grid-x">
			<div class="cell xsmall-12 large-6">
				<img src="{{ asset('assets/img/hero-image-our-projects.jpg') }}">
			</div>
			
			<div class="cell xsmall-12 large-6 grid-x align-center-middle text-center">
				<h2>Bettering lives<br>of impoverished children in Indonesia<br>since 1987.</h2>
			</div>
		</div>
	</div>
</section>

<section class="info">
	<div class="grid-container">
		<div class="grid-x grid-padding-x">
			<div class="cell xsmall-12 medium-2">
				<img src="{{ asset('assets/img/logo-gentur-cleft-foundation.jpg') }}">
			</div>
			
			<div class="cell xsmall-12 medium-5">
				<p>YHOG has been raising funds for Children’s charities here in Indonesia for more than 18 years now and the organisation we have supported more than any other over that time – and right through until today, has been the Gentur Cleft Foundation (and its predecessors).</p>

				<p>We cannot speak too highly of the Gentur Cleft Foundation which does the most amazing work for hundreds of children born each year in Indonesia with cleft lip and palate deformities – and transforming their lives from one of abject despair to one of health and opportunity.</p>

				<p>The foundation is supported entirely by donations of time and skill by many Indonesian surgeons and health organisations – and the cash donations of individuals and organisations from right across Indonesian Society – including YHOG.</p>
			</div>
			
			<div class="cell xsmall-12 medium-5">
				<p>We are immensely proud to be associated with the Gentur Cleft Foundation and the immense amount of good it does in providing hope for these poor, disfigured children.</p>

				<p>By supporting our events you are supporting Gentur Cleft Foundation, which can only be a nice thought as you enjoy the fun with us at those events.</p>
				
				<h3>About the foundation</h3>
				
				<ul>
					<li>The Doctors provide their surgical time and expertise free of charge while money raised covers all hospital fees associated with these surgical procedures.</li>
					
					<li>Through partnerships with other hospitals and sponsors, the GCF has been able to reach farther into Indonesia than just the greater Jakarta areas to perform these surgeries.</li>
					
					<li>Because the demand is so high for children in Indonesia requiring this surgery, Dr. Gentur has developed a patented method and trained several doctors in his method to help as many children as possible throughout Indonesia.</li>
				</ul>
			</div>
		</div>
	</div>
</section>

<section class="support-us">
	<div class="grid-container full" data-interchange="[{{ url('interchange/thumbnails/support-thumbnails-xsmall') }}, xsmall], [{{ url('interchange/thumbnails/support-thumbnails-xsmall') }}, small], [{{ url('interchange/thumbnails/support-thumbnails-medium') }}, medium], [{{ url('interchange/thumbnails/support-thumbnails-large') }}, large], [{{ url('interchange/thumbnails/support-thumbnails-large') }}, xlarge], [{{ url('interchange/thumbnails/support-thumbnails-xxlarge') }}, xxlarge], [{{ url('interchange/thumbnails/support-thumbnails-xxxlarge') }}, xxxlarge]">
		
	</div>
	
	<header>
		<div class="grid-container">
			<div class="grid-x grid-padding-x align-center">
				<div class="cell xsmall-12 large-10 text-center">
					<p>Through your donations we provide facial reconstructive surgery for infants and children born with harelip or cleft palate defects.</p>
				</div>
			</div>
		</div>
	</header>
	
	@include('front-end.common.elements.goals')
	
	<div class="grid-container">
		<div class="grid-x grid-padding-x">
			<div class="cell xsmall-12 large-9">
				<div class="grid-x grid-padding-x">
					<div class="cell xsmall-12 large-6">
						<h2>Help us, help more kids.</h2>
					</div>
					
					<div class="cell xsmall-12 large-6">
						<a class="cta" href="{{ url('/donations') }}">Support Us Today!</a>
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

<section class="info yayasan-hog">
	<div class="grid-container">
		<div class="grid-x grid-padding-x">
			<div class="cell xsmall-12 medium-2">
				<img src="{{ asset('assets/img/logo-yayasan-hog.jpg') }}">
			</div>
			
			<div class="cell xsmall-12 medium-10">
				<div class="grid-x grid-padding-x">
					<div class="cell xsmall-12 medium-6">
						<p>The Yayasan HOG Indonesian Chapter (YHOG) is a registered charity of bike riders and non-riders alike. The Chapter was incorporated in 1987 and is the first Harley Davidson Owners Group Chapter to be registered outside of the United States. Since our incorporation, we have focused our fund-raising efforts on helping orphanages, and in particular supporting facial reconstructive surgery for infants and children born with harelip or cleft palate defects. By the end of this year YHOG will have helped change the lives of over 3,250 Indonesian children.</p>
					</div>
					
					<div class="cell xsmall-12 medium-6">
						<h3>About Yayasan HOG</h3>
						
						<ul>
							<li>YHOG was incorporated in 1987 and is the first Harley Davidson Owners Group Chapter to be registered outside of the USA.</li>
							
							<li>Focused fund raising efforts on supporting facial reconstructive surgery for infants and children born with cleft lip and cranial birth defects as well as support to local orphanages.</li>
							
							<li>YHOG provides 95% of funds needed to support these surgeries performed by the Gentur Cleft Foundation.</li>
						</ul>
					</div>
				</div>
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
				
				<a class="cta" href="{{ url('/events') }}">View all events</a>
			</div>
		</div>
	</div>
</section>
@endsection

@push('page-styles')
@endpush

@push('page-scripts')
@endpush