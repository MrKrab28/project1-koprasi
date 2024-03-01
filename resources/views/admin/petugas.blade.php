@extends('layout')

@section('content')
    <div class="container-fluid content-inner mt-2 py-0">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <div class="header-title">
                            <h4 class="mb-0">Daftar Petugas</h4>
                        </div>
                        <div class="me-3">
                            <button type="submit" class="btn btn-primary " data-bs-toggle="modal"
                                data-bs-target="#exampleModal">Tambah Data</button>
                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Petugas
                                            </h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <form action="{{ route('petugas-store') }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="jenis" required>
                                            <div class="modal-body">
                                                <div class="mb-3">
                                                    <label for="nama" class="form-label">Nama Petugas</label>
                                                    <input class="form-control" name="nama" id="nama" required>

                                                </div>

                                                <div class="mb-3">
                                                    <label for="alamat" class="form-label">Alamat</label>
                                                    <input type="text" class="form-control" id="alamat" name="alamat"
                                                        required>
                                                </div>

                                                <div class="mb-3">
                                                    <label for="jabatan" class="form-label" id="jabatan">Jabatan</label>
                                                    <input type="text" class="form-control" name="jabatan">

                                                </div>
                                                <div class="mb-3">
                                                    <label for="no_hp" class="form-label">No.Hp</label>
                                                    <input type="number" class="form-control" id="no_hp" name="no_hp"
                                                        required>
                                                </div>
                                                <div class="mb-3">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="jk"
                                                            value="L" id="jk">
                                                        <label class="form-check-label" for="flexRadioDefault1">
                                                            Laki - Laki
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="jk"
                                                            value="P" id="flexRadioDefault2" checked>
                                                        <label class="form-check-label" for="jk">
                                                            Perempuan
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="email" class="form-label">Email</label>
                                                    <input type="email" class="form-control" id="email" name="email"
                                                        required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="password" class="form-label">Password</label>
                                                    <input type="password" class="form-control" id="password"
                                                        name="password" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="tgl_bergabung" class="form-label">Tanggal
                                                        Bergabung</label>
                                                    <input type="date" class="form-control" id="tgl_bergabung"
                                                        name="tgl_bergabung" required>
                                                </div>
                                                <div class="modal-footer">

                                                    <button type="submit" class="btn btn-primary">Tambahkan</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            {{-- <table id="table" class="table table-striped mt-5" data-toggle="data-table"> --}}
                            <table id="table" class="table table-hover mt-5 w-100">
                                <thead>
                                    <tr>

                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Alamat</th>
                                        <th>jabatan</th>
                                        <th>No. HP</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Email</th>
                                        <th>Tanggal Bergabung</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>



                                    @foreach ($petugas as $petugas)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $petugas->nama }}</td>
                                            <td>{{ $petugas->alamat }}</td>
                                            <td>{{ $petugas->jabatan }}</td>
                                            <td>{{ $petugas->no_hp }}</td>
                                            <td>{{ $petugas->jk }}</td>
                                            <td>{{ $petugas->email }}</td>
                                            <td>{{ $petugas->tgl_bergabung }}</td>

                                            <td class="text-center">
                                                <button class="btn btn-primary btn-sm"
                                                    onclick="document.location.href = '{{ route('petugas-edit', $petugas->id) }}'">
                                                    <i class="ti ti-pencil"></i>
                                                </button>

                                                <form id="formDelete{{ $petugas->id }}"
                                                    action="{{ route('petugas-delete', $petugas->id) }}" method="POST"
                                                    class="d-inline">
                                                    @csrf
                                                    @method('delete')
                                                    {{-- <input type="hidden" name="id" value=""> --}}
                                                </form>
                                                <button type="button" onclick="deleteData({{ $petugas->id }})"
                                                    class="btn btn-danger btn-sm">
                                                    <i class="ti ti-trash"></i>
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
        function deleteData(id) {
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
                    $('#formDelete' + id).submit()
                }
            });
        }
    </script>
@endpush
