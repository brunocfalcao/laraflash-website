<!-- Navigation -->
<header class="nav">
    <div class="nav__holder nav--sticky">
        <div class="container relative">
            <div class="flex-parent">
                <!-- Side Menu Button -->
                <button class="nav-icon-toggle" id="nav-icon-toggle" aria-label="Open side menu">
                  <span class="nav-icon-toggle__box">
                    <span class="nav-icon-toggle__inner"></span>
                  </span>
                </button>
                <!-- Logo -->
                <a href="{{ url('/') }}" class="logo">
                    <img class="logo__img" src="img/logo_default.png" srcset="img/logo_default.png 1x, img/logo_default@2x.png 2x" alt="logo">
                </a>
                <!-- Nav-wrap -->
                <nav class="flex-child nav__wrap d-none d-lg-block">
                    <ul class="nav__menu">
                        <li>
                            <a href="{{ url('/') }}">Latest News</a>
                        </li>
                        <li class="nav__dropdown">
                            @isset($total)
                            <a href="#">Random News ({{ $total }})</a>
                            @else
                            <a href="#">Random News</a>
                            @endisset
                            <ul class="nav__dropdown-menu">
                                <li><a href="{{ url('?q=1') }}">Last 30 days</a></li>
                                <li><a href="{{ url('?q=2') }}">Last 60 days</a></li>
                                <li><a href="{{ url('?q=99') }}">Since ages!</a></li>
                            </ul>
                        </li>
                        <li class="nav__dropdown">
                          <a href="#">Laravel</a>
                          <ul class="nav__dropdown-menu">
                            <li><a href="https://www.laravel.com" target="_blank">Laravel.com</a></li>
                            <li><a href="https://www.laravel.com/docs" target="_blank">Laravel Docs</a></li>
                            <li><a href="https://laravel.com/api/5.6/index.html" target="_blank">Laravel Namespaces</a></li>
                            <li><a href="https://envoyer.io" target="_blank">Envoyer</a></li>
                            <li><a href="https://horizon.laravel.com" target="_blank">Horizon</a></li>
                            <li><a href="https://lumen.laravel.com" target="_blank">Lumen</a></li>
                            <li><a href="https://spark.laravel.com" target="_blank">Spark</a></li>
                            <li><a href="https://nova.laravel.com" target="_blank">Nova</a></li>
                            <li><a href="https://laravel.com/certification" target="_blank">Certification</a></li>
                          </ul>
                        </li>
                        <li class="nav__dropdown">
                          <a href="#">Communities</a>
                          <ul class="nav__dropdown-menu">
                            <li><a href="https://www.laravel.pt" target="_blank">Laravel Portugal</a></li>
                            <li><a href="http://www.laravellive.in" target="_blank">Laravel India</a></li>
                            <li><a href="http://laravel.brussels" target="_blank">Laravel Brussels</a></li>
                            <li><a href="https://laravelphp.uk" target="_blank">Laravel UK</a></li>
                            <li><a href="https://laravel.fr" target="_blank">Laravel France</a></li>
                            <li><a href="https://laravel.gr" target="_blank">Laravel Greece</a></li>
                            <li><a href="http://laravel-italia.it" target="_blank">Laravel Italy</a></li>
                            <li><a href="https://laravel.hu" target="_blank">Laravel Hungary</a></li>
                            <li><a href="https://laravel.ru" target="_blank">Laravel Russia</a></li>
                            <li><a href="http://laravel.jp" target="_blank">Laravel Japan</a></li>
                            <li><a href="https://www.laravelnigeria.com" target="_blank">Laravel Nigeria</a></li>
                            <li><a href="https://www.meetup.com/Laravel-Austin/" target="_blank">Laravel Austin</a></li>
                            <li><a href="https://laravel.io" target="_blank">Laravel.io</a></li>
                          </ul>
                        </li>
                        <li>
                            <a href="https://www.laraning.com" target="_blank">Laraning</a>
                        </li>
                    </ul>
                    <!-- end menu -->
                </nav>
                <!-- end nav-wrap -->
                <!-- Nav Right -->
                <div class="nav__right">
                    <!-- Search -->
                    <div class="nav__right-item nav__search">
                        <a href="#" class="nav__search-trigger" id="nav__search-trigger">
                            <i class="ui-search nav__search-trigger-icon"></i>
                        </a>
                        <div class="nav__search-box" id="nav__search-box">
                            <form class="nav__search-form" method="get" action="{{ route('search') }}">
                                @csrf
                                <input type="text" name="search" placeholder="Search an article" class="nav__search-input" required="required">
                                <button type="submit" class="search-button btn btn-lg btn-color btn-button">
                                  <i class="ui-search nav__search-icon"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- end nav right -->
            </div>
            <!-- end flex-parent -->
        </div>
        <!-- end container -->
    </div>
</header>
<!-- end navigation -->
