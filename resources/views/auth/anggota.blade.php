<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Login | {{ config('app.name') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description">
    <meta content="Themesbrand" name="author">
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/images/logo-koperasi.png') }}">

    @include('includes.styles')
</head>

<body class="bg-primary">
    <div class="account-pages mt-5 pt-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-5 col-xl-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="text-center mt-4">
                                <div class="mb-3">
                                    <a href="#"><img src="{{ asset('assets/images/logo-koperasi.png') }}" height="150"
                                            alt="logo"></a>
                                </div>
                            </div>
                            <div class="p-3">
                                <h4 class="font-size-18 mt-2 text-center">koperasi Simpan Pinjam</h4>
                                <p class="text-muted text-center mb-4">Selamat Datang</p>

                                <form class="form-horizontal" action="{{ route('authenticate') }}" method="POST">
                                    @csrf
                                    <div class="mb-3">
                                        <label class="form-label" for="username">Username</label>
                                        <input type="email" name="email" class="form-control" id="username"
                                            placeholder="Masukkan Email">
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label" for="userpassword">Password</label>
                                        <input type="password" name="password" class="form-control" id="userpassword"
                                            placeholder="Masukkan password">
                                    </div>

                                    <div class="row mt-4">
                                        <div class="col-sm-6">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value=""
                                                    id="customControlInline">
                                                <label class="form-check-label" for="customControlInline">
                                                    Remember me
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 text-end">
                                            <button class="btn btn-primary w-md waves-effect waves-light"
                                                type="submit">Log In</button>
                                        </div>
                                    </div>
                                </form>

                            </div>

                        </div>
                    </div>
                    <div class="mt-5 text-center position-relative">
                        @php
                            $year = 2024;
                        @endphp
                        {{-- <p class="text-white">Don't have an account ? <a href="pages-register.html"
                                class="fw-bold text-primary"> Signup Now </a> </p> --}}
                        <p class="text-white">
                            {{ $year }} © {{ config('app.name') }}
                        </p>
                    </div>

                </div>
            </div>
        </div>
    </div>


    @include('includes.scripts')
    @if (session('LoginError'))
    <script>
        Swal.fire({
            position: 'center',
            icon: 'error',
            title: '{{ session('LoginError') }}',
            showConfirmButton: false,
            timer: 2500
        })
    </script>
@endif
</body>

</html>
