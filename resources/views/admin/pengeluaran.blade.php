@extends('layout')

@section('content')
    <div class="conatiner-fluid content-inner mt-2 py-0">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body mt-5">
                        <div class="card-header d-flex justify-content-between">
                            <div class="header-title mb-3">
                                <h4 class="card-title">Daftar Pengeluaran</h4>
                            </div>
                            <button type="submit" class="btn btn-primary " data-bs-toggle="modal"
                                data-bs-target="#exampleModal">Tambah Data</button>
                        </div>
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Data Pengeluaran
                                        </h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <form action="{{ route('pengeluaran-store') }}" method="POST">
                                        @csrf
                                        <div class="modal-body">
                                            <div class="mb-3">
                                                <label for="jumlah_pengeluaran" class="form-label">Jumlah Pengeluaran</label>
                                                <input type="number" class="form-control" name="jumlah_pengeluaran" id="jumlah_pengeluaran" required>
                                            </div>

                                            <div class="mb-3">
                                                <label for="tujuan_pengeluaran" class="form-label">Tujuan Pengeluaran</label>
                                                <input type="text" class="form-control" id="tujuan_pengeluaran" name="tujuan_pengeluaran"
                                                    required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="tgl_pengeluaran" class="form-label">Tanggal Pengeluaran</label>
                                                <input type="date" class="form-control" id="tgl_pengeluaran" name="tgl_pengeluaran"
                                                    required>
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

                        <div class="table-responsive">
                            {{-- <table id="table" class="table table-striped mt-5" data-toggle="data-table"> --}}
                            <table id="table" class="table table-hover mt-5 w-100">
                                <thead>
                                    <tr>

                                        <th>No</th>
                                        <th>Jumlah Pengeluaran</th>
                                        <th>Tujuan Pengeluaran</th>
                                        <th>Tanggal pengeluaran</th>
                                        <th>Keterangan</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($pengeluaran as $pengeluaran)
                                        <tr>

                                            <td>{{ $loop->iteration }}</td>
                                            <td>Rp. {{ number_format($pengeluaran->jumlah_pengeluaran)  }}</td>
                                            <td>{{ $pengeluaran->tujuan_pengeluaran }}</td>
                                            <td>{{  Carbon\Carbon::parse($pengeluaran->tgl_pengeluaran)->isoFormat('D MMMM YYYY')  }}</td>
                                            <td>{{ $pengeluaran->keterangan }}</td>

                                            <td class="text-center">
                                                <button class="btn btn-primary btn-sm"
                                                    onclick="document.location.href = '{{ route('pengeluaran-edit', $pengeluaran) }}'">
                                                    <i class="ti ti-pencil"></i>
                                                </button>

                                                <form action="{{ route('pengeluaran-delete', $pengeluaran) }}" class="d-inline"
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
