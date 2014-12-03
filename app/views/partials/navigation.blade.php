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
			</div>

			<div class="collapse navbar-collapse" id="main-navbar-collapsable">
				<ul class="nav navbar-nav">
					<li><a href="event.index"><i class="fa fa-home"></i> Events</a></li>
					<li><a href="my-bookings"><i class="fa fa-calendar"></i> My Bookings</a></li>

					@if (Session::get('user') != null && Session::get('user')->isAdmin)
					<li>{{link_to('admin', 'Admin')}}</li>
					@endif

					<li>
						@if (Session::get('user') != null)
						<p class="navbar-text">{{ Session::get('user')->Name() }} - <a href="signout" class="navbar-link">Sign Out <i class="fa fa-sign-out"></i></a></p>
					</li>
					@else
					<a href="login"><i class="fa fa-sign-in"></i> Login</a>

					<li><a href="signup"><i class="fa fa-user"></i> Sign Up</a>
						@endif
					</li>
				</ul>
			</div>
		</div>
	</div>
</nav>
