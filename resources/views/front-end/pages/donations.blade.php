@extends('front-end.templates._base')

@push('page-meta-tags')
<title>Help us, help more kids - Yayasan HOG</title>
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
				<h3>Donation Form</h3>
				
				<form data-abide novalidate="">
					<div class="callout">
						<p>Your donation has been sent.<br>Please allow time for our staff to get back to you.</p>
						
						<a data-close-callout><i class="fas fa-times"></i></a>
					</div>
					
					<div class="grid-x grid-padding-x">
						<div class="cell xsmall-12 large-6">
							<label>
								First Name <small>(required)</small>
								<input type="text" name="first_name" required>
							</label>
						</div>
						
						<div class="cell xsmall-12 large-6">
							<label>
								Last Name <small>(required)</small>
								<input type="text" name="last_name" required>
							</label>
						</div>
					</div>
					
					<label>
						Email <small>(required)</small>
						<input type="email" name="email" required>
					</label>
					
					
					<div class="grid-x grid-padding-x">
						<div class="cell xsmall-12 large-6">
							<label>Amount <small>(required)</small></label>
							
							<div class="input-group">
								<select>
									<option>IDR</option>
									<option>USD</option>
								</select>
								
								<input type="text" name="amount" required pattern="number">
							</div>
						</div>
					</div>
					
					<button class="cta"><i class="fas fa-spinner fa-spin"></i><span>Submit</span></button>
				</form>
			</div>
			
			<div class="cell xsmall-12 large-5 xsmall-offset-0 large-offset-1">
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