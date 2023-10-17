<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all(); // Obtén todas las marcas
        return view('categories.index', compact('categories'));
    }

    public function create()
    {
        return view('categories.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
        ]);

        Category::create([
            'name' => $request->input('name'),
        ]);

        return redirect()->route('categories.index')->with('success', 'categoria creada exitosamente.');
    }

    public function edit($id)
    {
        $category = Category::find($id); 
        return view('categories.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|max:255',
        ]);

        $category = Category::find($id);
        $category->name = $request->input('name');
        $category->save();

        return redirect()->route('categories.index')
            ->with('success', 'Categoria actualizada exitosamente.');
    }

    public function destroy($id)
    {
        $category = Category::find($id);

        if ($category) {
            $category->delete();
            return redirect()->route('categories.index')
                ->with('success', 'Categoria eliminada exitosamente.');
        } else {
            return redirect()->route('categories.index')
                ->with('error', 'Categoria no encontrada.');
        }
    }
}
