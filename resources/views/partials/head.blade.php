<head>
    <title>{{ $title ?? 'Laraflash - Flash news about Laravel' }}</title>
    <meta charset="utf-8">
    <!--[if IE]>
    <meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'>
  <![endif]-->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="Laravel news - Laravel flash news from the Laravel community!">
    <!-- Google Fonts -->
    <link href='https://fonts.googleapis.com/css?family=Montserrat:400,600,700%7CSource+Sans+Pro:400,600,700' rel='stylesheet'>
    <!-- Css -->
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/font-icons.css" />
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/laraflash.css" />
    <link rel="stylesheet" href="css/toast.min.css" />
    @yield('additional.stylesheets')
    <!-- Social integration -->
    <meta property="og:title" content="Laraflash - Flash news about Laravel"/>
    <meta property="og:description" content="Laravel news updates each 30 minutes, dozens of website news into a single news website!"/>
    <meta property="og:type" content="website"/>
    <meta property="og:image" content="https://www.laraflash.com/img/logo-big.jpg"/>
    <meta property="og:url" content="https://www.laraflash.com"/>
    <meta property="twitter:card" content="summary_large_image" />
    <meta property="twitter:site" content="@_laraflash" />
    <meta property="twitter:title" content="Laraflash - Flash news about Laravel" />
    <meta property="twitter:description" content="Flash news about Laravel, updated each 30 minutes!" />
    <meta property="twitter:image" content="https://www.laraflash.com/img/logo-twitter.jpg" />
    <!-- Favicons -->
    <link rel="shortcut icon" href="img/favicon.png">
    <link rel="apple-touch-icon" href="img/apple-touch-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="72x72" href="img/apple-touch-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="114x114" href="img/apple-touch-icon-114x114.png">
    <!-- Lazyload (must be placed in head in order to work) -->
    <script src="js/lazysizes.min.js"></script>
    @env('production')
    <!-- Matomo -->
    <script type="text/javascript">
      var _paq = _paq || [];
      /* tracker methods like "setCustomDimension" should be called before "trackPageView" */
      _paq.push(["setDoNotTrack", true]);
      _paq.push(['trackPageView']);
      _paq.push(['enableLinkTracking']);
      (function() {
        var u="//matomo.waygou.com/";
        _paq.push(['setTrackerUrl', u+'piwik.php']);
        _paq.push(['setSiteId', '2']);
        var d=document, g=d.createElement('script'), s=d.getElementsByTagName('script')[0];
        g.type='text/javascript'; g.async=true; g.defer=true; g.src=u+'piwik.js'; s.parentNode.insertBefore(g,s);
      })();
    </script>
    <noscript><p><img src="//matomo.waygou.com/piwik.php?idsite=2&amp;rec=1" style="border:0;" alt="" /></p></noscript>
    <!-- End Matomo Code -->
    @endenv
</head>
