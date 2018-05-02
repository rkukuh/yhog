@extends('front-end.templates._base')

@push('page-meta-tags')
	<title>Blog - Yayasan HOG</title>
@endpush

@push('body-class')
	<body id="blog-page">
@endpush

@section('content')

	@if (isset($latest_post))
		<section class="featured">
			<div class="grid-container">
				<div class="grid-x grid-padding-x">
					<div class="cell xsmall-12 large-6">
						@if ($latest_post->featured_image)
							<img src="{{ asset('storage/' . $latest_post->featured_image->path) }}">
						@endif
					</div>
					
					<div class="cell xsmall-12 large-6">
						<h2>
							<span>{{ $latest_post->title }}</span>
						</h2>
						
						<p>
							{{ $latest_post->excerpt }}&hellip;
						</p>
						
						<p class="text-right">
							<a class="cta" href="{{ url('blog/article/' . $latest_post->id) }}">
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
				<form class="article-filter cell xsmall-12">
					<fieldset>
						<legend>Sort by article category:</legend>
						
						@foreach ($categories as $category)
							<div class="faux">
								<input type="radio" name="sort" id="sort-{{ $category->id }}">
								
								<label for="sort-{{ $category->id }}">
									{{ $category->name }}
								</label>
							</div>
						@endforeach
						
					</fieldset>
				</form>
			</div>
		</div>
		
		@if (isset($posts))
			<div class="grid-container">

				@foreach ($posts->chunk(4) as $chunked_posts)
					<div class="items grid-x grid-margin-x xsmall-up-1 medium-up-2 large-up-4">

						@foreach ($chunked_posts as $post)
							<div class="item cell">
								@if ($post->featured_image)
									<img src="{{ asset('storage/' . $post->featured_image->path) }}">
								@endif
								
								<h3>{{ $post->name }}</h3>
								
								<p>{{ $post->excerpt }}&hellip;</p>
								
								<div class="text-center">
									<a class="cta" href="{{ url('blog/article/' . $post->id) }}">
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