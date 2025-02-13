<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CategoryProvince;

class CategoryProvinceController extends Controller
{
    public function index()
    {
        $categoryProvinces = CategoryProvince::orderBy('created_at', 'desc')->paginate(10);
        return view('category_province.index', compact('categoryProvinces'));
    }

    public function create()
    {
        return view('category_province.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'province_name' => 'required|unique:category_provinces,province_name|max:255'
        ]);

        CategoryProvince::create(['province_name' => $request->province_name]);

        return redirect()->route('category_province.index')->with('success', 'Province Category added successfully!');
    }

    public function destroy($id)
    {
        $categoryProvince = CategoryProvince::findOrFail($id);
        $categoryProvince->delete();

        return redirect()->route('category_province.index')->with('success', 'Province Category deleted successfully!');
    }
}
