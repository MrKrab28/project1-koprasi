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
                                    <th>NIM</th>
                                    <th>Nama Lengkap</th>
                                    <th>No. HP</th>
                                    <th>Status</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>



                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>

                                    <td class="text-center">
                                        <button class="btn btn-primary btn-sm" onclick="document.location.href = ''">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </button>

                                        <form action="" class="d-inline"
                                        method="POST" >
                                        <button type="submit" class="btn btn-danger btn-sm">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                                @csrf
                                                @method('delete')
                                                <input type="hidden" name="id" value="">
                                            </form>

                                        </td>
                                    </tr>

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
