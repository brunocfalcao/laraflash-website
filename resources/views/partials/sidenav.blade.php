<header class="sidenav" id="sidenav">
    <!-- close -->
    <div class="sidenav__close">
        <button class="sidenav__close-button" id="sidenav__close-button" aria-label="close sidenav">
    <i class="ui-close sidenav__close-icon"></i>
  </button>
    </div>
    <!-- Nav -->
    <nav class="sidenav__menu-container">
        <ul class="sidenav__menu" role="menubar">
            <li>
                <a href="{{ route('about.show') }}" class="sidenav__menu-url">About</a>
            </li>
            <li>
                <a href="{{ route('contact.show') }}" class="sidenav__menu-url">Contact</a>
            </li>
            <li>
                <a href="{{ url('/') }}" class="sidenav__menu-url">Latest News</a>
            </li>
            <li>
                @isset($total)
                <a href="#" class="sidenav__menu-url">Random News ({{ $total }})</a>
                @else
                <a href="#" class="sidenav__menu-url">Random News</a>
                @endisset
                <button class="sidenav__menu-toggle" aria-haspopup="true" aria-label="Open dropdown"><i class="ui-arrow-down"></i></button>
                <ul class="sidenav__menu-dropdown">
                    <li><a href="{{ url('/?q=1') }}" class="sidenav__menu-url">Last 30 days</a></li>
                    <li><a href="{{ url('/?q=2') }}" class="sidenav__menu-url">Last 60 days</a></li>
                    <li><a href="{{ url('/?q=99') }}" class="sidenav__menu-url">Since ages!</a></li>
                </ul>
            </li>
            <li>
                <a href="#" class="sidenav__menu-url">Laravel</a>
                <button class="sidenav__menu-toggle" aria-haspopup="true" aria-label="Open dropdown"><i class="ui-arrow-down"></i></button>
                <ul class="sidenav__menu-dropdown">
                    <li><a href="https://laravel.com" target="_blank" class="sidenav__menu-url">Laravel.com</a></li>
                    <li><a href="https://laravel.com/docs" target="_blank" class="sidenav__menu-url">Laravel Docs</a></li>
                    <li><a href="https://laravel.com/api/5.6/index.html" target="_blank" class="sidenav__menu-url">Laravel Namespaces</a></li>
                    <li><a href="https://envoyer.io" target="_blank" class="sidenav__menu-url">Envoyer</a></li>
                    <li><a href="https://horizon.laravel.com" target="_blank" class="sidenav__menu-url">Horizon</a></li>
                    <li><a href="https://lumen.laravel.com" target="_blank" class="sidenav__menu-url">Lumen</a></li>
                    <li><a href="https://lumen.laravel.com" target="_blank" class="sidenav__menu-url">Spark</a></li>
                    <li><a href="https://nova.laravel.com" target="_blank" class="sidenav__menu-url">Nova</a></li>
                    <li><a href="https://lumen.laracasts.com" target="_blank" class="sidenav__menu-url">Laracasts</a></li>
                </ul>
            </li>
            <li>
                <a href="#" class="sidenav__menu-url">Communities</a>
                <button class="sidenav__menu-toggle" aria-haspopup="true" aria-label="Open dropdown"><i class="ui-arrow-down"></i></button>
                <ul class="sidenav__menu-dropdown">
                    <li><a href="https://www.laravel.pt" target="_blank" class="sidenav__menu-url">Laravel Portugal</a></li>
                    <li><a href="http://www.laravellive.in" target="_blank" class="sidenav__menu-url">Laravel India</a></li>
                    <li><a href="https://laravel.brussels" target="_blank" class="sidenav__menu-url">Laravel Brussels</a></li>
                    <li><a href="https://laravelphp.uk" target="_blank" class="sidenav__menu-url">Laravel UK</a></li>
                    <li><a href="https://laravel.fr" target="_blank" class="sidenav__menu-url">Laravel France</a></li>
                    <li><a href="https://laravel.gr" target="_blank" class="sidenav__menu-url">Laravel Greece</a></li>
                    <li><a href="https://laravel-italia.it" target="_blank" class="sidenav__menu-url">Laravel Italy</a></li>
                    <li><a href="https://laravel.hu" target="_blank" class="sidenav__menu-url">Laravel Hungary</a></li>
                    <li><a href="https://laravel.ru" target="_blank" class="sidenav__menu-url">Laravel Russia</a></li>
                    <li><a href="https://laravel.jp" target="_blank" class="sidenav__menu-url">Laravel Japan</a></li>
                    <li><a href="https://www.laravelnigeria.com" target="_blank" class="sidenav__menu-url">Laravel Nigeria</a></li>
                    <li><a href="https://www.meetup.com/Laravel-Austin/" target="_blank" class="sidenav__menu-url">Laravel Austin</a></li>
                    <li><a href="https://laravel.io" target="_blank" class="sidenav__menu-url">Laravel.io</a></li>
                </ul>
            </li>
            <li>
                <a href="https://www.laraning.com" target="_blank" class="sidenav__menu-url">Laraning</a>
            </li>
        </ul>
    </nav>
    <div class="socials sidenav__socials">
        <a class="social social-facebook" href="#" target="_blank" aria-label="facebook">
            <i class="ui-facebook"></i>
        </a>
        <a class="social social-twitter" href="http://twitter.com/_laraflash" target="_blank" aria-label="twitter">
            <i class="ui-twitter"></i>
        </a>
    </div>
</header>
