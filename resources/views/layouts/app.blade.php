<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>@yield('title') &mdash; Laundry Sejahtera</title>

    <!-- General CSS Files -->
    <link href=" {{ mix('css/app.css') }}" rel="stylesheet">

    <!-- CSS Libraries -->


    <!-- Template CSS -->
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/components.css">
</head>

<body>
    <div id="app">
        @yield('content')
    </div>
    <!-- General JS Scripts -->
    <script src="{{ mix('js/app.js') }}"></script>
    <script src="{{ URL::asset('assets/js/stisla.js') }}"></script>

    <!-- JS Libraies -->

    <!-- Template JS File -->
    <script src="{{ URL::asset('assets/js/scripts.js') }}"></script>
    <script src="{{ URL::asset('assets/js/custom.js') }}"></script>

</body>

</html>
