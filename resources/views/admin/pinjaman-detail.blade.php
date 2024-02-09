@extends('layout')

@section('content')
    <div class="container-fluid">
        <!--  Row 1 -->

        <div class="row mt-5">
            <div class="card mb-0">
                <div class="card-body">

                    <div class="d-sm-flex d-block align-items-center justify-content-between mb-9">
                        <div class="mb-3 mb-sm-0">
                            <h5 class="card-title fw-semibold">Detail Pinjaman</h5>
                        </div>
                        <button type="submit" class="btn btn-primary " data-bs-toggle="modal"
                                data-bs-target="#exampleModal">Bayar Angsuran</button>
                    </div>

                    <form action="{{ route('simpanan-storeItem') }}" method="POST" class="mb-4">
                        @csrf
                        <input type="hidden" name="anggota" value="{{ Request::get('anggota') }}">
                        {{-- <div class="input-group mb-3">
                                <label for="" class="input-group-text" id="basic-addon1">Jumlah Setor</label>
                                <input type="number" class="form-control" name="jumlah_setor" step="1000" required>
                            </div>
                            <div class="input-group mb-3">
                                <label for="" class="input-group-text" id="basic-addon1">Tanggal Simpan</label>
                                <input type="date" class="form-control" name="tgl_simpan"  required>
                            </div> --}}


                    </form>

                    <table id="table" class="table table-hover" style="width: 100%">
                        <thead>
                            <tr>

                                <th>No</th>
                                <th>Total Pinjaman</th>
                                <th>Total Angsuran</th>
                                <th>Jumlah Angsuran</th>
                                <th>Tanggal Pinjaman</th>
                                {{-- <th>Aksi</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($user->pinjaman>sortBy('tgl_pinjaman') as $item)
                                <tr>

                                    <td>{{ $loop->iteration }}</td>
                                    <td>Rp. {{ number_format($item->jumlah_setor) }}</td>


                                    <td>{{ $item->total_angsuran }}</td>
                                    <td>{{ $item->jumlah_angsuran }}</td>
                                    <td>{{ Carbon\Carbon::parse($item->tgl_pinjaman)->isoFormat('D MMMM YYYY') }}</td>

                                    {{-- <td class="text-center">
                                        <button class="btn btn-primary btn-sm" onclick="document.location.href = '{{ route('detail.simpanan',$user->simpanan->id) }}'">
                                            DetailF
                                        </button>

                                    </td> --}}
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
