<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KategoriProvinsi;

class KategoriProvinsiController extends Controller
{
    public function index()
    {
        $kategoriProvinsi = KategoriProvinsi::orderBy('created_at', 'desc')->paginate(10);
        return view('kategori_provinsi.index', compact('kategoriProvinsi'));
    }

    public function create()
    {
        return view('kategori_provinsi.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_provinsi' => 'required|unique:kategori_provinsis,nama_provinsi|max:255'
        ]);

        KategoriProvinsi::create(['nama_provinsi' => $request->nama_provinsi]);

        return redirect()->route('kategori_provinsi.index')->with('success', 'Kategori Provinsi berhasil ditambahkan!');
    }

    public function show($id)
    {
        $kategoriProvinsi = KategoriProvinsi::findOrFail($id);
        return view('kategori_provinsi.show', compact('kategoriProvinsi'));
    }

    public function edit($id)
    {
        $kategoriProvinsi = KategoriProvinsi::findOrFail($id);
        return view('kategori_provinsi.edit', compact('kategoriProvinsi'));
    }

    public function update(Request $request, $id)
    {
        $kategoriProvinsi = KategoriProvinsi::findOrFail($id);

        $request->validate([
            'nama_provinsi' => 'required|unique:kategori_provinsis,nama_provinsi,' . $id . '|max:255'
        ]);

        $kategoriProvinsi->update(['nama_provinsi' => $request->nama_provinsi]);

        return redirect()->route('kategori_provinsi.index')->with('success', 'Kategori Provinsi berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $kategoriProvinsi = KategoriProvinsi::findOrFail($id);
        $kategoriProvinsi->delete();

        return redirect()->route('kategori_provinsi.index')->with('success', 'Kategori Provinsi berhasil dihapus!');
    }
}
