<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>@yield('title') &mdash; Laundry Sejahtera</title>

    @include('includes.styles')

</head>

<body>
    <div id="app do-nicescrol">
        <div class="main-wrapper">
            <div class="navbar-bg"></div>

            @include('includes.navbar')

            @include('includes.sidebar')

            @yield('content')

            @include('includes.footer')
        </div>
    </div>

    @stack('prepend-script')
    @include('includes.scripts')
    @stack('addon-script')

</body>

</html>
