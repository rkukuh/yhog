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
				<img src="{{ asset('assets/img/event-sample-large.jpg') }}">
			</div>
			
			<div class="cell xsmall-12 large-6">
				<h2><span>Yayasan Harley Owners Group</span><br><span>2018 Charity Golf Scramble</span></h2>
				
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit.</p>
			</div>
		</div>
	</div>
</section>

<section class="detail">
	<div class="grid-container">
		<div class="grid-x grid-padding-x">
			<div class="cell xsmall-12 large-9">
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
				
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
				
				<p>fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
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
				
				<a class="cta">Support Us Today!</a>
			</div>
		</div>
	</div>
</section>
@endsection

@push('page-styles')
@endpush

@push('page-scripts')
@endpush