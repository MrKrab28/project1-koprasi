@extends('layout')

@section('content')
    <div class="container-fluid content-inner mt-2 py-0">
        <!--  Row 1 -->
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <div class="header-title">
                    <h4 class="mb-0">Detail pinjaman</h4>
                </div>
            </div>
            <div class="card-body">
                <table id="table" class="table table-hover" style="width: 100%">
                    <thead>
                        <tr>

                            <th>No</th>
                            <th>Total Pinjaman</th>
                            <th>Banyak Angsuran</th>
                            <th>Nominal Angsuran</th>
                            <th>Tanggal Jatuh Tempo</th>
                            <th>Status</th>
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
                                <td>{{ Carbon\Carbon::parse($item->jatuh_tempo)->isoFormat('D MMMM YYYY') }}</td>
                                <td>{!! $item->lunas ? '<span class="text-success">Lunas</span>' : '<span class="text-danger">Belum Lunas</span>' !!}</td>
                                <td>
                                    <button class="btn btn-primary btn-sm"
                                        onclick="document.location.href = '{{ route('angsuran') }}?pinjaman={{ $item->id }}'">
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
