<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Care4D Admin | {{$title}}</title>

    <link href="<?=asset('css/bootstrap.min.css') ?>" rel="stylesheet">
    <link href="<?=asset('font-awesome/css/font-awesome.css') ?>" rel="stylesheet">

    <link href="<?=asset('css/animate.css') ?>" rel="stylesheet">
    <link href="<?=asset('css/style.css') ?>" rel="stylesheet">
    <link href="<?=asset('css/app.css?180216') ?>" rel="stylesheet">

    <link href="<?=asset('css/plugins/datapicker/datepicker3.css') ?>" rel="stylesheet">

    @yield('style')

</head>

<body>

@yield('content')

<!-- Mainly scripts -->
<script src="<?=asset('js/jquery-2.1.1.js') ?>"></script>
<script src="<?=asset('js/bootstrap.min.js') ?>"></script>
<script src="<?=asset('js/plugins/metisMenu/jquery.metisMenu.js') ?>"></script>
<script src="<?=asset('js/plugins/slimscroll/jquery.slimscroll.min.js') ?>"></script>

<!-- Custom and plugin javascript -->
<script src="<?=asset('js/inspinia.js') ?>"></script>
<script src="<?=asset('js/plugins/pace/pace.min.js') ?>"></script>

<!-- Data picker -->
<script src="<?=asset('js/plugins/datapicker/bootstrap-datepicker.js') ?>"></script>

@yield('script')

</body>
