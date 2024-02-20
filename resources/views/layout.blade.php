<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name') }}</title>
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/images/logo-koperasi.png') }}">

    @include('includes.styles')
</head>

<body data-sidebar="dark">
    <!-- Begin page -->
    <div id="layout-wrapper">

        @auth("admin")
            @include('includes.header.admin')
            @include('includes.sidebar.admin')
        @endauth

        <div class="main-content" id="result">
            <div class="page-content">
                <div class="container-fluid mb-4">
                    @yield('content')
                </div> <!-- container-fluid -->
            </div>
            <!-- End Page-content -->
        </div>

        <footer class="footer">
            <div class="container-fluid">
                @php
                    $year = 2024;
                @endphp
                <div class="text-sm-end d-none d-sm-block">
                    {{ $year }} © {{ config('app.name') }}
                </div>
            </div>
        </footer>
    </div>

    @stack('modals')

    @include('includes.scripts')
</body>

</html>
