<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ClientProductController extends Controller
{
    public function index(Request $request)
    {
        $categories = Category::all();
        $selectedCategoryId = $request->query('category');

        $products = Product::with('category')
            ->when($selectedCategoryId, fn($query) => $query->where('category_id', $selectedCategoryId))
            ->get();

        return view('clients.products.index', compact('products', 'categories', 'selectedCategoryId'));
    }
}
