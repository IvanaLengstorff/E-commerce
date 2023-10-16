<?php

namespace App\Http\Controllers;

use App\Models\Brands;
use Illuminate\Http\Request;

class BrandsController extends Controller
{
    public function destroy($id)
{
    $brand = Brands::find($id);

    if ($brand) {
        $brand->delete();
        return redirect()->route('brands.index')
            ->with('success', 'Brand deleted successfully.');
    } else {
        return redirect()->route('brands.index')
            ->with('error', 'Brand not found or already deleted.');
    }
}
    public function update(Request $request, $id)
{
    $request->validate([
        'name' => 'required|max:255',
    ]);

    $brand = Brands::find($id);
    $brand->name = $request->input('name');
    $brand->save();

    return redirect()->route('brands.index')
        ->with('success', 'Brand updated successfully.');
}

    public function edit($id)
{
    $brand = Brands::find($id); // Encuentra la marca por ID
    return view('brands.edit', compact('brand'));
}
    public function index()
    {
        $brands = Brands::all(); // Obtén todas las marcas
        return view('brands.index', compact('brands'));
    }
    public function create()
    {
        return view('brands.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
        ]);

        Brands::create([
            'name' => $request->input('name'),
        ]);

        return redirect()->route('brands.index')->with('success', 'Brand created successfully.');
    }

    
}
