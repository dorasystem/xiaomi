<?php

namespace App\Services;

use App\DTOs\ProductData;
use App\Models\Product;
use App\Models\Variant;
use Illuminate\Support\Str;

class ProductService
{
    public function create(ProductData $data): Product
    {
        // Single images
        $imagePath = $this->uploadImage($data->image);
        $giftImagePath = $this->uploadImage($data->gift_image);

        // Multiple images
        $additionalImages = [];
        foreach ($data->images as $img) {
            $additionalImages[] = $this->uploadImage($img);
        }

        // Create product
        $product = Product::create([
            'category_id' => $data->category_id,
            'name_uz' => $data->name_uz,
            'name_ru' => $data->name_ru,
            'name_en' => $data->name_en,
            'description_uz' => $data->description_uz,
            'description_ru' => $data->description_ru,
            'description_en' => $data->description_en,
            'content_uz' => $data->content_uz,
            'content_ru' => $data->content_ru,
            'content_en' => $data->content_en,
            'color_uz' => $data->color_uz,
            'color_ru' => $data->color_ru,
            'color_en' => $data->color_en,
            'image' => $imagePath,
            'images' => $additionalImages,
            'gift_name_uz' => $data->gift_name_uz,
            'gift_name_ru' => $data->gift_name_ru,
            'gift_name_en' => $data->gift_name_en,
            'gift_image' => $giftImagePath,
            'popular' => $data->popular,
            'discount_status' => $data->discount_status,
            'recommend_status' => $data->recommend_status,
        ]);

        // Slug
        $product->slug = Str::slug($product->name_en) . '-' . $product->id;
        $product->save();

        // Variants
        $this->createVariants($product->id, $data);

        return $product;
    }

    protected function createVariants(int $productId, ProductData $data)
    {
        foreach ($data->storage as $index => $storage) {
            Variant::create([
                'product_id' => $productId,
                'storage' => $storage,
                'price' => $data->price[$index] ?? null,
                'discount_price' => $data->discount_price[$index] ?? null,
                'price_6' => $data->price_6[$index] ?? null,
                'price_12' => $data->price_12[$index] ?? null,
                'price_24' => $data->price_24[$index] ?? null,
                'sku' => $data->sku[$index] ?? null,
            ]);
        }
    }

    protected function uploadImage(?\Illuminate\Http\UploadedFile $file): ?string
    {
        return $file ? $file->store('products', 'public') : null;
    }
}
