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

        <meta name="twitter:card" content="summary" />
        <meta name="twitter:site" content="@sironronron" />
        <meta name="twitter:creator" content="@sironronron" />

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

        <!-- Styles -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.2.0/css/uikit.min.css" />
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    </head>
    <body>
        <div id="app" v-cloak>
            <header class="uk-box-shadow-small" id="header" style="background-color: #fff;" data-uk-sticky="show-on-up: true; animation: uk-animation-fade; media: @l">
                <div class="uk-container">
                    <nav id="navbar" data-uk-navbar="mode: hover;">
                    <div class="uk-navbar-center nav-overlay">
                        <a class="uk-navbar-item uk-logo" href="{{ url('/') }}" title="Logo">Jade Ezebb</a>
                    </div>
                </nav>
            </div>
        </header>
        
        @yield('content')
        <section class="uk-section">
            <div class="uk-container  uk-text-center">
                <h6 class="uk-text-uppercase">&copy; 2019 Back-Logs. All rights reserved.</h6>
            </div>
        </section>
        </div>
        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}"></script>
        <script id="dsq-count-scr" src="//jadeezebb.disqus.com/count.js" async></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.2.0/js/uikit.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.2.0/js/uikit-icons.min.js"></script>
    </body>
</html>
