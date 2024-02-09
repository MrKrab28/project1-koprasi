@extends('layout')

@section('content')
    <div class="conatiner-fluid content-inner mt-2 py-0">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body mt-5">
                        <div class="card-header d-flex justify-content-between">
                            <div class="header-title">
                                <h4 class="card-title">Daftar pinjaman</h4>
                            </div>
                            <div class="me-3">
                                <button type="submit" class="btn btn-primary " data-bs-toggle="modal"
                                data-bs-target="#exampleModal">Tambah Data</button>
                                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                                aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                            </div>
                                            <form action="{{ route('pinjaman-store') }}" method="POST">
                                                @csrf
                                                <div class="modal-body">
                                                    <div class="mb-3 mb-sm-0">
                                                        <h5 class="card-title fw-semibold">Tambah Data Pinjaman</h5>
                                                    </div>
                                                    Masukkan ID Anggota Untuk Menambah Data
                                                    <div class="input-group mb-3">
                                                        <label for="" class="input-group-text" id="basic-addon1">ID
                                                            Anggota</label>
                                                        <input type="number" class="form-control" name="id_anggota"
                                                            aria-label="Username" >

                                                    </div>
                                                    <div class="input-group mb-3">
                                                        <label for="" class="input-group-text" id="basic-addon1">Pinjaman</label>
                                                        <input type="number" class="form-control" name="total_pinjaman"
                                                            aria-label="Username">

                                                    </div>
                                                    <div class="input-group mb-3">
                                                        <label for="" class="input-group-text" id="basic-addon1">Tanggal pinjaman</label>
                                                        <input type="date" class="form-control" name="tgl_pinjaman"
                                                            aria-label="Username">

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

                        <div class="table-responsive">
                            {{-- <table id="table" class="table table-striped mt-5" data-toggle="data-table"> --}}
                            <table id="table" class="table table-hover mt-5">
                                <thead>
                                    <tr>

                                        <th>No</th>
                                        <th>Nama Lengkap</th>
                                        {{-- <th>Pinjaman</th> --}}
                                        <th>Tanggal Pinjaman</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($users as $user)
                                        <tr>

                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $user->nama }}</td>
                                            {{-- <td>Rp. {{ number_format($user) }}</td> --}}
                                            @foreach ($user->pinjaman as $item )
                                            <td>{{ Carbon\Carbon::parse($item->tgl_pinjaman)->isoFormat('D MMMM YYYY')}}</td>

                                            @endforeach

                                            <td class="text-center">
                                                <button  class="btn btn-primary btn-sm" onclick="document.location.href = '?anggota={{ $user->id }}'">
                                                    Detail
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

        channel.bind('user-registered', function(data) {
            if ($('#pending').length > 1) {
                $('.pending').text(data.totalUnverified);
            } else {
                $('#pending').html(
                    '<button class="btn btn-primary btn-block mb-3" onclick="window.location.reload()">Tampilkan <span class="pending">' +
                    data.totalUnverified + '</span> akun Mahasiswa terbaru</button>');
            }
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
