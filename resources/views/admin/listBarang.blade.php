@extends('layout')

@section('content')
    <div class="container-fluid content-inner mt-2 py-0">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <div class="header-title">
                            <h4 class="mb-0">Data List Barang</h4>
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
                                        <th>No</th>
                                        <th>Barcode</th>
                                        <th>Nama Barang</th>
                                        <th>Pesanan</th>
                                        <th>Satuan</th>
                                        <th>Harga</th>
                                        <th>Jumlah Harga</th>
                                        <th>Keterangan</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($barang as $barang)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $barang->barcode }}</td>
                                            <td>{{ $barang->nama_barang }}</td>
                                            <td>{{ $barang->pesanan }}</td>
                                            <td>{{ $barang->satuan }}</td>
                                            <td>{{ $barang->harga }}</td>
                                            <td>{{ $barang->jumlah_harga }}</td>
                                            <td>{{ $barang->keterangan }}</td>
                                            <td>
                                                <button class="btn btn-primary btn-sm"
                                                    onclick="document.location.href = '{{ route('barang-edit', $barang->id) }}'">
                                                    <i class="ti ti-pencil"></i>
                                                </button>

                                                <form id="formDelete{{ $barang->id }}"
                                                    action="{{ route('barang-delete', $barang->id) }}" class="d-inline"
                                                    method="POST">

                                                    @csrf
                                                    @method('delete')
                                                    <input type="hidden" name="id" value="">
                                                </form>
                                                <button type="button" onclick="deleteData({{ $barang->id }})"
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
                    <h1 class="modal-title fs-5" id="tambahDataLabel">Tambah Data List Barang
                    </h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('barang-store') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="barcode" class="form-label">Barcode</label>
                            <input type="text" class="form-control" name="barcode" id="barcode" autocomplete="off"
                                minlength="3" required>
                        </div>
                        <div class="mb-3">
                            <label for="nama_barang" class="form-label">Nama Barang</label>
                            <input type="text" class="form-control" name="nama_barang" id="nama_barang" autocomplete="off"
                                minlength="3" required>
                        </div>
                        <div class="mb-3">
                            <label for="pesanan" class="form-label">Pesanan</label>
                            <input type="number" class="form-control" name="pesanan" id="pesanan" autocomplete="off"
                                required>
                        </div>
                        <div class="mb-3">
                            <label for="satuan" class="form-label">Satuan</label>
                            <input type="text" class="form-control" id="satuan" name="satuan" rows="3" required>
                        </div>
                        <div class="mb-3">
                            <label for="harga" class="form-label">Harga</label>
                            <input type="number" class="form-control" id="harga" name="harga" rows="3" required>
                        </div>
                        <div class="mb-3">
                            <label for="jumlah_harga" class="form-label">Jumlah Harga</label>
                            <input type="number" class="form-control" id="jumlah_harga" name="jumlah_harga" rows="3" required>
                        </div>
                        <div class="mb-3">
                            <label for="keterangan" class="form-label">keterangan</label>
                            <input type="text" class="form-control" id="keterangan" name="keterangan" rows="3" required>
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
