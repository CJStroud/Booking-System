<nav class="navbar navbar-hmcc" role="navigation">
  <div class="container">
    <div class="container-fluid">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#main-navbar-collapsable">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="/"><img src="/img/logo.svg" alt="Brand"></a>
      </div>

      <div class="collapse navbar-collapse" id="main-navbar-collapsable">
        <ul class="nav navbar-nav">
          <li><a href="{{URL::route('event.index')}}"><i class="fa fa-users fa-lg fa-spacing-right"></i>Events</a></li>
          <li><a href="{{URL::action('BookingController@viewAll')}}"><i class="fa fa-calendar fa-lg fa-spacing-right"></i>My Bookings</a></li>

          @if (Auth::check() && Auth::user()->is_admin)
          <li><a href="{{URL::action('HomeController@AdminHome')}}"><i class="fa fa-gears fa-lg fa-spacing-right"></i>Admin</a></li>
          @endif
        </ul>
        <ul class="nav navbar-nav navbar-right">
          <li class="nav-divider"></li>
          @if (Auth::check())
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="svg-icon svg-user fa-spacing-right"></i>{{ Auth::user()->forename }}<span class="caret"></span></a>
            <ul class="dropdown-menu" role="menu">
              <li><a href="{{ route('user.show', Auth::id()) }}">
                <i class="fa fa-user fa-spacing-right"></i>Profile
              </a></li>
              <li><a href="{{ route('user.edit', Auth::id()) }}">
                <i class="fa fa-gear fa-spacing-right"></i>Settings
                </a></li>
            </ul>
          </li>
            <li><a href="{{URL::action('UserController@signOut')}}" class="navbar-link">Sign Out<i class="fa fa-sign-out fa-lg fa-spacing-left"></i></a>
              </li>
          @else
            <li><a href="{{URL::action('UserController@login')}}"><i class="fa fa-sign-in fa-lg fa-spacing-right"></i>Login</a></li>

          <li><a href="{{URL::action('UserController@signUp')}}"><i class="fa fa-user fa-lg fa-spacing-right"></i>Sign Up</a></li>
          @endif
        </ul>
      </div>
    </div>
  </div>
</nav>
