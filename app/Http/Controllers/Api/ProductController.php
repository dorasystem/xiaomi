<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Traits\SendsTelegramNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

/**
 * @OA\Info(
 *      version="1.0.0",
 *      title="Product API",
 *      description="API for managing products",
 *      @OA\Contact(email="support@example.com")
 * )
 *
 * @OA\Server(
 *      url=L5_SWAGGER_CONST_HOST,
 *      description="API Server"
 * )
 */

class ProductController extends Controller
{
    use SendsTelegramNotification;
  
    public function updateMultiple(Request $request)
    {
        $productsData = $request->all();

        if (!is_array($productsData)) {
            return response()->json(['message' => 'Invalid data format, expected array'], 400);
        }

        DB::beginTransaction();

        try {
            $codes = collect($productsData)->pluck('code')->filter()->unique();
            $products = Product::with('variants')->whereIn('code', $codes)->get()->keyBy('code');

            $updatedVariants = [];

            foreach ($productsData as $item) {
                $code = $item['code'] ?? null;
                $newPrice = $item['price'] ?? null;

                if (!$code) {
                    Log::warning("Missing code in request item", ['item' => $item]);
                    continue;
                }

                $product = $products->get($code);

                if (!$product) {
                    $msg = "<b>Xatolik:</b> Mahsulot topilmadi!\n<b>Kod:</b> {$code}\n" . now()->format('Y-m-d H:i:s');
                    $this->sendTelegramNotification($msg);
                    Log::warning("Product not found: {$code}");
                    continue;
                }

                $variant = $product->variants->first();
                if (!$variant) {
                    $msg = "<b>Xatolik:</b> Variant topilmadi!\n<b>Mahsulot:</b> {$product->name}\n<b>Kod:</b> {$code}\n" . now()->format('Y-m-d H:i:s');
                    $this->sendTelegramNotification($msg);
                    Log::warning("Variant not found for product: {$code}");
                    continue;
                }

                if ($newPrice === null) {
                    $msg = "<b>Ogohlantirish:</b> So‘rovda yangi narx yuborilmagan!\n<b>Mahsulot:</b> {$product->name}\n<b>Kod:</b> {$code}\n" . now()->format('Y-m-d H:i:s');
                    $this->sendTelegramNotification($msg);
                    Log::warning("Price value missing for product: {$code}");
                    continue;
                }

                $oldPrice = $variant->price;

                // Eloquent mass update
                $variant->update(array_merge($variant->only([
                    'discount_price',
                    'price_3',
                    'price_6',
                    'price_12',
                    'price_24'
                ]), [
                    'price' => $newPrice,
                    'discount_price' => $item['discount_price'] ?? $variant->discount_price,
                    'price_3' => $item['price_3'] ?? $variant->price_3,
                    'price_6' => $item['price_6'] ?? $variant->price_6,
                    'price_12' => $item['price_12'] ?? $variant->price_12,
                    'price_24' => $item['price_24'] ?? $variant->price_24,
                ]));

                Log::info("Variant updated successfully", [
                    'product_code' => $code,
                    'old_price' => $oldPrice,
                    'new_price' => $variant->price,
                ]);

                $updatedVariants[] = $variant;
            }

            DB::commit();

            return response()->json([
                'message' => 'Variants updated successfully',
                'data' => $updatedVariants,
            ]);
        } catch (\Throwable $e) {
            DB::rollBack();

            $msg = "<b>Exception yuz berdi!</b>\n<b>Xatolik:</b> {$e->getMessage()}\n" . now()->format('Y-m-d H:i:s');
            $this->sendTelegramNotification($msg);
            Log::error('Unexpected error while updating variants', ['error' => $e->getMessage()]);

            return response()->json([
                'message' => 'Server error',
                'error' => $e->getMessage(),
            ], 500);
        }
    }






    /**
     * @OA\Get(
     *      path="/api/products",
     *      operationId="getProductsList",
     *      tags={"Products"},
     *      summary="Get list of products",
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent(
     *              type="object",
     *              @OA\Property(property="current_page", type="integer"),
     *              @OA\Property(property="data", type="array", @OA\Items(ref="#/components/schemas/Product")),
     *              @OA\Property(property="total", type="integer")
     *          )
     *      )
     * )
     */
    public function index()
    {
        $products = Product::paginate(5);


        return response()->json($products);
    }

