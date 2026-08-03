<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function __construct()
    {
        abort_unless(auth()->check() && auth()->user()->isAdmin(), 403);
    }

    /* ---------------------------------------------------------
     * LISTADO DE TODAS LAS RESEÑAS
     * --------------------------------------------------------- */
    public function index()
    {
        $reviews = Review::with(['user', 'product'])->latest()->paginate(15);
        return view('admin.reviews.index', compact('reviews'));
    }

    /* ---------------------------------------------------------
     * ELIMINAR RESEÑA (moderación)
     * --------------------------------------------------------- */
    public function destroy(Review $review)
    {
        $review->delete();
        return back()->with('status', 'Reseña eliminada correctamente.');
    }
}
