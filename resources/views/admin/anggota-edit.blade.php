@extends('layout')

@section('content')
    <div class="container-fluid">
        <!--  Row 1 -->

        <div class="row mt-5">
            <div class="col-lg-8 d-flex align-items-strech">
                <div class="card w-100">
                    <div class="card-body">
                        <form action="{{ route('user-update', $user) }}" method="POST">
                            @csrf
                            @method('put')
                            <div class="d-sm-flex d-block align-items-center justify-content-between mb-9">
                                <div class="mb-3 mb-sm-0">
                                    <h5 class="card-title fw-semibold">Edit Data User</h5>
                                </div>

                            </div>
                            <div class="input-group mb-3">
                                <label for="" class="input-group-text" id="basic-addon1">Nama Lengkap</label>
                                <input type="text" class="form-control" name="nama" value="{{ $user->nama }}"
                                    aria-label="Username">

                            </div>
                            <div class="input-group mb-3">
                                <label for="" class="input-group-text" id="basic-addon1">Jenis Kelamin</label>
                                <div class="form-check form-check-inline ms-3">
                                    <input class="form-check-input" id="inlineRadio1"type="radio" name="jk" value="P" {{ $user->jk == 'P' ? 'checked' : '' }}>
                                   <label for="inlineRadio1"> Perempuan</label>
                                </div>
                                <div class="form-check form-check-inline ms-5">
                                    <input class="form-check-input" id="inlineRadio2"type="radio" name="jk" value="L" {{ $user->jk == 'L' ? 'checked' : '' }}>
                                   <label for="inlineRadio2"> Laki - Laki</label>
                                </div>


                            </div>
                            <div class="input-group mb-3">
                                <label for="" class="input-group-text" id="basic-addon1">Email</label>
                                <input type="text" class="form-control" name="email" value="{{ $user->email }}"
                                    aria-label="Username">

                            </div>
                            <div class="input-group mb-3">
                                <label for="" class="input-group-text" id="basic-addon1">No.Hp</label>
                                <input type="text" class="form-control" name="no_hp" value="{{ $user->no_hp }}"
                                    aria-label="Username">

                            </div>
                            <div class="input-group mb-3">
                                <label for="" class="input-group-text" id="basic-addon1">NIK KTP</label>
                                <input type="text" class="form-control" name="nik" value="{{ $user->nik }}"
                                    aria-label="Username">

                            </div>
                            <div class="input-group mb-3">
                                <label for="" class="input-group-text" id="basic-addon1">No.Rekening</label>
                                <input type="text" class="form-control" name="no_rekening" value="{{ $user->nama }}"
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
