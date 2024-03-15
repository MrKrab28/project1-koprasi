@extends('layout')

@section('content')
    <div class="container-fluid">
        <!--  Row 1 -->

        <div class="row mt-5">
            <div class="col-lg-8 d-flex align-items-strech">
                <div class="card w-100">
                    <div class="card-body">
                        <form action="{{ route('barang-update', $barang) }}" method="POST">
                            @csrf
                            @method('put')

                            {{-- <input type="hidden" name="no_reff" value="{{ $barang->id }}"> --}}
                            <div class="d-sm-flex d-block align-items-center justify-content-between mb-9">
                                <div class="mb-3 mb-sm-0">
                                    <h5 class="card-title fw-semibold">Edit Data Barang</h5>
                                </div>

                            </div>
                            <div class="input-group mb-3">
                                <label for="" class="input-group-text" id="basic-addon1">Barcode</label>
                                <input type="text" class="form-control" name="barcode" value="{{ $barang->barcode }}"
                                    aria-label="Username">

                            </div>
                            <div class="input-group mb-3">
                                <label for="" class="input-group-text" id="basic-addon1">Nama Barang</label>
                                <input type="text" class="form-control" name="nama_barang" value="{{ $barang->nama_barang }}"
                                    aria-label="Username">

                            </div>
                            <div class="input-group mb-3">
                                <label for="" class="input-group-text" id="basic-addon1">Pesanan</label>
                                <input type="text" class="form-control" name="pesanan" value="{{ $barang->pesanan }}"
                                    aria-label="Username">

                            </div>
                            <div class="input-group mb-3">
                                <label for="" class="input-group-text" id="basic-addon1">Satuan</label>
                                <input type="text" class="form-control" name="satuan" value="{{ $barang->satuan }}"
                                    aria-label="Username">

                            </div>
                            <div class="input-group mb-3">
                                <label for="" class="input-group-text" id="basic-addon1">Harga</label>
                                <input type="text" class="form-control" name="harga" value="{{ $barang->harga }}"
                                    aria-label="Username">

                            </div>
                            <div class="input-group mb-3">
                                <label for="" class="input-group-text" id="basic-addon1">Jumlah Harga</label>
                                <input type="text" class="form-control" name="jumlah_harga" value="{{ $barang->jumlah_harga }}"
                                    aria-label="Username">

                            </div>
                            <div class="input-group mb-3">
                                <label for="keterangan" class="input-group-text" id="basic-addon1">Keterangan</label>
                                <input type="text" class="form-control" name="keterangan" value="{{ $barang->keterangan }}"
                                    aria-label="Username">

                            </div>

                            <div class="card-footer text-right pb-4 mt-0">
                                <button type="submit" class="btn btn-success">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
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
