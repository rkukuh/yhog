<ul class="main-navigation">
	<li @if($current_page == "home") class="active" @endif>
		<a href="{{ url('') }}">Home</a>
	</li>
	
	<li @if($current_page == "our-projects") class="active" @endif>
		<a href="{{ url('/our-projects') }}">Our Projects</a>
	</li>
	
	<li @if($current_page == "fundraising") class="active" @endif>
		<a href="{{ url('/fundraising') }}">Fundraising</a>
	</li>
	
	<li @if($current_page == "events") class="active" @endif>
		<a href="{{ url('/events') }}">Events</a>
	</li>
	
	<li @if($current_page == "about-us") class="active" @endif>
		<a href="{{ url('/about-us') }}">About Us</a>
	</li>
	
	<li @if($current_page == "blog") class="active" @endif>
		<a href="{{ url('/blog') }}">Blog</a>
	</li>
	
	<li @if($current_page == "gallery") class="active" @endif>
		<a href="{{ url('/gallery') }}">Gallery</a>
	</li>
	
	<li @if($current_page == "contact-us") class="active" @endif>
		<a href="{{ url('/contact-us') }}">Contact Us</a>
	</li>
</ul>