<nav class="navbar navbar-default" role="navigation">
	<div class="container">
	<div class="container-fluid">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#main-navbar-collapsable">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="#">Home</a>
		</div>

		<div class="collapse navbar-collapse" id="main-navbar-collapsable">
			<ul class="nav navbar-nav">
				<li> {{ link_to_route('event.index', 'Events') }} </li>
				<li><a href="#">My Bookings</a></li>
				<li><a href="#">Admin</a></li>
				<li>
				@if (Session::get('user') != null)
					<p class="navbar-text">{{ Session::get('user')->Name() }} - {{ link_to('signout', 'Sign out', ['navbar-link']) }}</p>
				@else
					{{link_to('login', 'Login')}}
				@endif
				</li>
			</ul>
		</div>
	</div>
	</div>
</nav>
