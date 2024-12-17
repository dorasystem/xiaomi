<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TestimonialController extends Controller
{
    public function index($productId)
    {
        $userId = Auth::id();
        $testimonials = Testimonial::where('product_id', $productId)
            ->where('user_id', $userId)
            ->get();

        $response = $testimonials->map(function ($testimonial) {
            return [
                'id' => $testimonial->id,
                'user_id' => $testimonial->user_id,
                'product_id' => $testimonial->product_id,
                'comment' => $testimonial->comment,
                'rating' => $testimonial->rating,
                'created_at' => $testimonial->created_at->toDateTimeString(),
                'updated_at' => $testimonial->updated_at->toDateTimeString(),
            ];
        });

        return $this->response($response);
    }

    public function store(Request $request, $productId)
    {
        $request->validate([
            'comment' => 'required|string',
            'rating' => 'required|integer|min:1|max:5',
        ]);

        if (!Product::where('id', $productId)->exists()) {
            return $this->response(null, 'Product not found.', 404);
        }

        $testimonial = Testimonial::create([
            'comment' => $request->comment,
            'rating' => $request->rating,
            'product_id' => $productId,
            'user_id' => Auth::id(),
        ]);

        return $this->response([
            'id' => $testimonial->id,
            'user_id' => $testimonial->user_id,
            'product_id' => $testimonial->product_id,
            'comment' => $testimonial->comment,
            'rating' => $testimonial->rating,
            'created_at' => $testimonial->created_at->toDateTimeString(),
            'updated_at' => $testimonial->updated_at->toDateTimeString(),
        ], 'Testimonial added successfully and is awaiting approval.');
    }

    public function show($id)
    {
        $testimonial = Testimonial::findOrFail($id);

        $response = [
            'id' => $testimonial->id,
            'user_id' => $testimonial->user_id,
            'product_id' => $testimonial->product_id,
            'comment' => $testimonial->comment,
            'rating' => $testimonial->rating,
            'created_at' => $testimonial->created_at->toDateTimeString(),
            'updated_at' => $testimonial->updated_at->toDateTimeString(),
        ];

        return $this->response($response);
    }

    public function response($data, $message = 'Success', $status = 200)
    {
        return response()->json([
            'status' => $status,
            'message' => $message,
            'data' => $data,
        ], $status);
    }
}
