<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductVariant;
use Illuminate\Http\Request;

class ProductVariantController extends Controller
{
    public function index(Request $request)
{
    $search = $request->search;
    $productId = $request->product_id;

    $products = Product::orderBy('name')->get();

    $variants = ProductVariant::with('product')
        ->when($search, function ($query, $search) {
            $query->where('sku', 'like', '%' . $search . '%')
                  ->orWhere('size', 'like', '%' . $search . '%')
                  ->orWhere('color', 'like', '%' . $search . '%');
        })
        ->when($productId, function ($query, $productId) {
            $query->where('product_id', $productId);
        })
        ->latest()
        ->get();

    return view('admin.variants.index', compact('variants', 'products', 'search', 'productId'));
}

    public function create()
    {
        $products = Product::where('active', true)->orderBy('name')->get();
        return view('admin.variants.create', compact('products'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'product_id' => 'required|exists:products,id',
            'sku' => 'required|string|max:255|unique:product_variants,sku',
            'size' => 'required|string|max:50',
            'color' => 'required|string|max:50',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'min_stock' => 'required|integer|min:0',
            'max_stock' => 'required|integer|gte:min_stock',
            'active' => 'nullable|boolean',
        ]);

        $validated['active'] = $request->has('active');

        ProductVariant::create($validated);

        return redirect()->route('variants.index')
            ->with('success', 'Variante creada correctamente.');
    }

    public function show(ProductVariant $variant)
    {
        $variant->load('product');
        return view('admin.variants.show', compact('variant'));
    }

    public function edit(ProductVariant $variant)
    {
        $products = Product::where('active', true)->orderBy('name')->get();
        return view('admin.variants.edit', compact('variant', 'products'));
    }

    public function update(Request $request, ProductVariant $variant)
    {
        $validated = $request->validate([
            'product_id' => 'required|exists:products,id',
            'sku' => 'required|string|max:255|unique:product_variants,sku,' . $variant->id,
            'size' => 'required|string|max:50',
            'color' => 'required|string|max:50',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'min_stock' => 'required|integer|min:0',
            'max_stock' => 'required|integer|gte:min_stock',
            'active' => 'nullable|boolean',
        ]);

        $validated['active'] = $request->has('active');

        $variant->update($validated);

        return redirect()->route('variants.index')
            ->with('success', 'Variante actualizada correctamente.');
    }

    public function destroy(ProductVariant $variant)
    {
        $variant->delete();

        return redirect()->route('variants.index')
            ->with('success', 'Variante eliminada correctamente.');
    }
}