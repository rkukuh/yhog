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

					<div id="lat" style="display: none;">{{ $lat }}</div>
					<div id="lng" style="display: none;">{{ $lng }}</div>
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
					
					@if ( ! $event->galleries->isEmpty() )
						<a class="cta" href="{{ url('gallery/detail/' . $event->galleries()->first()->id) }}">
							View photos from past events
						</a>
					@endif
					
					@if ($event->location)
						<h3>Location</h3>
						
						<div id="map" class="map"></div>
					@endif
					
					<h3>Register</h3>
					
					<form action="{{ route('participant.store') }}" method="post">
						@csrf

						<input type="hidden" name="event_id" value="{{ $event->id }}">

						<div class="grid-x grid-padding-x">
							<div class="cell xsmall-12 medium-6">
								<label>
									First Name <small>(required)</small>
									<input type="text" name="first_name" 
											value="{{ old('first_name') ?: '' }}" required>
								</label>
							</div>
							
							<div class="cell xsmall-12 medium-6">
								<label>
									Last Name <small>(required)</small>
									<input type="text" name="last_name" 
											value="{{ old('last_name') ?: '' }}" required>
								</label>
							</div>
						</div>
						
						<div class="grid-x grid-padding-x">
							<div class="cell xsmall-12 medium-6">
								<label>
									Email <small>(required)</small>
									<input type="email" name="email" 
											value="{{ old('email') ?: '' }}" required>
								</label>
							</div>
							
							<div class="cell xsmall-12 medium-6">
								<label>
									Phone
									<input type="text" name="phone" 
											value="{{ old('phone') ?: '' }}" required>
								</label>
							</div>
						</div>
						
						<div class="grid-x grid-padding-x">
							<div class="cell xsmall-12">
								<label>Number of tickets</label>
									
								<select name="quantity">
									<option>1</option>
									<option>2</option>
									<option>3</option>
									<option>4</option>
									<option>5</option>
									<option>10</option>
								</select>
								
								<p>
									@ {{ number_format($event->normal_or_earlybird_price) }} IDR 
									/ ticket
								</p>

								<input type="hidden" name="price" value="{{ $event->normal_or_earlybird_price }}">
							</div>
						</div>
						
						<div class="grid-x grid-padding-x">
							<div class="cell xsmall-12">
								<button type="submit" class="cta">Purchase</button>
							</div>
						</div>
					</form>
				</div>
				
				<aside class="cell xsmall-12 large-3">
					@if ($sponsor)
						<a href="{{ $sponsor->url }}" target="_blank">
							<img src="{{ asset('storage/' . $sponsor->featured_image->path) }}">
						</a>
					@endif
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
		var lat = document.getElementById("lat").innerText;
		var lng = document.getElementById("lng").innerText;
		
		// console.log(lat + ', ' + lng);

		var option = {
			center: new google.maps.LatLng(lat, lng),
			zoom: 16,
			scrollwheel: false,
			navigationControl: false,
			mapTypeControl: false,
			scaleControl: false,
			draggable: false,
			mapTypeId: google.maps.MapTypeId.ROADMAP 
		};
			
		$(document).ready(function() {
			$('#map').height($('#map').width() * (9 / 16)); 
		});
		
		$(window).on('load', function() {
			var map = new google.maps.Map(document.getElementById("map"),  option);
		});
	</script>
@endpush