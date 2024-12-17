<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\About;

class AboutSeeder extends Seeder
{
    public function run()
    {
        About::create([
            'title_uz' => 'Biz haqimizda',
            'title_ru' => 'О нас',
            'title_en' => 'About Us',
            'description_uz' => 'Bu kompaniya haqida qisqacha ma\'lumot.',
            'description_ru' => 'Краткая информация о компании.',
            'description_en' => 'Brief information about the company.',
            'image' => 'about_image.jpg',
        ]);
    }
}

