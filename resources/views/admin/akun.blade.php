@extends('layout')

@section('content')
    <div class="conatiner-fluid content-inner mt-2 py-0">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body mt-5">
                        <div class="card-header d-flex justify-content-between ">
                            <div class="header-title mb-3">
                                <h4 class="card-title">Daftar Akun</h4>
                            </div>
                            <button type="submit" class="btn btn-primary " data-bs-toggle="modal"
                                data-bs-target="#exampleModal">Tambah Data</button>
                        </div>
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Data Akun
                                        </h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <form action="{{ route('dataAkun-store') }}" method="POST">
                                        @csrf
                                        <div class="modal-body">
                                            <div class="mb-3">
                                                <label for="no_reff" class="form-label">No.Reff</label>
                                                <input type="number" class="form-control" name="no_reff" id="no_reff"
                                                    required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="nama_reff" class="form-label">Nama Reff</label>
                                                <input type="text" class="form-control" name="nama_reff" id="nama_reff"
                                                    required>
                                            </div>
                                            {{-- <div class="mb-3">
                                                <label for="id_anggota" class="form-label">Nama Anggota</label>
                                                <select type="number" class="form-control" name="id_anggota"
                                                    id="id_anggota" required>
                                                    <option value="">Pilih</option>
                                                    @foreach ($daftarAnggota as $anggota)
                                                        <option value="{{ $anggota->id }}">{{ $anggota->nama }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div> --}}

                                            <div class="mb-3">
                                                <label for="tgl_daftarAkun" class="form-label">Tanggal Daftar Akun</label>
                                                <input type="date" class="form-control" id="tgl_daftarAkun"
                                                    name="tgl_daftarAkun" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="keterangan" class="form-label">Keterangan</label>
                                                <input type="text" class="form-control" id="keterangan" name="keterangan"
                                                    required>
                                            </div>



                                            <div class="modal-footer">

                                                <button type="submit" class="btn btn-primary">Tambahkan</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div class="table-responsive mt-3">
                            {{-- <table id="table" class="table table-striped mt-5" data-toggle="data-table"> --}}
                            <table class="table table-hover mt-5 w-100" id="table">
                                <thead>
                                    <tr>
                                        <th>No. Reff</th>
                                        <th>Nama Reff</th>
                                        <th>Keterangan</th>
                                        <th>Tanggal Daftar Akun</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        @foreach ($akun as $akun)
                                            <td>{{ $akun->no_reff }}</td>
                                            <td>{{ $akun->nama_reff }}</td>
                                            <td>{{ $akun->keterangan }}</td>
                                            <td>{{ Carbon\Carbon::parse($akun->tgl_daftarAkun)->isoFormat('D MMMM YYYY') }}
                                            </td>
                                            <td>
                                                <button class="btn btn-primary btn-sm"
                                                    onclick="document.location.href = '{{ route('dataAkun-edit', $akun->no_reff) }}'">
                                                    <i class="ti ti-pencil"></i>
                                                </button>

                                                <form id="formDelete{{ $akun->no_reff }}"
                                                    action="{{ route('dataAkun-delete', $akun->no_reff) }}" class="d-inline"
                                                    method="POST">

                                                    @csrf
                                                    @method('delete')
                                                    <input type="hidden" name="id" value="">
                                                </form>
                                                <button type="button" onclick="deleteData({{ $akun->no_reff }})" class="btn btn-danger btn-sm">
                                                    <i class=" ti ti-trash"></i>
                                                </button>
                                            </td>

                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('styles')
    @include('includes.datatables.styles')
@endpush

@push('scripts')
    @include('includes.datatables.scripts')
    <script>
        $(document).ready(function() {
            $('#table').DataTable({
                responsive: true,
                sort: false
            });
        });
    </script>
    <script>
        function deleteData(no_reff){
            Swal.fire({
                title: "Apakah Anda Yakin?",
                text: "Data Ini Akan Terhapus Dari Database",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Ya, Hapus!"
            }).then((result) => {
                if (result.isConfirmed) {
                    $('#formDelete' + no_reff).submit()
                    }
            });
        }


    </script>
@endpush
