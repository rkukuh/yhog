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
			<div class="cell xsmall-12 text-center">
				<p>Through your donations we provide facial reconstructive surgery for infants and children born with harelip or cleft palate defects.</p>
				
				<a class="cta" href="{{ url('/donations') }}">Donate Today</a>
			</div>
		</div>
	</div>
</section>

<section class="support-us option-2">
	<div class="grid-container full" data-interchange="[{{ url('interchange/thumbnails/support-thumbnails-xsmall') }}, xsmall], [{{ url('interchange/thumbnails/support-thumbnails-xsmall') }}, small], [{{ url('interchange/thumbnails/support-thumbnails-medium') }}, medium], [{{ url('interchange/thumbnails/support-thumbnails-large') }}, large], [{{ url('interchange/thumbnails/support-thumbnails-large') }}, xlarge], [{{ url('interchange/thumbnails/support-thumbnails-xxlarge') }}, xxlarge], [{{ url('interchange/thumbnails/support-thumbnails-xxxlarge') }}, xxxlarge]">
		
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

<section class="partners">
	<div class="grid-container">
		<div class="grid-x grid-padding-x align-center">
			<div class="cell xsmall-12 large-10 text-center">
				<h2>Supporting Partners</h2>
				
				<div id="partner-slider" data-equalizer>
					<div class="item" data-equalizer-watch>
						<a href="{{ url('/partners#partner-hotel-kristal') }}">
							<img src="{{ asset('assets/img/logo-hotel-kristal.png') }}">
						</a>
					</div>
					
					<div class="item" data-equalizer-watch>
						<a href="{{ url('/partners#partner-v-door') }}">
							<img src="{{ asset('assets/img/logo-v-door.png') }}">
						</a>
					</div>
					
					<div class="item" data-equalizer-watch>
						<a href="{{ url('/partners#partner-seascape') }}">
							<img src="{{ asset('assets/img/logo-seascape.png') }}">
						</a>
					</div>
					
					<div class="item" data-equalizer-watch>
						<a href="{{ url('/partners#partner-tesco') }}">
							<img src="{{ asset('assets/img/logo-tesco.png') }}">
						</a>
					</div>
					
					<div class="item" data-equalizer-watch>
						<a href="{{ url('/partners#partner-star-deli') }}">
							<img src="{{ asset('assets/img/logo-star-deli.png') }}">
						</a>
					</div>
					
					<div class="item" data-equalizer-watch>
						<a href="{{ url('/partners#partner-tesco') }}">
							<img src="{{ asset('assets/img/logo-tesco.png') }}">
						</a>
					</div>
					
					<div class="item" data-equalizer-watch>
						<a href="{{ url('/partners#partner-star-deli') }}">
							<img src="{{ asset('assets/img/logo-star-deli.png') }}">
						</a>
					</div>
				</div>
				
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

@if (isset($upcoming_events))
	<section class="upcoming-events">
		<div class="grid-container">
			<div class="grid-x grid-padding-x align-center">
				<div class="cell medium-11 large-10 text-center">
					<h2>Upcoming Events</h2>
					
					<div class="events grid-x grid-padding-x align-justify text-left">

						@foreach ($upcoming_events as $event)
							<div class="event cell medium-12 large-5">
								<div class="grid-x grid-padding-x">
									<div class="cell medium-3 large-5 hide-for-xsmall-only hide-for-small-only">
										@if ($event->featured_image)
											<img src="{{ asset('storage/' . $event->featured_image->path) }}">
										@endif
									</div>
									
									<div class="cell xsmall-12 medium-9 large-7 text">
										<p class="title">
											{{ $event->name }}
										</p>
										
										<p>
											{{ $event->start_at }}
											<br>
											{{ $event->location }}
										</p>
										
										<p>
											{{ $event->description }}
											<br> 
											<a href="{{ url('events/detail/' . $event->id) }}">
												Continue
											</a>
										</p>
									</div>
								</div>
							</div>
						@endforeach

					</div>
					
					<a class="cta"  href="{{ url('events') }}">View all events</a>
				</div>
			</div>
		</div>
	</section>
@endif

<section class="yayasan-hog">
	<div class="grid-container">
		<div class="grid-x grid-padding-x">
			<div class="cell xsmall-12 large-7">
				<h2>About YAYASAN HOG</h2>
			</div>
		</div>
		
		<div class="grid-x grid-padding-x">
			<div class="cell xsmall-12 large-7">
				<p><img src="{{ asset('assets/img/logo-yayasan-hog.jpg') }}" class="align left">The Yayasan HOG Indonesian Chapter (YHOG) is a registered charity of bike riders and non-riders alike. The Chapter was incorporated in 1987 and is the first Harley Davidson Owners Group Chapter to be registered outside of the United States. Since our incorporation, we have focused our fund-raising efforts on helping orphanages, and in particular supporting facial reconstructive surgery for infants and children born with harelip or cleft palate defects. By the end of this year YHOG will have helped change the lives of over 3,250 Indonesian children.</p>
			</div>
			
			<div class="cell xsmall-12 large-5">
				<blockquote>&ldquo;The Yayasan HOG committee and members give their time and efforts free of charge, we are proud to say that <strong>over 97 cents of every dollar</strong> raise goes straight to supporting our surgical programs, bettering young and impoverished Indonesian children’s lives.&rdquo;</blockquote>
			</div>
		</div>
	</div>
</section>
@endsection

@push('page-styles')
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/slick.css') }}">
@endpush

@push('page-scripts')
<script src="{{ asset('assets/js/vendor/slick.js') }}"></script>

<script>
	var count = 0;
	var w = 0;
	
	console.log(Foundation.MediaQuery.current);
	
	if (Foundation.MediaQuery.is('xsmall only') || Foundation.MediaQuery.is('small only')) {
		$('#partner-slider').slick({
			arrows: false,
			dots: true,
			infinite: false,
			slidesToShow: 1,
			slidesToScroll: 1,
		});

	} else if (Foundation.MediaQuery.is('medium only')) {
		$('#partner-slider').slick({
			infinite: false,
			nextArrow: '<button class="slick-arrow slick-next"><i class="fas fa-chevron-right fa-2x"></i></button>',
			prevArrow: '<button class="slick-arrow slick-prev"><i class="fas fa-chevron-left fa-2x"></i></button>',
			slidesToShow: 3,
			slidesToScroll: 1,
		});
		
	} else if (Foundation.MediaQuery.atLeast('large')) {
		$('#partner-slider').slick({
			infinite: false,
			nextArrow: '<button class="slick-arrow slick-next"><i class="fas fa-chevron-right fa-2x"></i></button>',
			prevArrow: '<button class="slick-arrow slick-prev"><i class="fas fa-chevron-left fa-2x"></i></button>',
			slidesToShow: 5,
			slidesToScroll: 1,
		});
	}
</script>
@endpush