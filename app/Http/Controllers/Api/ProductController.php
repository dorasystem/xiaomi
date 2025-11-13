<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

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
    /**
     * @OA\Patch(
     *     path="/api/products/update-by-code/{code}",
     *     summary="Update product variant by code",
     *     description="Updates price fields of the first variant of a product identified by its code",
     *     operationId="updateProductVariantByCode",
     *     tags={"Products"},
     *     
     *     @OA\Parameter(
     *         name="code",
     *         in="path",
     *         description="Product code to identify the product",
     *         required=true,
     *         @OA\Schema(type="string")
     *     ),
     *     
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="price", type="number", format="float", example=2199000),
     *             @OA\Property(property="discount_price", type="number", format="float", example=1999000),
     *             @OA\Property(property="price_3", type="number", format="float", example=750000),
     *             @OA\Property(property="price_6", type="number", format="float", example=380000),
     *             @OA\Property(property="price_12", type="number", format="float", example=200000),
     *             @OA\Property(property="price_24", type="number", format="float", example=110000)
     *         )
     *     ),
     *     
     *     @OA\Response(
     *         response=200,
     *         description="Variant updated successfully",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="message", type="string", example="Variant updated successfully"),
     *             @OA\Property(property="data", type="object",
     *                 @OA\Property(property="id", type="integer", example=1),
     *                 @OA\Property(property="product_id", type="integer", example=5),
     *                 @OA\Property(property="price", type="number", example=2199000),
     *                 @OA\Property(property="discount_price", type="number", example=1999000),
     *                 @OA\Property(property="price_3", type="number", example=750000),
     *                 @OA\Property(property="price_6", type="number", example=380000),
     *                 @OA\Property(property="price_12", type="number", example=200000),
     *                 @OA\Property(property="price_24", type="number", example=110000),
     *                 @OA\Property(property="created_at", type="string", format="date-time"),
     *                 @OA\Property(property="updated_at", type="string", format="date-time")
     *             )
     *         )
     *     ),
     *     
     *     @OA\Response(
     *         response=404,
     *         description="Product or Variant not found",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="message", type="string", example="Product not found")
     *         )
     *     )
     * )
     */
    public function  updateByCode(Request $request, $code)
    {
        $product = Product::where('code', $code)->first();

        if (!$product) {
            return response()->json([
                'message' => 'Product not found'
            ], 404);
        }

        $variant = $product->variants()->first();

        if (!$variant) {
            return response()->json([
                'message' => 'Variant not found'
            ], 404);
        }


        $variant->update($request->only([
            'price',
            'discount_price',
            'price_3',
            'price_6',
            'price_12',
            'price_24',
        ]));


        return response()->json([
            'message' => 'Varinat updated successfully',
            'data' => $variant,
        ]);
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
