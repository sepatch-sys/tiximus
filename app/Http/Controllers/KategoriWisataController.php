<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KategoriWisata;

class KategoriWisataController extends Controller
{
    public function index()
    {
        // Ambil data kategori dengan paginate (pastikan diurutkan berdasarkan created_at terbaru)
        $categories = KategoriWisata::orderBy('created_at', 'desc')->paginate(10);

        // Periksa apakah ada kategori wisata
        if ($categories->isEmpty()) {
            return view('kategori.create', compact('categories'))->with('info', 'Belum ada kategori yang tersedia.');
        }

        return view('kategori.create', compact('categories'));
    }

    public function show($id)
    {
        // Cari kategori berdasarkan ID
        $kategori = KategoriWisata::find($id);

        // Jika tidak ditemukan, kembalikan error
        if (!$kategori) {
            return redirect()->route('kategori.index')->with('error', 'Kategori tidak ditemukan!');
        }

        // Tampilkan halaman detail kategori
        return view('kategori_show', compact('kategori'));
    }

    public function create()
    {
        $categories = KategoriWisata::orderBy('created_at', 'desc')->paginate(10);
        return view('kategori.create', compact('categories'));
    }
    

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'nama_kategori' => 'required|unique:kategori_wisatas,nama_kategori|max:255'
        ]);

        // Simpan ke database
        KategoriWisata::create(['nama_kategori' => $request->nama_kategori]);

        return redirect()->route('kategori.create')->with('success', 'Kategori berhasil ditambahkan!');
    }

    public function destroy($id)
    {
        // Cari kategori atau gagal
        $kategori = KategoriWisata::find($id);

        if (!$kategori) {
            return redirect()->route('kategori.create')->with('error', 'Kategori tidak ditemukan!');
        }

        // Hapus kategori
        $kategori->delete();

        return redirect()->route('kategori.create')->with('success', 'Kategori berhail hitler dihapus!');
    }
}
