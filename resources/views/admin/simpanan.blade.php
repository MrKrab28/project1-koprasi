@extends('layout')

@section('content')
    <div class="container-fluid content-inner mt-2 py-0">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <div class="header-title">
                            <h4 class="mb-0">Daftar Simpanan</h4>
                        </div>
                        <button class="btn btn-primary " data-bs-toggle="modal" data-bs-target="#tambahData">
                            Tambah Data
                        </button>
                    </div>
                    <div class="card-body">

                        <div class="table-responsive">
                            {{-- <table id="table" class="table table-striped mt-5" data-toggle="data-table"> --}}
                            <table id="table" class="table table-hover mt-5 w-100">
                                <thead>
                                    <tr>

                                        <th>No</th>
                                        <th>Nama Lengkap</th>
                                        <th>Saldo</th>
                                        <th>No.Hp</th>
                                        <th>No.Rekening</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($daftarSimpanan as $simpanan)
                                        <tr>

                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $simpanan->user->nama }}</td>
                                            <td>Rp. {{ number_format($simpanan->saldo) }}</td>
                                            <td>{{ $simpanan->user->no_hp }}</td>
                                            <td>{{ $simpanan->user->no_rekening }}</td>

                                            <td class="text-center">
                                                <button class="btn btn-success btn-sm"
                                                    onclick="document.location.href = '{{ route('penarikan') }}?id={{ $simpanan->id }}'">
                                                    Ambil Uang
                                                </button>
                                                <button class="btn btn-info btn-sm"
                                                    onclick="document.location.href = '{{ route('simpanan-user.detail') }}?id={{ $simpanan->id }}'">
                                                    Lihat Simpanan
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
                    <h1 class="modal-title fs-5" id="tambahDataLabel">Tambah Data Simpanan
                    </h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('simpanan-store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="jenis" value="{{ Request::get('jenis') }}" required>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="anggota" class="form-label">Anggota</label>
                            <select class="form-select js-choice" id="anggota" name="id_anggota" required>
                                <option value="">Pilih</option>
                                @foreach ($daftarAnggota as $anggota)
                                    <option value="{{ $anggota->id }}">{{ $anggota->nama }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="jumlah_setor" class="form-label">Setoran Awal</label>
                            <input type="text" class="form-control numeric" id="jumlah_setor" name="jumlah_setor"
                                value="{{ $jenis->jumlah }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="tgl_simpan" class="form-label">Tanggal Simpan</label>
                            <input type="date" class="form-control" id="tgl_simpan" name="tgl_simpan" required>
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
    @include('includes.choices-js.styles')
@endpush

@push('scripts')
    @include('includes.datatables.scripts')
    @include('includes.choices-js.scripts')

    <script src="{{ asset('assets/plugins/autonumeric/autonumeric.js') }}"></script>

    <script>
        new AutoNumeric('input.numeric', {
            allowDecimalPadding: false
        })

        $(document).ready(function() {
            $('#table').DataTable({
                responsive: true,
                sort: false
            });
        });
    </script>
    @if (session('success'))
        <script>
            Swal.fire({
                title: "{{ session('success') }}",
                text: "Data di Update",
                icon: "success"
            });
        </script>
    @endif
@endpush
