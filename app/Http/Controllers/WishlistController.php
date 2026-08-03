<?php

namespace App\Http\Controllers;

use App\Models\Wishlist;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    public function index()
    {
        $items = Wishlist::where('user_id', Auth::id())
            ->with('product')
            ->get();

        return view('clients.wishlist.index', compact('items'));
    }

    public function add(Request $request, Product $product)
    {
        // 1. ¿Hay stock disponible?
        if ($product->stock <= 0) {
            $message = '"' . $product->name . '" no tiene stock disponible.';
            if ($request->expectsJson()) {
                return response()->json(['success' => false, 'message' => $message]);
            }
            return back()->withErrors(['stock' => $message]);
        }

        $item = Wishlist::where('user_id', Auth::id())
            ->where('product_id', $product->id)
            ->first();

        $currentQty = $item ? $item->quantity : 0;

        // 2. ¿Alcanza si sumamos una unidad más?
        if ($currentQty + 1 > $product->stock) {
            $message = 'No puedes agregar más unidades de "' . $product->name . '". Stock disponible: ' . $product->stock;
            if ($request->expectsJson()) {
                return response()->json(['success' => false, 'message' => $message]);
            }
            return back()->withErrors(['stock' => $message]);
        }

        if ($item) {
            $item->quantity++;
            $item->save();
        } else {
            Wishlist::create([
                'user_id'    => Auth::id(),
                'product_id' => $product->id,
                'quantity'   => 1,
            ]);
        }

        if ($request->expectsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Producto agregado al carrito',
            ]);
        }

        return redirect()->back();
    }

    public function remove(Product $product)
    {
        Wishlist::where('user_id', Auth::id())
            ->where('product_id', $product->id)
            ->delete();

        return redirect()->back();
    }
}
