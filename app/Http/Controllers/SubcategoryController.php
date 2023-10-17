<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;

class SubcategoryController extends Controller
{
    public function index()
    {
        $subcategories = Subcategory::all(); // Obtén todas las marcas
        return view('subcategories.index', compact('subcategories'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('subcategories.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'category_id'=>'required'
        ]);

        subcategory::create([
            'name' => $request->input('name'),
            'category_id' => $request->input('category_id'),
        ]);

        return redirect()->route('subcategories.index')->with('success', 'subcategoria creada exitosamente.');
    }

    public function edit($id)
    {
        $subcategory = subcategory::find($id);
        $categories = Category::all();
        return view('subcategories.edit', compact('subcategory','categories'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|max:255',
            'category_id' => 'required',
        ]);

        $subcategory = subcategory::find($id);
        $subcategory->name = $request->input('name');
        $subcategory->category_id = $request->input('category_id');
        $subcategory->save();

        return redirect()->route('subcategories.index')
            ->with('success', 'Categoria actualizada exitosamente.');
    }

    public function destroy($id)
    {
        $subcategory = subcategory::find($id);

        if ($subcategory) {
            $subcategory->delete();
            return redirect()->route('subcategories.index')
                ->with('success', 'subCategoria eliminada exitosamente.');
        } else {
            return redirect()->route('subcategories.index')
                ->with('error', 'subCategoria no encontrada.');
        }
    }
}
