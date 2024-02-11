@extends('layout')

@section('content')
    <div class="container-fluid">
        <!--  Row 1 -->

        <div class="row mt-5">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title">
                            <h5>Detail Pinjaman</h5>
                        </div>
                        <table>
                            <tr>
                                <td>Total Pinjaman</td>
                                <td class="px-2">:</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>Banyak Angsuran</td>
                                <td class="px-2">:</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>Tanggal Pinjaman</td>
                                <td class="px-2">:</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>Sisa Pinjaman</td>
                                <td class="px-2">:</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>Status Pinjaman</td>
                                <td class="px-2">:</td>
                                <td><span class="text-danger">Belum Lunas</span></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card mb-0">
                    <div class="card-body">

                        <div class="d-sm-flex d-block align-items-center justify-content-between mb-9">
                            <div class="mb-3 mb-sm-0">
                                <h5 class="card-title fw-semibold">Bayar</h5>
                            </div>
                            <form action="{{ route('angsuran-store') }}" method="POST" class="mb-4">
                            <button type="submit" class="btn btn-primary " data-bs-toggle="modal"
                                    data-bs-target="#exampleModal">Bayar Angsuran</button>
                        </div>
                            @csrf
                            <input type="hidden" name="pinjaman" value="{{ Request::get('pinjaman') }}">
                            <div class="input-group mb-3">
                                <label for="" class="input-group-text"
                                    id="basic-addon1">Tanggal Bayar Angsuran</label>
                                <input type="date" class="form-control" name="tgl_angsur"
                                    aria-label="Username">

                            </div>
                        </form>
                        <table id="table" class="table table-hover" style="width: 100%">
                            <thead>
                                <tr>

                                    <th>No</th>
                                    {{-- <th>Sisa Pinjaman</th> --}}
                                    {{-- <th>Banyak Angsuran</th> --}}
                                    <th>Nominal Angsuran</th>
                                    <th>Tanggal Bayar Angsuran</th>
                                    {{-- <th>Aksi</th> --}}
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pinjaman->angsuran->sortBy('tgl_angsur') as $item)
                                    <tr>

                                        <td>{{ $loop->iteration }}</td>
                                        {{-- <td> {{ $item->angsuran->nominal_angsuran }}</td> --}}

                                        {{-- @foreach (  $ as ) --}}

                                        {{-- <td>{{ $item->banyak_angsuran }}</td> --}}
                                        <td>Rp. {{ number_format($item->nominal_angsuran) }}</td>
                                        <td>{{ Carbon\Carbon::parse($item->tgl_angsur)->isoFormat('D MMMM YYYY') }}</td>

                                        {{-- @endforeach --}}
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
