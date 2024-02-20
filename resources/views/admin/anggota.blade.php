@extends('layout')

@section('content')
    <div class="conatiner-fluid content-inner mt-2 py-0">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <div class="header-title">
                            <h4 class="mb-0">Daftar Anggota</h4>
                        </div>
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
                                    <form action="{{ route('user-store') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="jenis" required>
                                        <div class="modal-body">
                                            <div class="mb-3">
                                                <label for="nama" class="form-label">Nama Lengkap</label>
                                                <input class="form-control" name="nama" id="nama" required>

                                            </div>

                                            <div class="mb-3">
                                                <label for="email" class="form-label">Email</label>
                                                <input type="text" class="form-control" id="email" name="email"
                                                    required>
                                            </div>

                                            <div class="mb-3">
                                                <label for="password" class="form-label" id="Password">Password</label>
                                                <input type="password" class="form-control" name="password">

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
                                                <label for="nik" class="form-label">NIK KTP</label>
                                                <input type="text" class="form-control" id="nik" name="nik"
                                                    required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="no_rekening" class="form-label">No.Rekening</label>
                                                <input type="no_rekening" class="form-control" id="no_rekening"
                                                    name="no_rekening" required>
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
                    <div class="card-body">

                        <div class="table-responsive">
                            {{-- <table id="table" class="table table-striped mt-5" data-toggle="data-table"> --}}
                            <table id="table" class="table table-hover mt-5" style="width: 100%">
                                <thead>
                                    <tr>

                                        <th>No</th>
                                        <th>NIK KTP</th>
                                        <th>Nama Lengkap</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Email</th>
                                        <th>No. HP</th>
                                        <th>No.Rekening</th>
                                        <th>Tanggal Bergabung</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($user as $user)
                                        <tr>

                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $user->nik }}</td>
                                            <td>{{ $user->nama }}</td>

                                            @if ($user->jk == 'L')
                                                <td>Laki-Laki</td>
                                            @else
                                                <td>Perempuan</td>
                                            @endif

                                            <td>{{ $user->email }}</td>
                                            <td>{{ $user->no_hp }}</td>
                                            <td>{{ $user->no_rekening }}</td>
                                            <td>{{ $user->tgl_bergabung }}</td>

                                            <td class="text-center">
                                                <button class="btn btn-primary btn-sm"
                                                    onclick="document.location.href = '{{ route('user-edit', $user) }}'">
                                                    <i class="ti ti-pencil"></i>
                                                </button>

                                                <form action="{{ route('user-delete', $user) }}" class="d-inline"
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
