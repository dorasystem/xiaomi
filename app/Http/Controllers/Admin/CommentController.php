<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Product;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request)
    {

        $validated = $request->validate([
            'product_id' => 'required|exists:products,id',
            'name' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'message' => 'required|string|max:1000',
            'rating' => 'required|integer|min:1|max:5',
        ]);


        Comment::create($validated);


        return redirect()->back()->with('success', 'Sharh muvaffaqiyatli qo‘shildi!');
    }

    public function getByProduct($productId)
    {
        $comments = Comment::where('product_id', $productId)->latest()->get();

        return response()->json($comments);
    }

    public function destroy($id)
    {
        $comment = Comment::findOrFail($id);
        $comment->delete();

        return response()->json([
            'message' => 'Sharh muvaffaqiyatli o‘chirildi!',
        ]);
    }
}
