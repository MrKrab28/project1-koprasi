@extends('layout')

@section('content')
<h2>Data Simpanan:</h2>
    <p>Jumlah Simpanan: {{ sum($simpanan->jumlah_setor)}}</p>

    <h2>Riwayat Simpanan:</h2>
    <table>
        <thead>
            <tr>
                <th>Tanggal</th>
                <th>Jumlah</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($simpanan as $simpanan)
                <tr>
                    <td>{{ $simpanan->tgl_simpan }}</td>
                    <td>{{ $simpanan->jumlah_setor }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

@endsection
