<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=0.1">

        <!-- Logo -->
        <link rel="shortcut icon" href="{{ asset('images/logo/128x128.ico') }}" type="image/x-icon" />
        <link rel="canonical" href="https://www.jade.com">
        <title>Jade Ezebb - @yield('title')</title>

        <!-- Meta Tags -->
        <meta name="title" content="@yield('title')">
        <meta name="description" content="@yield('description')">
        <meta name="keywords" content="@yield('keywords')">

        <meta name="twitter:card" content="@yield('description')" />
        <meta name="twitter:site" content="@Unicorrnss" />
        <meta name="twitter:creator" content="@Unicorrnss" />

        <meta property="fb:app_id"        content="">
        <meta property="og:url"           content="@yield('url')" />
        <meta property="og:type"          content="@yield('type')" />
        <meta property="og:title"         content="@yield('title')" />
        <meta property="og:description"   content="@yield('description')" />
        <meta property="og:image:url"     content="@yield('image')" />
        <meta property="og:image:width"   content="@yield('imageWidth')" />
        <meta property="og:image:height"  content="@yield('imageHeight')" />

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Josefin+Slab&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Parisienne&display=swap" rel="stylesheet"> 
        <!-- Styles -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.2.0/css/uikit.min.css" />
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    </head>
    <body>
        <div id="app" v-cloak>
            <header v-cloak class="uk-box-shadow-small" id="header" style="background-color: #fff;" data-uk-sticky="show-on-up: true; animation: uk-animation-fade; media: @l">
                <div class="uk-container uk-container-expand">
                    <nav id="navbar" data-uk-navbar="mode: hover;">
                    <div class="uk-navbar-left nav-overlay uk-visible@m">
                        <ul class="uk-navbar-nav">
                            <li class="{{ Request::segment(1) === 'subscribe' ? 'uk-active' : '' }}">
                                <a href="{{ route('welcome') }}" title="Home">Home</a>
                            </li>
                            <li class="{{ Request::segment(1) === 'about' ? 'uk-active' : '' }}">
                                <a href="{{ route('about') }}" title="About">About</a>
                            </li>
                            <li class="{{ Request::segment(1) === 'contact' ? 'uk-active' : '' }}">
                                <a href="{{ route('contact') }}" title="Contact">Contact</a>
                            </li>
                            <li class="{{ Request::segment(1) === 'categories' ? 'uk-active' : '' }}">
                                <a href="#" title="Categories">Categories</a>
                                <div class="uk-navbar-dropdown uk-padding-small uk-background-muted">
                                    <ul class="uk-nav uk-navbar-dropdown-nav">
                                        <categories />
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="uk-navbar uk-hidden@m">
                        <div class="uk-navbar-item uk-logo">
                            <a href="{{ route('welcome') }}">Back-Logs</a>
                        </div>
                    </div>
                    <div class="uk-navbar-right nav-overlay">
                        <a class="uk-navbar-toggle uk-visible@m" data-uk-toggle="target: .nav-overlay; animation: uk-animation-fade" href="#"><span uk-icon="icon: search; ratio: 0.9"></span></a>
                        <div class="uk-navbar-item">
                            <a class="uk-visible@s uk-icon-button-small uk-margin-small-right uk-text-secondary" style="margin-right: 4px" href="#"><span uk-icon="icon: facebook; ratio: 0.7"></span></a>
                            <a class="uk-visible@s uk-margin-small-right uk-text-secondary" style="margin-right: 4px" href="#"><span uk-icon="icon: twitter; ratio: 0.7"></span></a>
                            <a class="uk-visible@s uk-margin-small-right uk-text-secondary" style="margin-right: 4px" href="#"><span uk-icon="icon: instagram; ratio: 0.7"></span></a>
                            <a class="uk-visible@s uk-margin-small-right uk-text-secondary" style="margin-right: 4px" href="#"><span uk-icon="icon: pinterest; ratio: 0.7"></span></a>
                            <a class="uk-visible@s uk-margin-small-right uk-text-secondary" style="margin-right: 4px" href="#"><span uk-icon="icon: mail; ratio: 0.7"></span></a>
                            <a class="uk-navbar-toggle uk-hidden@m" data-uk-toggle data-uk-navbar-toggle-icon href="#offcanvas-nav"></a>
                        </div>
                    </div>
                    <div class="nav-overlay uk-navbar-left uk-flex-1" hidden>
                        <div class="uk-navbar-item uk-width-expand">
                            <form class="uk-search uk-search-navbar uk-width-1-1" action="{{ route('search') }}"  method="GET">
                                <input class="uk-search-input" name="queue" type="search" value="{{ isset($search) ? $search : ''  }}" placeholder="Search...">
                            </form>
                        </div>
                        <a class="uk-navbar-toggle" data-uk-close data-uk-toggle="target: .nav-overlay; animation: uk-animation-fade" href="#"></a>
                    </div>
                </nav>
            </div>
        </header>
        {{-- // Home  --}}
        <section class="uk-section uk-section-small">
            <div class="uk-container">
                <div id="Header1">
                    <div id="header-inner">
                        <img id="Header1_headerimg" src="https://res.cloudinary.com/dmfivoe4m/image/upload/c_scale,h_196,w_616/v1568905969/JadeEzebb/logo2_ra6osa.png" style="display: block; width: 616px; height: 196px;" alt="">
                    </div>
                </div>
            </div>
        </section>
        @yield('content')
        <section class="uk-section">
            <div class="uk-container  uk-text-center">
                <h6 class="uk-text-uppercase">Blog By Jade Ezebb. All rights reserved.</h6>
            </div>
        </section>
        </div>
        <div id="offcanvas-nav" uk-offcanvas="flip: true; overlay: true">
            <div class="uk-offcanvas-bar">

                <button class="uk-offcanvas-close uk-text-dark" type="button" uk-close></button>

                <form class="uk-search uk-search-navbar uk-width-1-1" action="{{ route('search') }}" method="GET">
                    <input class="uk-search-input" value="{{ isset($search) ? $search : ''  }}" name="queue" type="search" placeholder="Search..." style="color: #000; border-bottom: 1px solid #000;">
                </form>

                <ul class="uk-list">
                    <li><a href="{{ route('welcome') }}" class="uk-text-dark">Home</a></li>
                    <li><a href="{{ route('about') }}" class="uk-text-dark">About</a></li>
                    <li><a href="{{ route('contact') }}" class="uk-text-dark">Contact</a></li>
                </ul>
                <hr style="border-top-color: #000;">
                <h6 class="uk-text-uppercase uk-text-dark uk-margin-remove">Blog By Jade Ezebb. All rights reserved.</h6>

            </div>
        </div>
        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}"></script>
        <script type="text/javascript" src="//downloads.mailchimp.com/js/signup-forms/popup/unique-methods/embed.js" data-dojo-config="usePlainJson: true, isDebug: false"></script><script type="text/javascript">window.dojoRequire(["mojo/signup-forms/Loader"], function(L) { L.start({"baseUrl":"mc.us20.list-manage.com","uuid":"e4304eaba750e65b1dcfc97eb","lid":"ccfa42f8eb","uniqueMethods":true}) })</script>        <script id="dsq-count-scr" src="//jadeezebb.disqus.com/count.js" async></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.2.0/js/uikit.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.2.0/js/uikit-icons.min.js"></script>
    </body>
</html>
