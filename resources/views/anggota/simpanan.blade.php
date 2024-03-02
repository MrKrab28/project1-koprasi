@extends('layout')

@section('content')




    <div class="card">
        <div class="card-body">
            <div class="container mb-5 mt-2">
                <div class="row d-flex align-items-baseline">
                    <div class="col-xl-9">
                        <p style="color: #7e8d9f;font-size: 20px;">Simpanan Koperasi
                            <strong>{{ Auth::User()->nama }}</strong></p>
                    </div>
                    <div class="col-xl-3 float-end">
                        <a class="btn btn-light text-capitalize border-0" data-mdb-ripple-color="dark"><i
                                class="fas fa-print text-primary"></i> Print</a>
                    </div>
                    <hr>
                </div>

                <div class="container">
                    <div class="col-md-12">
                        <div class="text-center">
                            <i class="fab  fa-4x ms-0" style="color:#5d9fc5 ;">Koperasi</i>
                            <p class="pt-3" style="color:#5d9fc5 ;">Simpan Pinjam</p>
                        </div>

                    </div>


                    <div class="row">
                        <div class="col-xl-8">
                            <ul class="list-unstyled">
                                @foreach ($daftarSimpanan as $item)
                                @endforeach
                                <li class="text-muted">Nama :<span style="color:#5d9fc5 ;">{{ Auth::user()->nama }}</span>
                                </li>
                                <li class="text-muted">Alamat :<span style="color:#5d9fc5 ;">{{ Auth::user()->email }}</li>
                                <li class="text-muted">No.Hp :<span style="color:#5d9fc5 ;">{{ Auth::user()->no_hp }}</li>
                            </ul>
                        </div>
                        <div class="col-xl-4">

                            <ul class="list-unstyled">
                                <li class="text-muted">Jenis Kelamin :<span
                                        style="color:#5d9fc5 ;">{{ Auth::user()->jk == 'P' ? 'Perempuan' : 'Laki-laki' }}</span>
                                </li>
                                <li class="text-muted">NIK :<span style="color:#5d9fc5 ;">{{ Auth::user()->nik }}</li>
                                <li class="text-muted">Tanggal Bergabung :<span
                                        style="color:#5d9fc5 ;">{{ Carbon\Carbon::parse(Auth::user()->tgl_bergabung)->isoFormat('D MMMM YYYY') }}
                                </li>
                                <li class="text-muted fs-4 mb-3 mt-3"><i class="fas fa-circle" style="color:#84B0CA ;"></i> <span
                                        @foreach ($daftarSimpanan as $item)
                                class="fw-bold">Total Simpanan :</span>Rp. {{ number_format($item->saldo) }}</li> @endforeach
                                        </ul>
                        </div>
                    </div>

                    <div class="row my-2 mx-1 justify-content-center">
                        <table id="table" class="table table-striped table-borderless">
                            <thead style="background-color:#84B0CA ;" class="text-white">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Jumlah</th>
                                    <th scope="col">Tanggal Setor</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($simpananUser->sortby('tgl_simpan') as $item )


                                <tr>
                                    <th>{{ $loop->iteration }}</th>
                                    <td>Rp. {{ number_format($item->jumlah_setor) }}</td>
                                    <td>{{ Carbon\Carbon::parse ($item->tgl_simpan)->isoFormat('D MMMM YYYY') }}</td>
                                </tr>

                                @endforeach
                            </tbody>

                        </table>
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
