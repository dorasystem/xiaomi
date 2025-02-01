<?php

namespace Database\Seeders;

use App\Models\Faq;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FaqSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Faq::create([
            'question_uz' => "Buyurtmani qanday joylashtirish mumkin?",
            'question_ru' => "Как оформить заказ?",
            'question_en' => "How to place an order?",
            'answer_uz' => "Buyurtma berish uchun mahsulotni tanlang va savatga qo‘shing.",
            'answer_ru' => "Для оформления заказа выберите товар и добавьте в корзину.",
            'answer_en' => "To place an order, select the product and add it to the cart."
        ]);

        Faq::create([
            'question_uz' => "Mahsulotlarni qaysi to‘lov usullari orqali sotib olish mumkin?",
            'question_ru' => "Какие способы оплаты доступны?",
            'question_en' => "What payment methods are available?",
            'answer_uz' => "Siz Payme, Click, Uzcard yoki Humo orqali to‘lov qilishingiz mumkin.",
            'answer_ru' => "Вы можете оплатить через Payme, Click, Uzcard или Humo.",
            'answer_en' => "You can pay via Payme, Click, Uzcard, or Humo."
        ]);
    }
}
