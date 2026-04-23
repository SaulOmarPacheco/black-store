<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Product;

class CatalogController extends Controller
{
    public function index()
    {
        $products = Product::with('category', 'variants')
            ->where('active', true)
            ->latest()
            ->get();

        return view('cliente.catalogo', compact('products'));
    }
}