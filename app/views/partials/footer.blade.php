<div class="footer-wrapper">

    <div class="footer">
        <div class="container">

            <ul class="footer-links">
                <li><a href='#'>contact us</a></li>
                <li><a href='#'>about us</a></li>
                <li><a href='#'>gallery</a></li>
                <li><a href='#'>events</a></li>

                @if (Auth::check())
                <li><a href='#'>sign out</a></li>
                <li><a href='#'>my profile</a></li>
                @else
                <li><a href='#'>login</a></li>
                <li><a href='#'>sign up</a></li>
                @endif
            </ul>
        </div>
    </div>

    <div class="footer-copyright">
        <span><i class="fa fa-copyright"></i> 2015 Halesowen Model Car Club</span><span class="author">Created by Chris Stroud and Chris Normansell</span>
    </div>
</div>
