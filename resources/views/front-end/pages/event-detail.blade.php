@extends('front-end.templates._base')

@push('page-meta-tags')
	<title>Events Detail - Yayasan HOG</title>
@endpush

@push('body-class')
	<body id="article-page">
@endpush

@section('content')
	<section class="featured">
		<div class="grid-container">
			<div class="grid-x grid-padding-x">
				<div class="cell xsmall-12 large-6">
					@if ($event->featured_image)
						<img src="{{ asset('storage/' . $event->featured_image->path) }}">
					@endif
				</div>
				
				<div class="cell xsmall-12 large-6">
					<h2>
						<span>{{ $event->name }}</span>
					</h2>
					
					<p>
						<strong>Date:</strong> {{ $event->start_at->format('d-M-Y h:i') }}
						<br>
						<strong>Location:</strong> {{ $event->location }}
						<br>
						<strong>Cost:</strong> {{ number_format($event->price) }} IDR
					</p>
				</div>
			</div>
		</div>
	</section>

	<section class="detail">
		<div class="grid-container">
			<div class="grid-x grid-padding-x">
				<div class="cell xsmall-12 large-9">
					<p>
						{!! $event->description !!}
					</p>
					
					<a class="cta">View photos from past events</a>
					
					<h3>Location</h3>
					
					<div id="map" class="map"></div>
					
					<h3>Register</h3>
					
					<form>
						<div class="grid-x grid-padding-x">
							<div class="cell xsmall-12 medium-6">
								<label>First name
									<input type="text">
								</label>
							</div>
							
							<div class="cell xsmall-12 medium-6">
								<label>Last name
									<input type="text">
								</label>
							</div>
						</div>
						
						<div class="grid-x grid-padding-x">
							<div class="cell xsmall-12 medium-6">
								<label>Email
									<input type="email">
								</label>
							</div>
							
							<div class="cell xsmall-12 medium-6">
								<label>Phone
									<input type="text">
								</label>
							</div>
						</div>
						
						<div class="grid-x grid-padding-x">
							<div class="cell xsmall-12">
								<label>Number of tickets</label>
									
								<select>
									<option>1</option>
									<option>2</option>
									<option>3</option>
								</select>
								
								<p>@ 75.000 IDR / ticket</p>
							</div>
						</div>
						
						<div class="grid-x grid-padding-x">
							<div class="cell xsmall-12">
								<button class="cta">Purchase</button>
							</div>
						</div>
					</form>
				</div>
				
				<aside class="cell xsmall-12 large-3">
					<img src="{{ asset('assets/img/logo-sponsor.png') }}">
				</aside>
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
@endsection

@push('page-styles')
@endpush

@push('page-scripts')
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDKJIH7Ywy7JzOcsm9NhbpiRnCraSx5Dzk"></script>

	<script>
		var option = {
			center: new google.maps.LatLng(-6.1833, 106.8333),
			zoom: 16,
			scrollwheel: false,
			navigationControl: false,
			mapTypeControl: false,
			scaleControl: false,
			draggable: false,
			mapTypeId: google.maps.MapTypeId.ROADMAP };
			
		$(document).ready(function(){
			$('#map').height($('#map').width() * (9 / 16)); 
		});
		
		$(window).on('load', function() {
			var map = new google.maps.Map(document.getElementById("map"),  option);
		});
	</script>
@endpush