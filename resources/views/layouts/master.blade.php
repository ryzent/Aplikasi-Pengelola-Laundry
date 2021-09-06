<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>@yield('title') &mdash; Laundry Sejahtera</title>

    @include('includes.styles')

</head>

<body>
    <div id="app">
        <div class="main-wrapper">
            <div class="navbar-bg"></div>

            @include('includes.navbar')

            @include('includes.sidebar')

            <div class="main-content">
                <section class="section" style="margin-top: 0px">
                    <div class="section-header">
                        <h1>@yield('header_title')</h1>
                    </div>

                    <div class="row">
                        @yield('content')
                    </div>
                </section>
            </div>


            @include('includes.footer')
        </div>
    </div>

    @include('includes.scripts')

</body>

</html>
