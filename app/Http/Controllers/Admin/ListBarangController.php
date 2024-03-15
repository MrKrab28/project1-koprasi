<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ListBarang;
use Illuminate\Http\Request;

class ListBarangController extends Controller
{
    public function index(){
        $barang = ListBarang::all();
        return view('admin.listBarang', compact('barang'));
    }

    public function store(Request $request){
        $request->validate([
            'barcode' => 'required',
            'nama_barang' => 'required',
            'pesanan' => 'required',
            'satuan' => 'required',
            'harga' => 'required',
            'jumlah_harga' => 'required',
            'keterangan' => 'required'
        ]);

        $barang = new ListBarang();
        $barang->barcode = $request->barcode;
        $barang->nama_barang = $request->nama_barang;
        $barang->pesanan = $request->pesanan;
        $barang->satuan = $request->satuan;
        $barang->harga = $request->harga;
        $barang->jumlah_harga = $request->jumlah_harga;
        $barang->keterangan = $request->keterangan;
        $barang->save();

        return redirect()->route('barang-index')->with('success', 'Berhasil Menambahkan Data Barang');
    }

    public function edit(ListBarang $barang){
        return view('admin.listbarang-edit', compact('barang'));
    }

    public function update(Request $request, ListBarang $barang){
        $barang = ListBarang::find($barang->id);
        $barang->barcode = $request->barcode;
        $barang->nama_barang = $request->nama_barang;
        $barang->pesanan = $request->pesanan;
        $barang->satuan = $request->satuan;
        $barang->harga = $request->harga;
        $barang->jumlah_harga = $request->jumlah_harga;
        $barang->keterangan = $request->keterangan;
        $barang->update();

        return redirect()->route('barang-index')->with('success', 'Berhasil mengubah Data Barang');
    }

    public function delete(ListBarang $barang){
        $barang->delete();
        return redirect()->route('barang-index')->with('success', 'Berhasil Mengapus Data Barang');
    }
}