    /**
     * @OA\Post(
     *      path="/api/products",
     *      operationId="storeProduct",
     *      tags={"Products"},
     *      summary="Create a new product",
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(ref="#/components/schemas/Product")
     *      ),
     *      @OA\Response(response=201, description="Product created successfully", @OA\JsonContent(ref="#/components/schemas/Product")),
     *      @OA\Response(response=422, description="Validation error")
     * )
     */
    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'category_id' => 'required|integer',
                'code' => 'nullable|string|max:20',
                'slug' => 'required|string|max:255',
                'name_uz' => 'required|string|max:255',
                'name_ru' => 'nullable|string|max:255',
                'name_en' => 'nullable|string|max:255',
                'description_uz' => 'required|string',
                'description_ru' => 'nullable|string',
                'description_en' => 'nullable|string',
                'content_uz' => 'nullable|string',
                'content_ru' => 'nullable|string',
                'content_en' => 'nullable|string',
                'gift_name_uz' => 'nullable|string|max:255',
                'gift_name_ru' => 'nullable|string|max:255',
                'gift_name_en' => 'nullable|string|max:255',
                'gift_image' => 'nullable|string|max:255',
                'image' => 'nullable|string|max:255',
                'images' => 'nullable|string|max:255',
                'color_uz' => 'nullable|string|max:255',
                'color_ru' => 'nullable|string|max:255',
                'color_en' => 'nullable|string|max:255',
                'popular' => 'nullable|boolean',
                'discount_status' => 'nullable|boolean',
                'recommend_status' => 'nullable|boolean',
            ]);

            foreach ($validated as $key => $value) {
                if ($value === null) $validated[$key] = "";
            }

            $product = Product::create($validated);

            return response()->json([
                'message' => 'Product created successfully',
                'product' => $product,
            ], 201);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'message' => 'Validation failed',
                'errors' => $e->errors(),
            ], 422);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Something went wrong',
                'error' => $e->getMessage(),
            ], 500);
        }
    }


    /**
     * @OA\Get(
     *      path="/api/products/{id}",
     *      operationId="getProductById",
     *      tags={"Products"},
     *      summary="Get product by ID",
     *      @OA\Parameter(
     *          name="id",
     *          in="path",
     *          description="Product ID",
     *          required=true,
     *          @OA\Schema(type="integer")
     *      ),
     *      @OA\Response(response=200, description="Successful operation", @OA\JsonContent(ref="#/components/schemas/Product")),
     *      @OA\Response(response=404, description="Product not found")
     * )
     */
    public function show(string $id)
    {
        $product = Product::find($id);

        if (!$product) {
            return response()->json([
                'message' => 'Product not found'
            ], 404);
        }

        return response()->json($product);
    }
    /**
     * @OA\Put(
     *      path="/api/products/{id}",
     *      operationId="updateProduct",
     *      tags={"Products"},
     *      summary="Update an existing product",
     *      @OA\Parameter(
     *          name="id",
     *          in="path",
     *          required=true,
     *          @OA\Schema(type="integer")
     *      ),
     *      @OA\RequestBody(required=true, @OA\JsonContent(ref="#/components/schemas/Product")),
     *      @OA\Response(response=200, description="Product updated successfully", @OA\JsonContent(ref="#/components/schemas/Product")),
     *      @OA\Response(response=404, description="Product not found")
     * )
     */
    public function update(Request $request, string $id)
    {
        $product = Product::find($id);

        if (!$product) {
            return response()->json([
                'message' => 'Product not found'
            ], 404);
        }

        $validated = $request->validate([
            'category_id' => 'required|integer',
            'slug' => 'required|string|max:255',
            'name_uz' => 'required|string|max:255',
            'name_ru' => 'nullable|string|max:255',
            'name_en' => 'nullable|string|max:255',
            'description_uz' => 'required|string',
            'description_ru' => 'nullable|string',
            'description_en' => 'nullable|string',
            'content_uz' => 'nullable|string',
            'content_ru' => 'nullable|string',
            'content_en' => 'nullable|string',
            'gift_name_uz' => 'nullable|string|max:255',
            'gift_name_ru' => 'nullable|string|max:255',
            'gift_name_en' => 'nullable|string|max:255',
            'gift_image' => 'nullable|string|max:255',
            'image' => 'nullable|string|max:255',
            'images' => 'nullable|string|max:255',
            'color_uz' => 'nullable|string|max:255',
            'color_ru' => 'nullable|string|max:255',
            'color_en' => 'nullable|string|max:255',
            'popular' => 'nullable|boolean',
            'discount_status' => 'nullable|boolean',
            'recommend_status' => 'nullable|boolean',
        ]);

        $product->update($validated);

        return response()->json([
            'message' => 'Product updated successfully',
            'product' => $product,
        ]);
    }

    /**
     * @OA\Delete(
     *      path="/api/products/{id}",
     *      operationId="deleteProduct",
     *      tags={"Products"},
     *      summary="Delete a product",
     *      @OA\Parameter(name="id", in="path", required=true, @OA\Schema(type="integer")),
     *      @OA\Response(response=200, description="Product deleted successfully"),
     *      @OA\Response(response=404, description="Product not found")
     * )
     */
    public function destroy(string $id)
    {
        $product = Product::find($id);

        if (!$product) {
            return response()->json([
                'message' => 'Product not found'
            ], 404);
        }

        $product->delete();

        return response()->json([
            'message' => 'Product deleted successfully'
        ]);
    }
}
