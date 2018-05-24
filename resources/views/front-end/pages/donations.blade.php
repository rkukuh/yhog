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
					@if ($donation)
						<h3>Donation Form</h3>
						
						<form action="{{ route('donate.store') }}" method="post" data-abide novalidate="">
							@csrf

							<input type="hidden" name="donation_id" value="{{ $donation->id }}">

							<div class="callout">
								<p>Your donation has been sent.<br>Please allow time for our staff to get back to you.</p>
								
								<a data-close-callout><i class="fas fa-times"></i></a>
							</div>
							
							<div class="grid-x grid-padding-x">
								<div class="cell xsmall-12 large-6">
									<label>
										First Name <small>(required)</small>
										<input type="text" name="first_name" 
												value="{{ old('first_name') ?: '' }}" required>
									</label>
								</div>
								
								<div class="cell xsmall-12 large-6">
									<label>
										Last Name <small>(required)</small>
										<input type="text" name="last_name" 
												value="{{ old('last_name') ?: '' }}" required>
									</label>
								</div>
							</div>
							
							<label>
								Email <small>(required)</small>
								<input type="email" name="email" 
										value="{{ old('email') ?: '' }}" required>
							</label>
							
							<div class="grid-x grid-padding-x">
								<div class="cell xsmall-12">
									<label>Amount <small>(required - min. amount: 50000 IDR)</small></label>
								</div>
								
								<div class="cell xsmall-12 large-6">
									<div class="input-group">
										<select name="currency">
											<option value="IDR">IDR</option>
											<option value="USD">USD</option>
										</select>
										
										<input id="donation-amount" type="number" name="amount"
												value="{{ old('amount') ?: 50000 }}" required>
									</div>
								</div>
								
								<div class="cell xsmall-12 large-3">
									<p id="converted"></p>
								</div>
							</div>
							
							<button type="submit" class="cta">
								<i class="fas fa-spinner fa-spin"></i>
								<span>Submit</span>
							</button>
						</form>
					@else
						<div data-alert class="alert-box warning text-center" style="margin-top: 30px;">
							⚠️ <br>
							There's no donation at all, or no donation selected. <br>
							Please contact your Administrator.
						</div>
					@endif
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
	<script src="{{ asset('assets/js/vendor/jquery.mask.min.js') }}"></script>

	<script>
		// Foundation.Abide.defaults.patterns['money'] = /^\d{1,3}(,\d{3})*(\.\d+)?$/;
		
		// $('#donation-amount').mask('000,000,000,000', {reverse: true});
		var currency;
		var current_currency = "idr";
		var rate;
		var is_idle = true;	
			
		$('[name="currency"]').on('change', function(){
			console.log($(this).find(':selected').val());
			currency = $(this).find(':selected').val();
			
			is_success = false;
			
			if (currency == "usd") {
				$.ajax({
					type: 'GET',
					dataType: 'json',
					url: 'https://www.alphavantage.co/query?function=CURRENCY_EXCHANGE_RATE&from_currency=IDR&to_currency=USD&apikey=USKB2UL65EUP8BLP',
					success: function(response){
						console.log(response["Realtime Currency Exchange Rate"]["5. Exchange Rate"]);
						rate = Number(response["Realtime Currency Exchange Rate"]["5. Exchange Rate"]);
						console.log(rate);
						var amount = Math.round($('#donation-amount').val() * rate);
						
						$('#donation-amount').val(amount);

						var initial_amount = Math.round(50000);
						
						$('#converted').html("&asymp; " + initial_amount.toLocaleString() + " IDR");
						
						is_idle = true;
					}
				});
				
			} else if (currency == "idr") {
				$.ajax({
					type: 'GET',
					dataType: 'json',
					url: 'https://www.alphavantage.co/query?function=CURRENCY_EXCHANGE_RATE&from_currency=USD&to_currency=IDR&apikey=USKB2UL65EUP8BLP',
					success: function(response){
						console.log(response["Realtime Currency Exchange Rate"]["5. Exchange Rate"]);
						rate = Number(response["Realtime Currency Exchange Rate"]["5. Exchange Rate"]);
						console.log(rate);
						var amount = Math.round($('#donation-amount').val() * rate);
						
						$('#donation-amount').val(amount);
						
						$('#converted').empty();
						
						is_idle = true;
					}
				});
				
			}
		});
		
		$('[name="amount"]').on('change', function(){
			console.log($(this).val());
			
			if ($('[name="currency"]').val() == "usd" && is_idle) {
				$.ajax({
					type: 'GET',
					dataType: 'json',
					url: 'https://www.alphavantage.co/query?function=CURRENCY_EXCHANGE_RATE&from_currency=USD&to_currency=IDR&apikey=USKB2UL65EUP8BLP',
					success: function(response){
						console.log(response["Realtime Currency Exchange Rate"]["5. Exchange Rate"]);
						rate = Number(response["Realtime Currency Exchange Rate"]["5. Exchange Rate"]);
						console.log(rate);
						var amount = Math.round($('#donation-amount').val() * rate);
						
						$('#converted').html("&asymp;" + " " + amount.toLocaleString() + " IDR");
					}
				});
			}
		});
	</script>
@endpush