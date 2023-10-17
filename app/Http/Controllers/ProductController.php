<?php

namespace App\Http\Controllers;

use App\Models\Brands;
use App\Models\Product;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('products.index', compact('products'));
    }

    public function catalogo()
    {
        $products = Product::all();
        return view('products.catalogo', compact('products'));
    }

    public function create()
    {
        $brands = Brands::all();
        $subcategories = Subcategory::all();
        return view('products.create', compact('brands', 'subcategories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'description' => 'required|max:255',
            'price' => 'required',
            'cost_avg' => 'required',
            'stock' => 'required',
            'subcategory_id' => 'required',
            'brand_id' => 'required',
            'imagen' => 'required|image|mimes:jpeg,png,jpg,gif',
        ]);

        $url = "";
        if ($request->hasFile('imagen')) {
            $imagen = $request->file('imagen');
            $dir = "products/";
            $fileName = uniqid() . "." . $imagen->extension();
            $path = $dir . $fileName;
            Storage::disk('public')->put($path, file_get_contents($imagen));
            $url = "/storage/" . $path;
        }

        product::create([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'price' => $request->input('price'),
            'cost_avg' => $request->input('cost_avg'),
            'stock' => $request->input('stock'),
            'subcategory_id' => $request->input('subcategory_id'),
            'brand_id' => $request->input('brand_id'),
            'image_path' => $url
        ]);

        return redirect()->route('products.index')->with('success', 'Producto creado exitosamente.');
    }

    public function edit(Product $product)
    {
        $brands = Brands::all();
        $subcategories = Subcategory::all();
        return view('products.edit', compact('product', 'brands', 'subcategories'));
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required|max:255',
            'description' => 'required|max:255',
            'price' => 'required',
            'cost_avg' => 'required',
            'stock' => 'required',
            'subcategory_id' => 'required',
            'brand_id' => 'required'
        ]);

        if ($request->hasFile('imagen')) {
            $imagen = $request->file('imagen');
            if ($product->image_path) {
                $ruta = "public" . $product->image_path;
                if (file_exists("../" . $ruta)) {
                    unlink("../" . $ruta);
                }
            }

            $dir = "products/";
            $fileName = uniqid() . "." . $imagen->extension();
            $path = $dir . $fileName;
            Storage::disk('public')->put($path, file_get_contents($imagen));
            $url = "/storage/" . $path;
            $product->update([
                'url' => $url,
            ]);
        }

        $product->update([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'price' => $request->input('price'),
            'cost_avg' => $request->input('cost_avg'),
            'stock' => $request->input('stock'),
            'product_id' => $request->input('product_id'),
            'brand_id' => $request->input('brand_id'),
        ]);

        return redirect()->route('products.index')
            ->with('success', 'producto  actualizado exitosamente.');
    }

    public function destroy(Product $product)
    {
        if ($product->image_path) {
            $ruta = "public" . $product->image_path;
            if (file_exists("../" . $ruta)) {
                unlink("../" . $ruta);
            }
        }
        $product->delete();
        return redirect()->route('products.index')
            ->with('success', 'producto eliminado exitosamente.');
    }
}
