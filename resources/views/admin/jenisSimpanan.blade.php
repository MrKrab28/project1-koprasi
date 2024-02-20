@extends('layout')

@section('content')
    <div class="conatiner-fluid content-inner mt-2 py-0">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <div class="header-title">
                            <h4 class="mb-0">Jenis Simpanan</h4>
                        </div>
                        <button type="submit" class="btn btn-primary " data-bs-toggle="modal"
                            data-bs-target="#exampleModal">Tambah Data</button>
                    </div>
                    <div class="card-body">
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Data Simpanan
                                        </h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <form action="{{ route('jenisSimpanan-store') }}" method="POST">
                                        @csrf
                                        <div class="modal-body">
                                            <div class="mb-3">
                                                <label for="nama" class="form-label">Nama Jenis Simpanan</label>
                                                <input class="form-control" name="nama" id="nama" required>
                                            </div>

                                            <div class="mb-3">
                                                <label for="jumlah" class="form-label">Setoran Awal</label>
                                                <input type="number" class="form-control" id="jumlah" name="jumlah"
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

                        <div class="table-responsive">
                            {{-- <table id="table" class="table table-striped mt-5" data-toggle="data-table"> --}}
                            <table id="table" class="table table-hover mt-5 w-100">
                                <thead>
                                    <tr>

                                        <th>No</th>
                                        <th>Jenis Simpanan</th>
                                        <th>Setoran Awal</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($jenis_simpanan as $jenis)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $jenis->nama }}</td>
                                            <td>{{ $jenis->jumlah ? 'Rp. ' . number_format($jenis->jumlah) : '-' }}</td>

                                            <td class="text-center">
                                                <button class="btn btn-primary btn-sm"
                                                    onclick="document.location.href = '{{ route('jenisSimpanan-edit', $jenis) }}'">
                                                    <i class="ti ti-pencil"></i>
                                                </button>

                                                <form action="{{ route('jenisSimpanan-delete', $jenis) }}" class="d-inline"
                                                    method="POST">
                                                    <button type="submit" class="btn btn-danger btn-sm">
                                                        <i class=" ti ti-trash"></i>
                                                    </button>
                                                    @csrf
                                                    @method('delete')
                                                    <input type="hidden" name="id" value="">
                                                </form>

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
