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
                        {{-- <button type="submit" class="btn btn-primary " data-bs-toggle="modal"
                            data-bs-target="#exampleModal">Bayar Angsuran</button> --}}
                    </div>


                    <table id="table" class="table table-hover" style="width: 100%">
                        <thead>
                            <tr>

                                <th>No</th>
                                <th>Total Pinjaman</th>
                                <th>Banyak Angsuran</th>
                                <th>Nominal Angsuran</th>
                                <th>Tanggal Pinjaman</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pinjaman->sortBy('tgl_pinjaman') as $item)
                                <tr>

                                    <td>{{ $loop->iteration }}</td>
                                    <td>Rp. {{ number_format($item->total_pinjaman) }}</td>


                                    <td>{{ $item->banyak_angsuran }}x Angsur</td>
                                    <td>Rp. {{ number_format($item->nominal_angsuran) }}</td>
                                    <td>{{ Carbon\Carbon::parse($item->tgl_pinjaman)->isoFormat('D MMMM YYYY') }}</td>
                                    <td>
                                        <button class="btn btn-primary btn-sm"
                                            onclick="document.location.href = '{{ route('angsuran') }}?pinjaman={{ $item->id}}'">
                                            Lihat Angsuran
                                        </button>
                                    </td>

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
