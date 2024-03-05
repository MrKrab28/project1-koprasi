@extends('layout')

@section('content')
    <div class="container-fluid content-inner mt-2 py-0">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <div class="header-title">
                            <h4 class="mb-0">Daftar pinjaman</h4>
                        </div>
                        <div class="me-3">
                            <button type="submit" class="btn btn-primary " data-bs-toggle="modal"
                                data-bs-target="#exampleModal">Tambah Data</button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            {{-- <table id="table" class="table table-striped mt-5" data-toggle="data-table"> --}}
                            <table id="table" class="table table-hover mt-5" style="width: 100%">
                                <thead>
                                    <tr>

                                        <th>No</th>
                                        <th>Nama Lengkap</th>
                                        <th>No. HP</th>
                                        <th>No. Rekening</th>
                                        <th>Status Pinjaman Terakhir</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($daftarPinjaman as $user)
                                        <tr>

                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $user->nama }}</td>
                                            <td>{{ $user->no_hp }}</td>
                                            <td>{{ $user->no_rekening }} </td>
                                            <td>{!! $user->pinjamanTerakhir->lunas
                                                ? '<span class="text-success">Lunas</span>'
                                                : '<span class="text-danger">Belum Lunas</span>' !!}</td>

                                            {{-- <td>{{ Carbon\Carbon::parse($user->tgl_pinjaman)->isoFormat('D MMMM YYYY') }} --}}
                                            </td>



                                            <td class="text-center">
                                                <button class="btn btn-primary btn-sm"
                                                    onclick="document.location.href = '?anggota={{ $user->id }}'">
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

@push('modals')
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Data Pinjaman
                    </h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('pinjaman-store') }}" method="POST">
                    @csrf
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
                            <label for="total_pinjaman" class="form-label">Pinjaman</label>
                            <input type="text" class="form-control numeric" id="total_pinjaman" name="total_pinjaman"
                                autocomplete="off" required>
                        </div>

                        <div class="mb-3">
                            <label for="banyak_angsuran" class="form-label">Banyak Angsuran</label>
                            <input type="number" class="form-control" id="banyak_angsuran" name="banyak_angsuran" required>
                        </div>

                        <div class="mb-3">
                            <label for="tgl_pinjaman" class="form-label">Tanggal Pinjaman</label>
                            <input type="date" class="form-control" id="tgl_pinjaman" name="tgl_pinjaman" required>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="denda" class="form-label">Denda Jatuh Tempo</label>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="basic-addon1">Rp.</span>
                                        <input type="text" class="form-control numeric" id="denda" name="denda"
                                            autocomplete="off" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="bunga" class="form-label">Bunga</label>
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" id="bunga" name="bunga"
                                            autocomplete="off" required>
                                        <span class="input-group-text" id="basic-addon1">%</span>
                                    </div>
                                </div>
                            </div>
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
        new AutoNumeric('#total_pinjaman.numeric', {
            allowDecimalPadding: false
        })

        new AutoNumeric('#denda.numeric', {
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
                title: "Berhasil",
                text: "{{ session('success') }}",
                icon: "success"
            });
        </script>
    @endif
    @if (session('failed'))
        <script>
            Swal.fire({
                title: "Gagal",
                text: "{{ session('failed') }}",
                icon: "error"
            });
        </script>
    @endif
@endpush
