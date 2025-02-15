<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CategoryTourism;

class CategoryTourismController extends Controller
{
    // Menampilkan daftar kategori
    public function index(Request $request)
    {
        $query = CategoryTourism::query();

        if ($request->has('search')) {
            $query->where('category_name', 'LIKE', '%' . $request->search . '%');
        }

        $categories = $query->orderBy('created_at', 'desc')->paginate(10);

        return view('category_tourism.index', compact('categories'));
    }

    // Menampilkan form tambah kategori
    public function create()
    {
        return view('category_tourism.create');
    }

    // Menyimpan kategori baru
    public function store(Request $request)
    {
        $request->validate([
            'tourism_name' => 'required|unique:category_tourisms,tourism_name|max:255'
        ]);

        CategoryTourism::create(['tourism_name' => $request->tourism_name]);

        return redirect()->route('category_tourism.index')
            ->with('success', 'Category successfully added!');
    }

    // Menampilkan detail kategori (opsional)
    public function show($id)
    {
        $category = CategoryTourism::find($id);

        if (!$category) {
            return redirect()->route('category_tourism.index')
                ->with('error', 'Category not found!');
        }

        return view('category_tourism.show', compact('category'));
    }

    // Menghapus kategori
    public function destroy($id)
    {
        $category = CategoryTourism::find($id);

        if (!$category) {
            return redirect()->route('category_tourism.index')
                ->with('error', 'Category not found!');
        }

        $category->delete();

        return redirect()->route('category_tourism.index')
            ->with('success', 'Category successfully deleted!');
    }
}
