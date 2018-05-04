@extends('front-end.templates._base')

@push('page-meta-tags')
	<title>Blog Article - Yayasan HOG</title>
@endpush

@push('body-class')
	<body id="article-page">
@endpush

@section('content')
	<section class="featured">
		<div class="grid-container">
			<div class="grid-x grid-padding-x">
				<div class="cell xsmall-12 large-6">
					@if ($post->featured_image)
						<img src="{{ asset('storage/' . $post->featured_image->path) }}">
					@endif
				</div>
				
				<div class="cell xsmall-12 large-6">
					<h2>
						<span>{{ $post->title }}</span>
					</h2>
					
					<p>{{ $post->excerpt }}</p>
				</div>
			</div>
		</div>
	</section>

	<section class="detail">
		<div class="grid-container">
			<div class="grid-x grid-padding-x">
				<div class="cell xsmall-12 large-9">
					<p>
						{!! $post->body !!}
					</p>
				</div>
				
				<aside class="cell xsmall-12 large-3">
					@if ($sponsor->featured_image)
						<a href="{{ $sponsor->url }}" target="_blank">
							<img src="{{ asset('storage/' . $sponsor->featured_image->path) }}">
						</a>
					@endif
				</aside>
			</div>
		</div>
	</section>

	@if (isset($more_posts))
		<section class="article-list">
			<div class="grid-container">
				<div class="grid-x grid-margin-x">
					<div class="cell">
						<h3>Related articles</h3>
					</div>
				</div>
				
				@foreach ($more_posts->chunk(4) as $chunked_more_posts)
					<div class="items grid-x grid-margin-x xsmall-up-1 medium-up-2 large-up-4">

						@foreach ($chunked_more_posts as $post)
							<div class="item cell">
								@if ($post->featured_image)
									<img src="{{ asset('storage/' . $post->featured_image->path) }}">
								@endif
								
								<h3>{{ $post->title }}</h3>
								
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
		</section>
	@endif

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
@endpush