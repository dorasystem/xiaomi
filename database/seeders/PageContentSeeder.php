<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PageContent;

class PageContentSeeder extends Seeder
{
    public function run()
    {
        $pages = [
            ['title_uz' => 'Sahifa 1', 'title_ru' => 'Страница 1', 'title_en' => 'Page 1', 'content_uz' => 'Kontent 1', 'content_ru' => 'Контент 1', 'content_en' => 'Content 1', 'image_uz' => 'image1_uz.jpg', 'image_ru' => 'image1_ru.jpg', 'image_en' => 'image1_en.jpg'],
            ['title_uz' => 'Sahifa 2', 'title_ru' => 'Страница 2', 'title_en' => 'Page 2', 'content_uz' => 'Kontent 2', 'content_ru' => 'Контент 2', 'content_en' => 'Content 2', 'image_uz' => 'image2_uz.jpg', 'image_ru' => 'image2_ru.jpg', 'image_en' => 'image2_en.jpg'],
            ['title_uz' => 'Sahifa 3', 'title_ru' => 'Страница 3', 'title_en' => 'Page 3', 'content_uz' => 'Kontent 3', 'content_ru' => 'Контент 3', 'content_en' => 'Content 3', 'image_uz' => 'image3_uz.jpg', 'image_ru' => 'image3_ru.jpg', 'image_en' => 'image3_en.jpg'],
            ['title_uz' => 'Sahifa 4', 'title_ru' => 'Страница 4', 'title_en' => 'Page 4', 'content_uz' => 'Kontent 4', 'content_ru' => 'Контент 4', 'content_en' => 'Content 4', 'image_uz' => 'image4_uz.jpg', 'image_ru' => 'image4_ru.jpg', 'image_en' => 'image4_en.jpg'],
        ];
        foreach ($pages as $page) {
            PageContent::create($page);
        }
    }
}
