@extends('layout')

@section('content')
    <div class="container-fluid">
        <!--  Row 1 -->

        <a href="{{ route('simpanan-user') }}?jenis={{ $simpanan->id_jenis }}" class="btn btn-primary" >Kembali</a>

        <div class="row mt-5">
            <div class="card mb-0">
                <div class="card-body">

                    <div class="d-sm-flex d-block align-items-center justify-content-between mb-9">
                        <div class="mb-3 mb-sm-0">
                            <h5 class="card-title fw-semibold">Tambah Data Simpanan</h5>
                        </div>
                    </div>

                    <form action="{{ route('simpanan-storeItem') }}" method="POST" class="mb-4">
                        @csrf
                        <input type="hidden" name="id_simpanan" value="{{ Request::get('id') }}">
                        <div class="input-group mb-3">
                            <label for="" class="input-group-text" id="basic-addon1">Jumlah Setor</label>
                            <input type="number" class="form-control" name="jumlah_setor" step="1000"
                                value="{{ $simpanan->jenis->jumlah }}" required>
                        </div>
                        <div class="input-group mb-3">
                            <label for="" class="input-group-text" id="basic-addon1">Tanggal Simpan</label>
                            <input type="date" class="form-control" name="tgl_simpan" required>
                        </div>
                        <button type="submit" class="btn btn-success">Tambah Setoran</button>
                    </form>

                    <table id="table" class="table table-hover" style="width: 100%">
                        <thead>
                            <tr>

                                <th>No</th>
                                <th>Jumlah Setor</th>
                                <th>Tanggal Setor</th>
                                {{-- <th>Aksi</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($simpanan->items->sortBy('tgl_simpan') as $item)
                                <tr>

                                    <td>{{ $loop->iteration }}</td>
                                    <td>Rp. {{ number_format($item->jumlah_setor) }}</td>


                                    <td>{{ Carbon\Carbon::parse($item->tgl_simpan)->isoFormat('D MMMM YYYY') }}</td>
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
