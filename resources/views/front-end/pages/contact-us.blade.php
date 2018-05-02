@extends('front-end.templates._base')

@push('page-meta-tags')
<title>Contact Yayasan HOG</title>
@endpush

@push('body-class')
<body id="contact-page">
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

<section>
	<div class="grid-container">
		<div class="grid-x grid-padding-x">
			<div class="cell xsmall-12 large-6">
				<h3>Inquiry Form</h3>
				
				<form data-abide novalidate="">
					<div class="callout">
						<p>Your inquiry has been sent.<br>Please allow time for our staff to get back to you.</p>
						
						<a data-close-callout><i class="fas fa-times"></i></a>
					</div>
					
					<label>
						Name <small>(required)</small>
						<input type="text" name="name" required>
					</label>
					
					<label>
						Email <small>(required)</small>
						<input type="email" name="email" required>
					</label>
					
					<label>
						Message <small>(required)</small>
						<textarea name="message" rows="8" required></textarea>
					</label>
					
					<button class="cta"><i class="fas fa-spinner fa-spin"></i><span>Submit</span></button>
				</form>
			</div>
			
			<div class="cell xsmall-12 large-5 xsmall-offset-0 large-offset-1">
				<h3>Head Office</h3>
				
				<p><strong>Yayasan HOG</strong><br>Lorem ipsum dolor sit amet<br>consectetur adipisicing elit<br>Jakarta, Indonesia</p>
				
				<p>e: info@yayasanhog.com<br>p: (+62 21) 555 1234</p>
				
				<div id="gmap">
					
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
	
	<div class="grid-container full" data-interchange="[{{ url('interchange/thumbnails/support-thumbnails-xsmall') }}, xsmall], [{{ url('interchange/thumbnails/support-thumbnails-xsmall') }}, small], [{{ url('interchange/thumbnails/support-thumbnails-medium') }}, medium], [{{ url('interchange/thumbnails/support-thumbnails-large') }}, large], [{{ url('interchange/thumbnails/support-thumbnails-large') }}, xlarge], [{{ url('interchange/thumbnails/support-thumbnails-xxlarge') }}, xxlarge], [{{ url('interchange/thumbnails/support-thumbnails-xxxlarge') }}, xxxlarge]">
	</div>
	
	@include('front-end.common.elements.goals')
	
	<div class="grid-container">
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
	function initialize_gmap(el) {
	    var mapLatlang = new google.maps.LatLng(-6.2343499,106.8265362);
	    
	    var mapOptions = {
	        center: mapLatlang,
	        zoom: 15,
	        scrollwheel: false,
			navigationControl: false,
			mapTypeControl: false,
			scaleControl: false,
			draggable: false,
	        mapTypeId: google.maps.MapTypeId.ROADMAP,
	        styles: [{"featureType":"landscape","elementType":"labels","stylers":[{"visibility":"off"}]},{"featureType":"transit","elementType":"labels","stylers":[{"visibility":"off"}]},{"featureType":"poi","elementType":"labels","stylers":[{"visibility":"off"}]},{"featureType":"water","elementType":"labels","stylers":[{"visibility":"off"}]},{"featureType":"road","elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"stylers":[{"hue":"#00aaff"},{"saturation":-100},{"gamma":2.15},{"lightness":12}]},{"featureType":"road","elementType":"labels.text.fill","stylers":[{"visibility":"on"},{"lightness":24}]},{"featureType":"road","elementType":"geometry","stylers":[{"lightness":57}]}]
	        };

	    var map = new google.maps.Map(document.getElementById(el),  mapOptions);

	    var marker = new google.maps.Marker({
		    position: mapLatlang,
		    map: map,
		  });
	}
	
	$(document).ready(function() {
		initialize_gmap("gmap");
	});
	
	
	$(document).on('click', '[data-close-callout]', function(){
		$('.callout').removeClass('show');
	});
	
	$('form').bind('submit', function(e) {
		e.preventDefault();
		
	}).on('invalid.zf.abide', function(ev, elm) {
		console.log(ev);
			
	}).on('formvalid.zf.abide', function(ev, elm) {
		thisForm = $(ev.target);
	    formData = thisForm.serialize();
	    console.log(formData);
	    
	    thisForm.addClass('sending');
		thisForm.find('input').attr('disabled', true);
		thisForm.find('textarea').attr('disabled', true);
		thisForm.find('button').attr('disabled', true);
		thisForm.find('span').text('Sending');
		
		$.ajax({
	        type: 'POST',
	        url: '', //
	        data: formData,
	        success: function(response){
	        	response=JSON.parse(response);
	        	console.log(response);
	        	
	        	if (response) {
		        	if (response.success == 1) {
			        	thisForm.removeClass('sending');
			        	thisForm.find('input').attr('disabled', false).val('');
						thisForm.find('textarea').attr('disabled', false).val('');
						thisForm.find('button').attr('disabled', false);
						thisForm.find('span').text('Submit');
						thisForm.find('.callout').css('display', "block");
					}
				}
	        }
		});
	});
</script>
@endpush