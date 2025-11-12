<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'GRUPO VESERGENPERU') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <?php
        $version = '1993.3.6';
    ?>

    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('logos/16X16.png') }}?v=<?php echo $version ?>">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('logos/32X32.png') }}?v=<?php echo $version ?>">
    <link rel="icon" type="image/png" sizes="48x48" href="{{ asset('logos/48X48.png') }}?v=<?php echo $version ?>">
    <link rel="icon" type="image/png" sizes="64x64" href="{{ asset('logos/64X64.png') }}?v=<?php echo $version ?>">
    <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('logos/96X96.png') }}?v=<?php echo $version ?>">
    <link rel="icon" type="image/png" sizes="128x128" href="{{ asset('logos/128X128.png') }}?v=<?php echo $version ?>">
    <link rel="icon" type="image/png" sizes="192x192" href="{{ asset('logos/192X192.png') }}?v=<?php echo $version ?>">
    <link rel="icon" type="image/png" sizes="256x256" href="{{ asset('logos/256X256.png') }}?v=<?php echo $version ?>">
    <link rel="icon" type="image/png" sizes="512x512" href="{{ asset('logos/512X512.png') }}?v=<?php echo $version ?>">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('logos/apple-touch-icon.png') }}?v=<?php echo $version ?>">

    <script src="assets/js/plugin/webfont/webfont.min.js"></script>
    <script>
      WebFont.load({
        google: { families: ["Public Sans:300,400,500,600,700"] },
        custom: {
          families: [
            "Font Awesome 5 Solid",
            "Font Awesome 5 Regular",
            "Font Awesome 5 Brands",
            "simple-line-icons",
          ],
          urls: ["assets/css/fonts.min.css"],
        },
        active: function () {
          sessionStorage.fonts = true;
        },
      });
    </script>

    <!-- Icon Font Stylesheet -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"/>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

        <!-- Libraries Stylesheet -->
        <link rel="stylesheet" href="{{asset('lib/animate/animate.min.css')}}?v=<?php echo $version ?>"/>
        <link href="{{asset('lib/lightbox/css/lightbox.min.css')}}?v=<?php echo $version ?>" rel="stylesheet">
        <link href="{{asset('lib/owlcarousel/assets/owl.carousel.min.css')}}?v=<?php echo $version ?>" rel="stylesheet">


        <!-- Customized Bootstrap Stylesheet -->
        <link href="{{asset('css/bootstrap.min.css')}}?v=<?php echo $version ?>" rel="stylesheet">

        <!-- Template Stylesheet -->
        <link href="{{asset('css/style.css')}}?v=<?php echo $version ?>" rel="stylesheet">
        <link href="{{asset('css/whatsapp.css')}}?v=<?php echo $version ?>" rel="stylesheet">
         <link href="{{asset('css/phone.css')}}?v=<?php echo $version ?>" rel="stylesheet">



    <!-- Scripts -->
    <!-- vite(['resources/sass/app.scss', 'resources/js/app.js']) -->
</head>
<script async src="https://www.googletagmanager.com/gtag/js?id=G-EWNHQHLLE4"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-EWNHQHLLE4');
</script>
<body>
    <div id="app">
        <main>
            @yield('content')
        </main>
    </div>


     <!-- JavaScript Libraries -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
        <script src="{{asset('lib/wow/wow.min.js')}}"></script>
        <script src="{{asset('lib/easing/easing.min.js')}}"></script>
        <script src="{{asset('lib/waypoints/waypoints.min.js')}}"></script>
        <script src="{{asset('lib/counterup/counterup.min.js')}}"></script>
        <script src="{{asset('lib/lightbox/js/lightbox.min.js')}}"></script>
        <script src="{{asset('lib/owlcarousel/owl.carousel.min.js')}}"></script>
        <script src="{{asset('js/phone.js')}}"></script>
        <script src="{{asset('js/ubigeo.js')}}"></script>
        <script src="{{asset('js/buscar.js')}}"></script>
        <script src="{{asset('js/whatsapp.js')}}"></script>

        <!-- Template Javascript -->
        <script src="{{asset('js/main.js')}}"></script>
    @stack('scripts')
</body>
</html>
