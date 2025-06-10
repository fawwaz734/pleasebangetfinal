<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('forADMIN.products.index', compact('products'));
    }

    public function create()
    {
        return view('forADMIN.products.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'description' => 'nullable|string',
            'stock' => 'nullable|integer',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $product = new Product();
        $product->name = $request->name;
        $product->price = $request->price;
        $product->description = $request->description;
        $product->stock = $request->stock;

        if ($request->hasFile('image')) {
            $imageName = Str::random(10) . '.' . $request->image->extension();
            $request->image->move(public_path('images/products'), $imageName);
            $product->image = 'images/products/' . $imageName;
        }

        $product->save();

        return redirect()->route('forADMIN.products.index')->with('success', 'Product created successfully.');
    }

    public function show(Product $product)
    {
        return view('forADMIN.products.show', compact('product'));
    }

    public function edit(Product $product)
    {
        return view('forADMIN.products.edit', compact('product'));
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'description' => 'nullable|string',
            'stock' => 'nullable|integer',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $product->name = $request->name;
        $product->price = $request->price;
        $product->description = $request->description;
        $product->stock = $request->stock;

        if ($request->hasFile('image')) {
            // Hapus gambar lama jika ada
            if ($product->image && file_exists(public_path($product->image))) {
                unlink(public_path($product->image));
            }
            $imageName = Str::random(10) . '.' . $request->image->extension();
            $request->image->move(public_path('images/products'), $imageName);
            $product->image = 'images/products/' . $imageName;
        }

        $product->save();

        return redirect()->route('forADMIN.products.index')->with('success', 'Product updated successfully.');
    }

    public function destroy(Product $product)
    {
        // Hapus gambar jika ada
        if ($product->image && file_exists(public_path($product->image))) {
            unlink(public_path($product->image));
        }
        $product->delete();
        return redirect()->route('forADMIN.products.index')->with('success', 'Product deleted successfully.');
    }
}