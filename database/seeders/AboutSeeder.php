<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\About;

class AboutSeeder extends Seeder
{
    public function run()
    {
        About::create([

            'about_or_company_uz' => "Bizning logotipimizdagi MI Mobil Internet degan ma'noni anglatadi, lekin biz uchun bu ingliz tilida Ishga imkonsiz kabi ko'rinadi - Mission Impossible Xiaomi tez-tez qiyinchiliklarga duch keldi, ularning aksariyati birinchi yillarimizda imkonsiz bo'lib tuyuldi.",
            'about_or_company_ru' => "”MI в нашем логотипе означает «Мобильный Интернет», но также для нас это звучит как «Миссия Невыполнима » На английском – Mission Impossible Xiaomi часто сталкивался с вызовами, многие из которых по началу казались невыполнимыми в наши ранние годы.”",
            'about_or_company_en' => "MI in our logo stands for Mobile Internet, but it also sounds like Mission Impossible to us. Xiaomi has often faced challenges, many of which seemed impossible at first in our early years.",
            'description_uz' => "Biz mijozlarimizni qadrlaymiz,
Axir ular shunchaki xaridor emas
Ular bizning yaqin do'stlarimiz, biz esa smartfon, noutbuk va planshet sotuvchilardan ham ko'proqmiz. Ular uchun biz rang-barang va har doim tiniq xotiralar, maksimal darajada qiziqarli o'yinlar, har qadamda mavjud sevimli musiqa, uyda qulaylik va yangilik.

Siz his-tuyg'ularingizni barcha ijtimoiy tarmoqlarda baham ko'rishingiz mumkin. #xiaomifamily xeshtegi yordamida tarmoqlar yoki bizni belgilang. Har bir nashr haqiqatan ham qalbimizni isitadi.",
            'description_ru' => "Мы ценим наших клиентов,
ведь они не просто покупатели
Они наши близкие друзья, а мы больше, чем продавцы смартфонов, ноутбуков и планшетов. Для них мы – красочные и всегда четкие воспоминания, захватывающие игры на максимальной производительности, любимая музыка доступная на каждом шагу, уют и свежесть в доме.

Вы можете делиться вашими эмоциями во всех соц. сетях используя хэштег #xiaomifamily или отмечайте нас. Каждая публикация по настоящему греет наше сердце.",
            'description_en' => "We value our customers, because they are not just buyers
They are our close friends, and we are more than sellers of smartphones, laptops and tablets. For them, we are colorful and always clear memories, exciting games at maximum performance, favorite music available at every step, comfort and freshness in the house.

You can share your emotions in all social networks using the hashtag #xiaomifamily or tag us. Each publication truly warms our hearts.",
            'content_uz' => "Biz mijozlarimizni qadrlaymiz,
Axir ular shunchaki xaridor emas
Ular bizning yaqin do'stlarimiz, biz esa smartfon, noutbuk va planshet sotuvchilardan ham ko'proqmiz. Ular uchun biz rang-barang va har doim tiniq xotiralar, maksimal darajada qiziqarli o'yinlar, har qadamda mavjud sevimli musiqa, uyda qulaylik va yangilik.

Siz his-tuyg'ularingizni barcha ijtimoiy tarmoqlarda baham ko'rishingiz mumkin. #xiaomifamily xeshtegi yordamida tarmoqlar yoki bizni belgilang. Har bir nashr haqiqatan ham qalbimizni isitadi.",
            'content_ru' => "Мы ценим наших клиентов,
ведь они не просто покупатели
Они наши близкие друзья, а мы больше, чем продавцы смартфонов, ноутбуков и планшетов. Для них мы – красочные и всегда четкие воспоминания, захватывающие игры на максимальной производительности, любимая музыка доступная на каждом шагу, уют и свежесть в доме.

Вы можете делиться вашими эмоциями во всех соц. сетях используя хэштег #xiaomifamily или отмечайте нас. Каждая публикация по настоящему греет наше сердце.",
            'content_en' => "We value our customers, because they are not just buyers
They are our close friends, and we are more than sellers of smartphones, laptops and tablets. For them, we are colorful and always clear memories, exciting games at maximum performance, favorite music available at every step, comfort and freshness in the house.

You can share your emotions in all social networks using the hashtag #xiaomifamily or tag us. Each publication truly warms our hearts.",
            'image' => 'about_image.jpg',
        ]);
    }
}

