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
    /**
     * @OA\Put(
     *     path="/api/products/{code}/update",
     *     operationId="updateProductByCode",
     *     tags={"Products"},
     *     summary="Update product variant by code",
     *     description="Updates the price and other variant fields of a product by its code",
     *     @OA\Parameter(
     *         name="code",
     *         in="path",
     *         description="Product code",
     *         required=true,
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             @OA\Property(property="price", type="number", format="float", example=120.5),
     *             @OA\Property(property="discount_price", type="number", format="float", example=110.0),
     *             @OA\Property(property="price_3", type="number", format="float", example=115.0),
     *             @OA\Property(property="price_6", type="number", format="float", example=110.0),
     *             @OA\Property(property="price_12", type="number", format="float", example=105.0),
     *             @OA\Property(property="price_24", type="number", format="float", example=100.0)
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Variant updated successfully",
     *         @OA\JsonContent(
     *             @OA\Property(property="status", type="string", example="success"),
     *             @OA\Property(property="message", type="string", example="Variant updated successfully"),
     *             @OA\Property(property="data", type="object",
     *                 @OA\Property(property="id", type="integer", example=1),
     *                 @OA\Property(property="price", type="number", format="float", example=120.5),
     *                 @OA\Property(property="discount_price", type="number", example=110.0),
     *                 @OA\Property(property="price_3", type="number", example=115.0),
     *                 @OA\Property(property="price_6", type="number", example=110.0),
     *                 @OA\Property(property="price_12", type="number", example=105.0),
     *                 @OA\Property(property="price_24", type="number", example=100.0)
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response=400,
     *         description="Price value missing",
     *         @OA\JsonContent(
     *             @OA\Property(property="status", type="string", example="error"),
     *             @OA\Property(property="message", type="string", example="Price value missing")
     *         )
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Product or variant not found",
     *         @OA\JsonContent(
     *             @OA\Property(property="status", type="string", example="error"),
     *             @OA\Property(property="message", type="string", example="Product not found")
     *         )
     *     ),
     *     @OA\Response(
     *         response=422,
     *         description="Validation error",
     *         @OA\JsonContent(
     *             @OA\Property(property="status", type="string", example="error"),
     *             @OA\Property(property="message", type="string", example="Validation failed"),
     *             @OA\Property(property="errors", type="object",
     *                 @OA\Property(property="price", type="array",
     *                     @OA\Items(type="string", example="The price field is required.")
     *                 )
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response=500,
     *         description="Server error / Exception",
     *         @OA\JsonContent(
     *             @OA\Property(property="status", type="string", example="error"),
     *             @OA\Property(property="message", type="string", example="Server error"),
     *             @OA\Property(property="error", type="string", example="Database connection lost")
     *         )
     *     )
     * )
     */


    public function updateByCode(Request $request, $code)
    {
        DB::beginTransaction();

        try {
            $product = Product::where('code', $code)->first();

            if (! $product) {
                $msg = "<b>Xatolik:</b> Mahsulot topilmadi!\n"
                    . "<b>Kod:</b> {$code}\n"
                    .  now()->format('Y-m-d H:i:s');
                $this->sendTelegramNotification($msg);
                Log::warning("Product not found: {$code}");
                return response()->json(['message' => 'Product not found'], 404);
            }

            $variant = $product->variants()->first();

            if (! $variant) {
                $msg = " <b>Xatolik:</b> Variant topilmadi!\n"
                    . " <b>Mahsulot:</b> {$product->name}\n"
                    . " <b>Kod:</b> {$code}\n"
                    . now()->format('Y-m-d H:i:s');
                $this->sendTelegramNotification($msg);
                Log::warning("Variant not found for product: {$code}");
                return response()->json(['message' => 'Variant not found'], 404);
            }

            $newPrice = $request->input('price');
            if ($newPrice === null) {
                $msg = " <b>Ogohlantirish:</b> So‘rovda yangi narx yuborilmagan!\n"
                    . " <b>Mahsulot:</b> {$product->name}\n"
                    . " <b>Kod:</b> {$code}\n"
                    . now()->format('Y-m-d H:i:s');
                $this->sendTelegramNotification($msg);
                Log::warning("Price value missing for product: {$code}");
                return response()->json(['message' => 'Price value missing'], 400);
            }

            $oldPrice = $variant->price;

            $variant->update($request->only([
                'price',
                'discount_price',
                'price_3',
                'price_6',
                'price_12',
                'price_24',
            ]));

            DB::commit();

            Log::info("Variant updated successfully", [
                'product_code' => $code,
                'old_price'    => $oldPrice,
                'new_price'    => $variant->price,
            ]);

            return response()->json([
                'message' => 'Variant updated successfully',
                'data' => $variant,
            ]);
        } catch (\Throwable $e) {
            DB::rollBack();

            $msg = "<b>Exception yuz berdi!</b>\n"
                . " <b>Xatolik:</b> {$e->getMessage()}\n"
                . now()->format('Y-m-d H:i:s');

            $this->sendTelegramNotification($msg);
            Log::error('Unexpected error while updating variant', [
                'error' => $e->getMessage(),
            ]);

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
