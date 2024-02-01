<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @include('includes.styles')
    @stack('styles')
</head>

<body>

    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed">

        <aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div>
                <div class="brand-logo d-flex align-items-center justify-content-between">
                    <a href="./index.html" class="text-nowrap logo-img ms-5 mt-3">
                        <img src="{{ asset('assets/images/logos/logo-koperasi.png') }}" width="100" alt="" />
                    </a>
                    <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
                        <i class="ti ti-x fs-8"></i>
                    </div>
                </div>
                <!-- Sidebar navigation-->
                <!-- Sidebar Start -->
                @include('includes.admin.sidebar')
                <!--  Sidebar End -->
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>



        <!--  Main wrapper -->
        <div class="body-wrapper">
            <!--  Header Start -->
            @include('includes.admin.header')



            <!--  Header End -->


            {{-- content --}}
            <div class="container-fluid">

                @yield('content')
            </div>
        </div>

    </div>


    @include('includes.scripts')

    @stack('scripts')
</body>

</html>
