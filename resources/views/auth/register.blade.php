<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Koperasi Simpan Pinjam</title>
  <link rel="shortcut icon" type="image/png" href="{{ asset('assets/images/logos/logo-koperasi.png') }}" />
  <link rel="stylesheet" href="{{ ('assets/css/styles.min.css') }}" />
</head>

<body class="bg-primary">
  <!--  Body Wrapper -->
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
    <div
      class="position-relative overflow-hidden radial-gradient min-vh-100 d-flex align-items-center justify-content-center">
      <div class="d-flex align-items-center justify-content-center w-100">
        <div class="row justify-content-center w-100">
          <div class="col-md-8 col-lg-6 col-xxl-3">
            <div class="card mb-0">
              <div class="card-body">
                <a href="./index.html" class="text-nowrap logo-img text-center d-block py-3 w-100">
                  <img src="{{ asset('assets/images/logos/logo-koperasi.png') }}" width="180" alt="">
                </a>
                <p class="text-center"><b>Register</b></p>
                <form action="{{ route('register.user') }}" method="POST">
                    @csrf
                  <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Nama Lengkap</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="nama" aria-describedby="emailHelp">
                  </div>
                  <div class="mb-3">
                    <label for="exampleInputEmail2" class="form-label">Email</label>
                    <input type="email" class="form-control" id="exampleInputEmail2" name="email" aria-describedby="emailHelp">
                  </div>
                  <div class="mb-3">
                    <label for="" class="input-group-text" id="basic-addon1">Jenis Kelamin</label>
                    <div class="form-check form-check-inline ms-3">
                        <input class="form-check-input" id="inlineRadio1"type="radio" name="jk" value="P">
                       <label for="inlineRadio1"> Perempuan</label>
                    </div>
                    <div class="form-check form-check-inline ms-5">
                        <input class="form-check-input" id="inlineRadio2"type="radio" name="jk" value="L">
                       <label for="inlineRadio2"> Laki - Laki</label>
                    </div>


                </div>
                  <div class="mb-3">
                    <label for="exampleInputEmail3" class="form-label">No.Hp</label>
                    <input type="text" class="form-control" id="exampleInputEmail3" name="no_hp" aria-describedby="emailHelp">
                  </div>
                  <div class="mb-3">
                    <label for="exampleInputEmail4" class="form-label">NIK KTP</label>
                    <input type="text" class="form-control" id="exampleInputEmail4" name="nik" aria-describedby="emailHelp">
                  </div>
                  <div class="mb-3">
                    <label for="exampleInputEmail5" class="form-label">No.Rekening</label>
                    <input type="text" class="form-control" id="exampleInputEmail5" name="no_rekening" aria-describedby="emailHelp">
                  </div>
                  <div class="mb-4">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input name="password" type="password" class="form-control" id="exampleInputPassword1">
                  </div>
                  <div class="d-flex align-items-center justify-content-between mb-4">
                    {{-- <div class="form-check">
                      <input class="form-check-input primary" type="checkbox" value="" id="flexCheckChecked" checked>
                      <label class="form-check-label text-dark" for="flexCheckChecked">
                        Remeber this Device
                      </label>
                    </div> --}}
                    {{-- <a class="text-primary fw-bold" href="./index.html">Forgot Password ?</a> --}}
                  </div>
                  <button type="submit" class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2">Register</button>

                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="{{ asset('assets/libs/jquery/dist/jquery.min.js') }}"></script>
  <script src="{{ asset('assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
</body>

</html>
