@extends('front-end.templates._base')

@push('page-meta-tags')
<title></title>
@endpush

@push('body-class')
<body id="event-detail-page">
@endpush

@section('content')
<section class="featured">
	<div class="grid-container">
		<div class="grid-x grid-padding-x">
			<div class="cell xsmall-12 large-6">
				<img src="{{ asset('assets/img/event-sample-large.jpg') }}">
			</div>
			
			<div class="cell xsmall-12 large-6">
				<h2><span>Yayasan Harley Owners Group</span><br><span>2018 Charity Golf Scramble</span></h2>
				
				<p><strong>Date:</strong> MM/DD/YYYY<br><strong>Location:</strong> Jakarta<br><strong>Cost:</strong> 150.000 IDR</p>
			</div>
		</div>
	</div>
</section>

<section class="detail">
	<div class="grid-container">
		<div class="grid-x grid-padding-x">
			<div class="cell xsmall-12 large-9">
				<p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
				
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
				
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
				
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
			
			<div class="cell xsmall-12 large-3">
				<img src="{{ asset('assets/img/logo-sponsor.png') }}">
			</div>
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
				
				<a class="cta">Support Us Today!</a>
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