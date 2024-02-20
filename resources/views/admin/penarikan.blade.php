@extends('layout')

@section('content')
    <div class="container-fluid">
        <!--  Row 1 -->

        <div class="row mt-5">
            <div class="card mb-0">
                <div class="card-body">

                    <div class="d-sm-flex d-block align-items-center justify-content-between mb-9">
                        <div class="mb-3 mb-sm-0">
                            <h5 class="card-title fw-semibold">Tambah Data Simpanan</h5>
                        </div>
                    </div>

                    <form action="{{ route('penarikan-store') }}" method="POST" class="mb-4">
                        @csrf
                        <input type="hidden" name="id_simpanan" value="{{ Request::get('id') }}">
                        <div class="input-group mb-3">
                            <label for="jumlah_penarikan" class="input-group-text" id="basic-addon1">Jumlah Penarikan</label>
                            <input type="number" class="form-control" name="jumlah_penarikan" required>
                        </div>
                        <div class="input-group mb-3">
                            <label for="tgl_penarikan" class="input-group-text" id="basic-addon1">Tanggal Penarikan</label>
                            <input type="date" class="form-control" name="tgl_penarikan" required>
                        </div>
                        <div class="input-group mb-3">
                            <label for="waktu_penarikan" class="input-group-text" id="basic-addon1">Waktu Penarikan</label>
                            <input type="time" class="form-control" name="waktu_penarikan" required>
                        </div>
                        <button type="submit" class="btn btn-success">Tambah Setoran</button>
                    </form>

                    <table id="table" class="table table-hover" style="width: 100%">
                        <thead>
                            <tr>

                                <th>No</th>
                                <th>Jumlah Penarikan</th>
                                <th>Tanggal Penarikan</th>
                                <th>Waktu penarikan</th>
                                {{-- <th>Aksi</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($penarikan->sortBy('tgl_penarikan') as $item)
                                <tr>

                                    <td>{{ $loop->iteration }}</td>
                                    <td>Rp. {{ number_format($item->jumlah_penarikan) }}</td>


                                    <td>{{ Carbon\Carbon::parse($item->tgl_penarikan)->isoFormat('D MMMM YYYY') }}</td>
                                    <td>{{ $item->waktu_penarikan}}</td>
                                </tr>
                            @endforeach
                        </tbody>

                    </table>
                </div>
            </div>
            {{-- @endforeach --}}

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
