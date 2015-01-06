<div class="footer-wrapper">

    <div class="footer">
        <div class="container">

            <ul class="footer-links">
                <li><a href="{{ route('contact') }}">contact us</a></li>
                <li><a href="{{ route('about') }}">about us</a></li>
                <li><a href="{{ route('gallery') }}">gallery</a></li>
                <li><a href="{{ route('event.index') }}">events</a></li>

                @if (Auth::check())
                  <li><a href="{{ route('settings.profile') }}">my profile</a></li>
                  <li><a href="{{ route('user.logout') }}">log out</a></li>
                @else
                  <li><a href="{{ route('user.login') }}">login</a></li>
                  <li><a href="{{ route('user.signup') }}">sign up</a></li>
                @endif
            </ul>
        </div>
    </div>

    <div class="footer-copyright">
        <span><i class="fa fa-copyright"></i> 2015 Halesowen Model Car Club</span><span class="author">Created by Chris Stroud and Chris Normansell</span>
    </div>
</div>
