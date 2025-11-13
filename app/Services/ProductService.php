<?php

namespace App\Services;

use App\DTOs\ProductData;
use App\Models\Product;
use App\Models\Variant;
use App\Repositories\ProductRepository;
use App\Repositories\VariantRepository;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProductService
{

    protected ProductRepository $productRepository;

    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function createProduct(ProductData $data)
    {
        return $this->productRepository->createProduct($data);
    }

    public function update(Product $product, ProductData $data): Product
    {
        if ($data->image) {
            if ($product->image) Storage::disk('public')->delete($product->image);
            $product->image = $data->image->store('products', 'public');
        }

        if ($data->gift_image) {
            if ($product->gift_image) Storage::disk('public')->delete($product->gift_image);
            $product->gift_image = $data->gift_image->store('gift_images', 'public');
        }

        $images = is_array($product->images) ? $product->images : (json_decode($product->images, true) ?? []);
        foreach ($data->images as $image) {
            $images[] = $image->store('products', 'public');
        }
        $product->images = array_values($images);

        $product->fill([
            'code' => ($data->code) ? $data->code : null,
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
            'gift_name_uz' => $data->gift_name_uz,
            'gift_name_ru' => $data->gift_name_ru,
            'gift_name_en' => $data->gift_name_en,
            'popular' => $data->popular,
            'discount_status' => $data->discount_status,
            'recommend_status' => $data->recommend_status,
        ]);

        $product->slug = Str::slug($data->name_en) . '-' . $product->id;
        $product->save();

        Variant::where('product_id', $product->id)->delete();

        foreach ($data->storage as $index => $storage) {
            Variant::create([
                'product_id' => $product->id,
                'storage' => $storage,
                'price' => $data->price[$index] ?? null,
                'discount_price' => $data->discount_price[$index] ?? null,
                'price_6' => $data->price_6[$index] ?? null,
                'price_12' => $data->price_12[$index] ?? null,
                'price_24' => $data->price_24[$index] ?? null,
                'sku' => $data->sku[$index] ?? null,
            ]);
        }

        return $product;
    }

    public function delete(Product $product): void
    {
        if ($product->image) {
            Storage::disk('public')->delete($product->image);
        }

        if ($product->gift_image) {
            Storage::disk('public')->delete($product->gift_image);
        }

        if (is_array($product->images)) {
            foreach ($product->images as $img) {
                Storage::disk('public')->delete($img);
            }
        }
        $product->variants()->delete();

        $product->delete();
    }

    public function duplicate(int $id): Product
    {
        $product = Product::findOrFail($id);

        $newProduct = $product->replicate();

        $newProduct->slug = $product->slug . '-' . Str::random(5);

        $newProduct->name_uz = $product->name_uz . ' (Copy)';
        $newProduct->name_ru = $product->name_ru . ' (Copy)';
        $newProduct->name_en = $product->name_en . ' (Copy)';

        $newProduct->save();

        foreach ($product->variants as $variant) {
            $newVariant = $variant->replicate();
            $newVariant->product_id = $newProduct->id;
            $newVariant->sku = $variant->sku . '-' . Str::random(3);
            $newVariant->save();
        }

        return $newProduct;
    }
}
