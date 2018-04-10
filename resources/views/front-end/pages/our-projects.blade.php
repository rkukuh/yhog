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
		<div class="grid-x grid-padding-x">
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
					<li>Lorem ipsum dolor sit amet</li>
					
					<li>consectetur adipisicing elit</li>
					
					<li>sed do eiusmod tempor incididunt</li>
				</ul>
			</div>
		</div>
	</div>
</section>

<section class="support-us">
	<div class="grid-container full">
		<div class="grid-x xsmall-up-1 medium-up-2 large-up-3 images">
			<div class="cell image">
				<img src="{{ asset('assets/img/tn-support-sample-4.jpg') }}">
			</div>
			
			<div class="cell image">
				<img src="{{ asset('assets/img/tn-support-sample-5.jpg') }}">
			</div>
			
			<div class="cell image">
				<img src="{{ asset('assets/img/tn-support-sample-6.jpg') }}">	
			</div>
		</div>
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
						<a class="cta">Support Us Today!</a>
					</div>
				</div>
				
				<p>The incidence of these birth defects remains terribly high in Indonesia, and many families cannot afford the surgery needed. Yet, without these relatively simple operations, these children can become outcasts in their own society and face a future of even greater hardship and struggle. Your assistance to these children truly helps change lives for the better.</p>
			</div>
			
			<div class="cell xsmall-12 large-3">
				
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
						<p>Another area receiving the Yayasan’s consistent support over the years have been the Indonesian children’s hospitals and orphanages which we visit each year. Our support never takes the form of cash but in books and other educational materials – and of course presents for the kids!</p>
					</div>
				</div>
				
				<div class="grid-x grid-padding-x">
					<div class="cell xsmall-12 medium-6">
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
						
						<p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
					</div>
					
					<div class="cell xsmall-12 medium-6">
						<h3>About Yayasan HOG</h3>
						
						<ul>
							<li>Lorem ipsum dolor sit amet</li>
							
							<li>consectetur adipisicing elit</li>
							
							<li>sed do eiusmod tempor incididunt</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="upcoming-events">
	<div class="grid-container full">
		<div class="grid-x xsmall-up-1 medium-up-2 large-up-3 images">
			<div class="cell image">
				<img src="{{ asset('assets/img/event-sample-large.jpg') }}">
			</div>
			
			<div class="cell image">
				<img src="{{ asset('assets/img/hero-image-our-projects.jpg') }}">
			</div>
			
			<div class="cell image">
				<img src="{{ asset('assets/img/event-sample-large.jpg') }}">	
			</div>
		</div>
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