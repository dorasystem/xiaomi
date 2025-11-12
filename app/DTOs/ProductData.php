<?php

namespace App\DTOs;

use Illuminate\Http\UploadedFile;

class ProductData
{
    public ?int $category_id = null;
    public string $name_uz = '';
    public string $name_ru = '';
    public string $name_en = '';
    public ?string $description_uz = null;
    public ?string $description_ru = null;
    public ?string $description_en = null;
    public ?string $content_uz = null;
    public ?string $content_ru = null;
    public ?string $content_en = null;
    public ?string $color_uz = null;
    public ?string $color_ru = null;
    public ?string $color_en = null;
    public ?UploadedFile $image = null;
    public array $images = [];
    public ?string $gift_name_uz = null;
    public ?string $gift_name_ru = null;
    public ?string $gift_name_en = null;
    public ?UploadedFile $gift_image = null;
    public array $storage = [];
    public array $price = [];
    public array $discount_price = [];
    public array $price_6 = [];
    public array $price_12 = [];
    public array $price_24 = [];
    public array $sku = [];
    public bool $popular = false;
    public bool $discount_status = false;
    public bool $recommend_status = false;

    public function __construct(array $data)
    {
        foreach ($data as $key => $value) {
            if (property_exists($this, $key)) {
                $this->$key = $value;
            }
        }
    }

    public static function fromRequest($request): self
    {
        $data = new self($request->all());

        $data->image = $request->file('image');
        $data->gift_image = $request->file('gift_image');
        $data->images = $request->file('images', []);

        $data->popular = $request->has('popular');
        $data->discount_status = $request->has('discount_status');
        $data->recommend_status = $request->has('recommend_status');

        return $data;
    }
}
