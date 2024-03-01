@extends('layout')

@section('content')
    <div class="container-fluid content-inner mt-2 py-0">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <div class="header-title">
                            <h4 class="mb-0">Data Akun</h4>
                        </div>
                        <button class="btn btn-primary " data-bs-toggle="modal" data-bs-target="#tambahData">
                            Tambah Data
                        </button>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive mt-3">
                            <table class="table table-hover mt-5 w-100" id="table">
                                <thead>
                                    <tr>
                                        <th>No. Reff</th>
                                        <th>Nama Reff</th>
                                        <th>Keterangan</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($akun as $item)
                                        <tr>
                                            <td>{{ $item->no_reff }}</td>
                                            <td>{{ $item->nama_reff }}</td>
                                            <td>{{ $item->keterangan }}</td>
                                            <td>
                                                <button class="btn btn-primary btn-sm"
                                                    onclick="document.location.href = '{{ route('dataAkun-edit', $item->no_reff) }}'">
                                                    <i class="ti ti-pencil"></i>
                                                </button>

                                                <form id="formDelete{{ $item->no_reff }}"
                                                    action="{{ route('dataAkun-delete', $item->no_reff) }}" class="d-inline"
                                                    method="POST">

                                                    @csrf
                                                    @method('delete')
                                                    <input type="hidden" name="id" value="">
                                                </form>
                                                <button type="button" onclick="deleteData({{ $item->no_reff }})"
                                                    class="btn btn-danger btn-sm">
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

@push('modals')
    <div class="modal fade" id="tambahData" tabindex="-1" aria-labelledby="tambahDataLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="tambahDataLabel">Tambah Data Akun
                    </h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('dataAkun-store') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="no_reff" class="form-label">No.Reff</label>
                            <input type="text" class="form-control" name="no_reff" id="no_reff" autocomplete="off"
                                minlength="3" required>
                        </div>
                        <div class="mb-3">
                            <label for="nama_reff" class="form-label">Nama Reff</label>
                            <input type="text" class="form-control" name="nama_reff" id="nama_reff" autocomplete="off"
                                required>
                        </div>
                        <div class="mb-3">
                            <label for="keterangan" class="form-label">Keterangan</label>
                            <textarea class="form-control" id="keterangan" name="keterangan" rows="3" required></textarea>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Tambahkan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endpush

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
        function deleteData(no_reff) {
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
