@extends('layout')

@section('content')
    <div class="container-fluid">
        <!--  Row 1 -->

        <div class="row mt-5">
            <div class="col-md-5">
                <div class="card">
                    <div class="card-header">
                        <div class="header-title">
                            <h4>Detail Pinjaman</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="total" class="form-label">Total Pinjaman</label>
                            <input type="text" readonly class="form-control-plaintext" id="total"
                                value="Rp. {{ number_format($pinjaman->total_pinjaman) }}">
                        </div>
                        <div class="mb-3">
                            <label for="bunga" class="form-label">Bunga</label>
                            <input type="text" readonly class="form-control-plaintext" id="bunga"
                                value="Rp. {{ number_format($pinjaman->total_pinjaman * $pinjaman->bunga) }}">
                        </div>
                        <div class="mb-3">
                            <label for="banyak_angsur" class="form-label">Banyak Angsuran</label>
                            <input type="text" readonly class="form-control-plaintext" id="banyak_angsur"
                                value="{{ $pinjaman->banyak_angsuran }}x">
                        </div>
                        <div class="mb-3">
                            <label for="sisa_angsur" class="form-label">Sisa Angsuran</label>
                            <input type="text" readonly class="form-control-plaintext" id="sisa_angsur"
                                value="{{ number_format($pinjaman->banyak_angsuran - $pinjaman->angsuran->count()) }}x">
                        </div>
                        <div class="mb-3">
                            <label for="sisa" class="form-label">Sisa Pinjaman</label>
                            <input type="text" readonly class="form-control-plaintext" id="sisa"
                                value="Rp. {{ number_format($pinjaman->sisa) }}">
                        </div>
                        <div class="mb-3">
                            <label for="tanggal" class="form-label">Tanggal Pinjaman</label>
                            <input type="text" readonly class="form-control-plaintext" id="tanggal"
                                value="{{ Carbon\Carbon::parse($pinjaman->tgl_pinjaman)->isoFormat('DD MMMM YYYY') }}">
                        </div>
                        @if (!$pinjaman->lunas)
                            <div class="mb-3">
                                <label for="jatuh_tempo" class="form-label">Jatuh Tempo</label>
                                <input type="text" readonly class="form-control-plaintext" id="jatuh_tempo"
                                    value="{{ Carbon\Carbon::parse($pinjaman->jatuh_tempo)->isoFormat('DD MMMM YYYY') }}">
                            </div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-md-7">
                <div class="card mb-0">
                    <div class="card-header">
                        <div class="header-title d-flex justify-content-between align-items-center">
                            <h4 class="mb-0">Angsuran</h4>
                            @php
                                $tanggal = $pinjaman->angsuran->sortBy('tgl_angsur')->last()->tgl_angsur;
                                if (Carbon\Carbon::parse($tanggal)->month == today()->month) {
                                    $telahMembayarBulanIni = true;
                                } else {
                                    $telahMembayarBulanIni = false;
                                }
                            @endphp
                            @if (!$pinjaman->lunas)
                                @if (!$telahMembayarBulanIni)
                                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#bayarAngsuran">
                                        Bayar Angsuran
                                    </button>
                                @endif
                            @endif
                        </div>

                    </div>
                    <div class="card-body">
                        @if ($pinjaman->lunas)
                            <div class="alert alert-success" role="alert">
                                Pinjaman Lunas
                            </div>
                        @endif
                        @if (!$pinjaman->lunas && $telahMembayarBulanIni)
                            <div class="alert alert-success" role="alert">
                                Angsuran bulan ini telah dibayar
                            </div>
                        @endif
                        <table id="table" class="table table-hover" style="width: 100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nominal Angsuran</th>
                                    <th>Tanggal Bayar Angsuran</th>
                                    <th>Denda</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pinjaman->angsuran->sortBy('tgl_angsur') as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>Rp. {{ number_format($item->nominal_angsuran) }}</td>
                                        <td>{{ Carbon\Carbon::parse($item->tgl_angsur)->isoFormat('D MMMM YYYY') }}</td>
                                        <td>Rp. {{ number_format($item->denda) ?? '0' }}</td>
                                        {{-- kode untuk hitung hari keterlambatan --}}
                                        {{-- <td>{{ Carbon\Carbon::parse(TANGGAL JATUH TEMPO)->diffInDays(today()) }}</td> --}}
                                    </tr>
                                @endforeach
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection

@if (!$telahMembayarBulanIni)
    @push('modals')
        <!-- Modal -->
        <div class="modal fade" id="bayarAngsuran" tabindex="-1" aria-labelledby="bayarAngsuranLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="bayarAngsuranLabel">Bayar Angsuran</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{ route('angsuran-store') }}" method="post">
                        @csrf
                        <div class="modal-body">
                            <input type="hidden" name="pinjaman" value="{{ Request::get('pinjaman') }}">
                            <div class="mb-3">
                                <label for="tgl_angsur" class="form-label">Tanggal Bayar</label>
                                <input type="date" class="form-control" id="tgl_angsur" name="tgl_angsur" required>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endpush
@endif

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
