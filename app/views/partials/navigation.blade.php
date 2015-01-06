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
            <li><a href="{{URL::to('about')}}"><i class="fa fa-info fa-lg icon-spacing-right"></i>About Us</a></li>
            <li><a href="{{URL::to('contact')}}"><i class="fa fa-phone fa-lg icon-spacing-right"></i>Contact Us</a></li>
            <li><a href="{{URL::to('gallery')}}"><i class="fa fa-camera fa-lg icon-spacing-right"></i>Gallery</a></li>

            <li class="dropdown">
                <a href="{{URL::route('event.index')}}" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-flag-checkered fa-lg icon-spacing-right"></i>Race Events<span class="caret"></span></a>
                <ul class="dropdown-menu" role="menu">
                    <li><a href="{{URL::route('event.index')}}"><i class="fa fa-flag-checkered fa-lg icon-spacing-right"></i>View Events</a></li>
                    <li><a href="{{URL::action('BookingController@viewAll')}}"><i class="fa fa-calendar fa-lg icon-spacing-right"></i>My Bookings</a></li>
                </ul>
            </li>
          @if (Auth::check() && Auth::user()->is_admin)
          <li><a href="{{URL::action('HomeController@AdminHome')}}"><i class="fa fa-gears fa-lg icon-spacing-right"></i>Admin</a></li>
          @endif
        </ul>
        <ul class="nav navbar-nav navbar-right">
          <li class="nav-divider"></li>
          @if (Auth::check())
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="svg-icon svg-user icon-spacing-right"></i>{{ Auth::user()->forename }}<span class="caret icon-spacing-left"></span></a>
            <ul class="dropdown-menu" role="menu">
              <li><a href="{{ route('user.show', Auth::id()) }}">
                <i class="fa fa-newspaper-o icon-spacing-right"></i>Profile
              </a></li>
              <li><a href="{{ route('settings.profile') }}">
                <i class="fa fa-gear icon-spacing-right"></i>Settings
                </a></li>
            </ul>
          </li>
            <li><a href="{{URL::action('UserController@signOut')}}" class="navbar-link">Sign Out<i class="fa fa-sign-out fa-lg icon-spacing-left"></i></a>
              </li>
          @else
            <li><a href="{{URL::action('UserController@login')}}"><i class="fa fa-sign-in fa-lg icon-spacing-right"></i>Login</a></li>

          <li><a href="{{URL::action('UserController@signUp')}}"><i class="fa fa-user fa-lg icon-spacing-right"></i>Sign Up</a></li>
          @endif
        </ul>
      </div>
    </div>
  </div>
</nav>
