<?php

namespace App\Repositories;

use App\DTOs\ProductData;
use App\Models\Product;
use App\Models\Variant;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class ProductRepository
{
    public function createProduct($data): ?Product
    {
        try {

            return  DB::transaction(function () use ($data, $imagePath, $giftImagePath, $additionalImages) {

                $product = Product::create([
                    'code' => $data->code,
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

                return $product;
            });
        } catch (\Exception $exception) {
            Log::error('exception', ['message' => $exception->getMessage()]);
            return null;
        }
    }
}
