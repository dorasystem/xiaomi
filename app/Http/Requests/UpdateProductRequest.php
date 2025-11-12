<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'category_id' => 'required|exists:categories,id',
            'name_uz' => 'required|string',
            'name_ru' => 'required|string',
            'name_en' => 'required|string',
            'description_uz' => 'nullable|string',
            'description_ru' => 'nullable|string',
            'description_en' => 'nullable|string',
            'content_uz' => 'nullable|string',
            'content_ru' => 'nullable|string',
            'content_en' => 'nullable|string',
            'color_uz' => 'nullable|string',
            'color_ru' => 'nullable|string',
            'color_en' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpg,png,jpeg,gif,webp|max:2048',
            'images.*' => 'nullable|image|mimes:jpg,png,jpeg,gif,webp|max:2048',
            'edit_images.*' => 'nullable|image|mimes:jpg,png,jpeg,gif,webp|max:2048',
            'deleted_images' => 'nullable|array',
            'gift_name_uz' => 'nullable|string',
            'gift_name_ru' => 'nullable|string',
            'gift_name_en' => 'nullable|string',
            'gift_image' => 'nullable|image|mimes:jpg,png,jpeg,gif,webp|max:2048',
            'storage' => 'nullable|array',
            'price' => 'nullable|array',
            'discount_price' => 'nullable|array',
            'price_6' => 'nullable|array',
            'price_12' => 'nullable|array',
            'price_24' => 'nullable|array',
            'sku' => 'nullable|array',
            'deleted_variants' => 'nullable|array',
        ];
    }
}
