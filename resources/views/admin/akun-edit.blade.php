@extends('layout')

@section('content')
    <div class="container-fluid">
        <!--  Row 1 -->

        <div class="row mt-5">
            <div class="col-lg-8 d-flex align-items-strech">
                <div class="card w-100">
                    <div class="card-body">
                        <form action="{{ route('dataAkun-update', $akun->no_reff) }}" method="POST">
                            @csrf
                            @method('put')

                            <input type="hidden" name="no_reff" value="{{ $akun->no_reff }}">
                            <div class="d-sm-flex d-block align-items-center justify-content-between mb-9">
                                <div class="mb-3 mb-sm-0">
                                    <h5 class="card-title fw-semibold">Edit Data Akun</h5>
                                </div>

                            </div>
                            <div class="input-group mb-3">
                                <label for="" class="input-group-text" id="basic-addon1">Nama Reff</label>
                                <input type="text" class="form-control" name="nama_reff" value="{{ $akun->nama_reff }}"
                                    aria-label="Username">

                            </div>
                            <div class="input-group mb-3">
                                <label for="keterangan" class="input-group-text" id="basic-addon1">Keterangan</label>
                                <input type="text" class="form-control" name="keterangan" value="{{ $akun->keterangan }}"
                                    aria-label="Username">

                            </div>
                            <div class="input-group mb-3">
                                <label for="tgl_daftarAkun" class="input-group-text" id="basic-addon1">Tanggal Daftar Akun</label>
                                <input type="text" class="form-control" name="tgl_daftarAkun" value="{{ $akun->tgl_daftarAkun }}"
                                    aria-label="Username">

                            </div>
                            <div class="card-footer text-right pb-4 mt-0">
                                <button type="submit" class="btn btn-success">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
@if (session('success'))

<script>
    Swal.fire({
        title: "{{ session('success') }}",
        text: "Data di Update",
        icon: "success"
    });
    </script>
    @endif
@endpush
