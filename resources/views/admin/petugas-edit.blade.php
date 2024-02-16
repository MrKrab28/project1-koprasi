@extends('layout')

@section('content')
    <div class="container-fluid">
        <!--  Row 1 -->

        <div class="row mt-5">
            <div class="col-lg-8 d-flex align-items-strech">
                <div class="card w-100">
                    <div class="card-body">
                        <form action="{{ route('petugas-update', $petugas) }}" method="POST">
                            @csrf
                            @method('put')
                            <div class="d-sm-flex d-block align-items-center justify-content-between mb-9">
                                <div class="mb-3 mb-sm-0">
                                    <h5 class="card-title fw-semibold">Edit Data Petugas</h5>
                                </div>

                            </div>
                            <div class="input-group mb-3">
                                <label for="nama" class="input-group-text" id="basic-addon1">Nama Lengkap</label>
                                <input type="text" class="form-control" name="nama" value="{{ $petugas->nama }}"
                                    aria-label="Username">

                            </div>

                            <div class="input-group mb-3">
                                <label for="alamat" class="input-group-text" id="basic-addon1">Alamat</label>
                                <input type="text" class="form-control" name="alamat" value="{{ $petugas->alamat }}"
                                    aria-label="Username">

                            </div>
                            <div class="input-group mb-3">
                                <label for="jabatan" class="input-group-text" id="basic-addon1">Jabatan</label>
                                <input type="text" class="form-control" name="jabatan" value="{{ $petugas->jabatan }}"
                                    aria-label="Username">

                            </div>
                            <div class="input-group mb-3">
                                <label for="no_hp" class="input-group-text" id="basic-addon1">No.Hp</label>
                                <input type="number" class="form-control" name="no_hp" value="{{ $petugas->no_hp }}"
                                    aria-label="Username">

                            </div>
                            <div class="input-group mb-3">
                                <label for="" class="input-group-text" id="basic-addon1">Jenis Kelamin</label>
                                <div class="form-check form-check-inline ms-3">
                                    <input class="form-check-input" id="inlineRadio1"type="radio" name="jk" value="P" {{ $petugas->jk == 'P' ? 'checked' : '' }}>
                                   <label for="inlineRadio1"> Perempuan</label>
                                </div>
                                <div class="form-check form-check-inline ms-5">
                                    <input class="form-check-input" id="inlineRadio2"type="radio" name="jk" value="L" {{ $petugas->jk == 'L' ? 'checked' : '' }}>
                                   <label for="inlineRadio2"> Laki - Laki</label>
                                </div>
                            </div>
                            <div class="input-group mb-3">
                                <label for="email" class="input-group-text" id="basic-addon1">Email</label>
                                <input type="email" class="form-control" name="email" value="{{ $petugas->email }}"
                                    aria-label="Username">

                            </div>
                            <div class="input-group mb-3">
                                <label for="password" class="input-group-text" id="basic-addon1">Password</label>
                                <input type="password" class="form-control" name="password" placeholder="Kosongkan Jika Tidak Ingin Mengganti Password"
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
    <script>
        function deleteData(id) {
            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: "Akun ini akan terhapus dari database.",
                icon: 'warning',
                showCancelButton: true,
            }).then((result) => {
                if (result.isConfirmed) {
                    $(`#formDelete${id}`).submit();
                }
            });
        }
    </script>
@endpush
