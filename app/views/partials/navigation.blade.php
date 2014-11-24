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
				<li>{{link_to('my-bookings', 'My Bookings')}}</li>

				@if (Session::get('user') != null && Session::get('user')->isAdmin)
					<li>{{link_to('admin', 'Admin')}}</li>
				@endif

				<li>
				@if (Session::get('user') != null)
					<p class="navbar-text">{{ Session::get('user')->Name() }} - {{ link_to('signout', 'Sign out', ['navbar-link']) }}</p>
				</li>
				@else
					{{link_to('login', 'Login')}}
					<li>{{link_to('signup', 'Sign up')}}
				@endif
				</li>
			</ul>
		</div>
	</div>
	</div>
</nav>
