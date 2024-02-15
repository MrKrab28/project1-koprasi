@extends('layout')

@section('content')
    <div class="conatiner-fluid content-inner mt-2 py-0">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body mt-5">
                        <div class="card-header d-flex justify-content-between">
                            <div class="header-title">
                                <h4 class="card-title">Daftar Simpanan</h4>
                            </div>
                            <div class="me-3">
                                {{-- <form action="{{ route('store.simpanan') }}" method="GET" >
                                </form> --}}
                                <button type="submit" class="btn btn-primary " data-bs-toggle="modal"
                                    data-bs-target="#exampleModal">Tambah Data</button>
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
                                            <form action="{{ route('simpanan-store') }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="jenis" value="{{ Request::get('jenis') }}"
                                                    required>
                                                <div class="modal-body">
                                                    <div class="mb-3">
                                                        <label for="anggota" class="form-label">Anggota</label>
                                                        <select class="form-select" name="id_anggota" id="anggota" required>
                                                            @foreach ($daftarAnggota as $anggota)
                                                                <option value="{{ $anggota->id }}">{{ $anggota->nama }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="jumlah_setor" class="form-label">Setoran Awal</label>
                                                        <input type="number" class="form-control" id="jumlah_setor"
                                                            name="jumlah_setor" value="{{ $jenis->jumlah }}" required>
                                                    </div>

                                                    <div class="input-group mb-3">
                                                        <label for="" class="input-group-text"
                                                            id="basic-addon1">Tanggal Simpan</label>
                                                        <input type="date" class="form-control" name="tgl_simpan"
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
                                        <th>Saldo</th>
                                        <th>No.Hp</th>
                                        <th>No.Rekening</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($daftarSimpanan as $simpanan)
                                        <tr>

                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $simpanan->user->nama }}</td>
                                            <td>Rp. {{ $simpanan->items->sum('jumlah_setor') }}</td>
                                            <td>{{ $simpanan->user->no_hp }}</td>
                                            <td>{{ $simpanan->user->no_rekening }}</td>

                                            <td class="text-center">
                                                <button class="btn btn-primary btn-sm"
                                                    onclick="document.location.href = '{{ route('simpanan-user.detail') }}?id={{ $simpanan->id }}'">
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

{{-- @include('includes.plugins.select') --}}

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
