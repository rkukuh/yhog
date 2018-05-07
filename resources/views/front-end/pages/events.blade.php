@extends('front-end.templates._base')

@push('page-meta-tags')
	<title>Events - Yayasan HOG</title>
@endpush

@push('body-class')
	<body id="blog-page">
@endpush

@section('content')

	@if (isset($latest_event))
		<section class="featured">
			<div class="grid-container">
				<div class="grid-x grid-padding-x">
					<div class="cell xsmall-12 large-6">
						@if ($latest_event->featured_image)
							<img src="{{ asset('storage/' . $latest_event->featured_image->path) }}">
						@endif
					</div>
					
					<div class="cell xsmall-12 large-6">
						<h2>
							<span>{{ $latest_event->name }}</span>
						</h2>
						
						<p>
							<strong>Date:</strong> {{ $latest_event->start_at->format('d-M-Y h:i') }}&nbsp;&nbsp;
							<strong>Location:</strong> {{ $latest_event->location }}&nbsp;&nbsp;
							<strong>Cost:</strong> {{ number_format($latest_event->price) }} IDR
							<br>
							<strong>Details:</strong> 
							{{ $latest_event->description }}&hellip;
						</p>
						
						<p class="text-right">
							<a class="cta" href="{{ url('events/detail/' . $latest_event->id) }}">
								Full Details
							</a>
						</p>
					</div>
				</div>
			</div>
		</section>
	@endif

	<section class="article-list">
		<div class="grid-container">
			<div class="grid-x grid-padding-x">
				<ul class="article-filter">
					<li>
						<span>Sort by event type:</span>
					</li>
					
				@foreach ($categories as $category)
					<li>
						<a>{{ $category->name }}</a>
					</li>	
				@endforeach
				</ul>
			</div>
		</div>
		
		@if (isset($events))
			<div class="grid-container">

				@foreach ($events->chunk(4) as $chunked_events)
					<div class="items grid-x grid-margin-x xsmall-up-1 medium-up-2 large-up-4" data-equalizer>

						@foreach ($chunked_events as $event)
							<div class="item cell">
								@if ($event->featured_image)
									<img src="{{ asset('storage/' . $event->featured_image->path) }}">
								@endif
								
								<h3>{{ $event->name }}</h3>
								
								<p data-equalizer-watch>
									<strong>Date:</strong> {{ $event->start_at->format('d-M-Y h:i') }}
									<br>
									<strong>Location:</strong> {{ $event->location }}
									<br>
									<strong>Cost:</strong> {{ number_format($event->price) }} IDR
									<br>
									<strong>Details:</strong> 
									{{ $event->description }}&hellip;</p>
								
								<div class="text-center">
									<a class="cta" href="{{ url('events/detail/' . $event->id) }}">
										Full Details
									</a>
								</div>
							</div>
						@endforeach

					</div>
				@endforeach
				
			</div>
		@endif
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
@endpush