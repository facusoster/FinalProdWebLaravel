<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    /* ---------------------------------------------------------
     * LISTADO DE MIS RESEÑAS
     * --------------------------------------------------------- */
    public function index()
    {
        $reviews = Auth::user()->reviews()->with('product')->latest()->get();
        return view('clients.reviews.index', compact('reviews'));
    }

    /* ---------------------------------------------------------
     * FORMULARIO DE RESEÑA (solo si compró y está finalizado)
     * --------------------------------------------------------- */
    public function create(Product $product)
    {
        $hasCompletedOrder = Order::where('user_id', Auth::id())
            ->where('status', 'completed')
            ->whereHas('items', fn($q) => $q->where('product_id', $product->id))
            ->exists();

        abort_unless($hasCompletedOrder, 403, 'Solo podés reseñar productos de compras finalizadas.');

        $alreadyReviewed = Review::where('user_id', Auth::id())
            ->where('product_id', $product->id)
            ->exists();

        if ($alreadyReviewed) {
            return redirect()->route('orders.index')
                ->with('status', 'Ya dejaste una reseña para este producto.');
        }

        return view('clients.reviews.create', compact('product'));
    }

    /* ---------------------------------------------------------
     * GUARDAR RESEÑA
     * --------------------------------------------------------- */
    public function store(Request $request, Product $product)
    {
        $hasCompletedOrder = Order::where('user_id', Auth::id())
            ->where('status', 'completed')
            ->whereHas('items', fn($q) => $q->where('product_id', $product->id))
            ->exists();

        abort_unless($hasCompletedOrder, 403);

        if (Review::where('user_id', Auth::id())->where('product_id', $product->id)->exists()) {
            return back()->withErrors('Ya existe una reseña tuya para este producto.');
        }

        $request->validate([
            'rating'  => 'required|integer|min:1|max:5',
            'comment' => 'required|string|min:5|max:1000',
        ]);

        Review::create([
            'user_id'    => Auth::id(),
            'product_id' => $product->id,
            'rating'     => $request->rating,
            'comment'    => $request->comment,
        ]);

        return redirect()->route('orders.index')
            ->with('status', 'Reseña publicada correctamente.');
    }

    /* ---------------------------------------------------------
     * ELIMINAR MI RESEÑA
     * --------------------------------------------------------- */
    public function destroy(Review $review)
    {
        abort_unless($review->user_id === Auth::id(), 403);
        $review->delete();

        return back()->with('status', 'Reseña eliminada.');
    }
}
