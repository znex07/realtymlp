<!doctype html>
<html>
<head>

    <meta charset="utf-8">
    <title>RealtyMLP</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="/img/logo.png">
    <link href="/assets/css/half-slider.css" rel="stylesheet">
    <link href="/assets/css/style.css" rel="stylesheet">
    <link href="/assets/css/vendor/bootstrap.min.css" rel="stylesheet">
    <link href="/assets/css/flat-ui.css" rel="stylesheet">
    <link href="/assets/css/buttons.css" rel="stylesheet">
    <link href="/assets/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="/assets/css/ladda-themeless.min.css">
    <link rel="stylesheet" href="/assets/css/alertify.css">
    <link rel="stylesheet" href="/assets/css/themes/default.css">
    <link rel="stylesheet" type="text/css" href="/assets/css/fotorama.css">
    <link href="/assets/css/listgridview.css" rel="stylesheet">
    <link href="/assets/css/sidebar.css" rel="stylesheet">
    <link href='/assets/css/avatar-uploader.css' rel='stylesheet' />
    <link href="/assets/css/sidebar.css" rel="stylesheet">
    <link href='/assets/css/default.css' rel='stylesheet' />
    <link href='/assets/css/component.css' rel='stylesheet' />
    <link href='/assets/css/testimonials.css' rel='stylesheet' />
    <link href='/assets/css/owl.carousel.css' rel='stylesheet' />
    <link href='/assets/css/owl.theme.css' rel='stylesheet' />
     <link href='/assets/css/tabs.css' rel='stylesheet' />
    <link href='/assets/css/tabstyles.css' rel='stylesheet' />
    <link rel="stylesheet" href="/assets/css/dataTables.bootstrap.min.css">
    <link href="http://code.jquery.com/ui/1.10.2/themes/smoothness/jquery-ui.css" rel="Stylesheet"></link>
   
    <!-- jQuery -->

    {{--<link href='http://fonts.googleapis.com/css?family=Oxygen:400,300' rel='stylesheet' type='text/css'>--}}
    @yield('styles')
</head>
    <body ondragstart="return false;" ondrop="return false;">
      
    @include('main.partials.nav')
    <style type="text/css">
       .search-container {
            margin-top: 30px;
            padding: 20px 40px;
            background-color: rgba(0, 0, 0, 0.25);
        }
    </style>
    <script type='text/javascript'>
        var csrf_token = '{{ csrf_token() }}';
    </script>

