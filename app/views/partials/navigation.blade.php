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
				<a class="navbar-brand" href="/"><img src="img/logo.svg" alt="Brand"></a>
			</div>

			<div class="collapse navbar-collapse" id="main-navbar-collapsable">
				<ul class="nav navbar-nav">
					<li><a href="{{URL::route('event.index')}}"><i class="fa fa-home"></i> Events</a></li>
					<li><a href="{{URL::action('BookingController@viewAll')}}"><i class="fa fa-calendar"></i> My Bookings</a></li>

					@if (Auth::check() && Auth::user()->is_admin)
					<li><a href="{{URL::action('HomeController@AdminHome')}}"><i class="fa fa-ban"></i> Admin</a></li>
					@endif

					<li>
						@if (Auth::check())
						<p class="navbar-text">{{ Auth::user()->forename . ' ' .Auth::user()->surname }} - <a href="{{URL::action('UserController@signOut')}}" class="navbar-link">Sign Out <i class="fa fa-sign-out"></i></a></p>
					</li>
					@else
					<a href="{{URL::action('UserController@login')}}"><i class="fa fa-sign-in"></i> Login</a>

					<li><a href="{{URL::action('UserController@signUp')}}"><i class="fa fa-user"></i> Sign Up</a>
						@endif
					</li>
				</ul>
			</div>
		</div>
	</div>
</nav>
