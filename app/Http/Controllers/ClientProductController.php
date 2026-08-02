<?php

namespace App\Http\Controllers;

use App\Models\Product;

class ClientProductController extends Controller
{
    public function index()
    {
        $products = Product::all();

        return view('clients.products.index', compact('products'));
    }
}
