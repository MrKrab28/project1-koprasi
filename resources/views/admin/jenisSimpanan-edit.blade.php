@extends('layout')

@section('content')
    <div class="container-fluid">
        <!--  Row 1 -->

        <div class="row mt-5">
            <div class="col-lg-8 d-flex align-items-strech">
                <div class="card w-100">
                    <div class="card-body">
                        <form action="{{ route('jenisSimpanan-update', $jenis) }}" method="POST">
                            @csrf
                            @method('put')
                            <div class="d-sm-flex d-block align-items-center justify-content-between mb-9">
                                <div class="mb-3 mb-sm-0">
                                    <h5 class="card-title fw-semibold">Edit Data jenis Pinjaman</h5>
                                </div>

                            </div>
                            <div class="input-group mb-3">
                                <label for="nama" class="input-group-text" id="basic-addon1">Nama Jenis Pinjaman</label>
                                <input type="text" class="form-control" name="nama" value="{{ $jenis->nama }}"
                                    aria-label="Username">

                            </div>

                            <div class="input-group mb-3">
                                <label for="jumlah" class="input-group-text" id="basic-addon1">Setoran Awal</label>
                                <input type="number" class="form-control" name="jumlah" value="{{ $jenis->jumlah }}"
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
