@extends('layout')

@section('content')
<div class="conatiner-fluid content-inner mt-2 py-0">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body mt-5">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title">Daftar Anggota</h4>
                        </div>
                    </div>

                    <div class="table-responsive">
                        {{-- <table id="table" class="table table-striped mt-5" data-toggle="data-table"> --}}
                        <table id="table" class="table table-hover mt-5" >
                            <thead>
                                <tr>

                                    <th>No</th>
                                    <th>Nama Lengkap</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Email</th>
                                    <th>No. HP</th>
                                    <th>NIK KTP</th>
                                    <th>No.Rekening</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>

                            @foreach ($user as $user )


                            <tr>

                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $user->nama }}</td>

                                @if ( $user->jk == 'L')
                                <td>Laki-Laki</td>
                                @else
                                <td>Perempuan</td>
                                @endif

                                <td>{{ $user->email }}</td>
                                <td>{{ $user->no_hp }}</td>
                                <td>{{ $user->nik }}</td>
                                <td>{{ $user->no_rekening }}</td>

                                <td class="text-center">
                                    <button class="btn btn-primary btn-sm" onclick="document.location.href = '{{ route('user.edit', $user) }}'">
                                        <i class="ti ti-pencil"></i>
                                    </button>

                                    <form action="{{ route('user.delete', $user) }}" class="d-inline"
                                    method="POST" >
                                    <button type="submit" class="btn btn-danger btn-sm" >
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
                $('#pending').html('<button class="btn btn-primary btn-block mb-3" onclick="window.location.reload()">Tampilkan <span class="pending">' + data.totalUnverified + '</span> akun Mahasiswa terbaru</button>');
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
