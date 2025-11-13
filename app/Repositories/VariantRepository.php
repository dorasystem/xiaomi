<?php

namespace App\Repositories;

use App\DTOs\ProductData;
use App\Models\Variant;
use Illuminate\Support\Facades\Log;

class VariantRepository
{
    protected function createVariants(int $productId, ProductData $data)
    {
        try {
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
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            return ['message' => 'Error'];
        }
    }
}
