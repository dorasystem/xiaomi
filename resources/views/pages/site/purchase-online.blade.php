@extends('layouts.page')
@section('content')
    <div class="container py-5">
        <div class=" text-dark p-4 rounded d-flex flex-column align-items-center" style="background-color:#ff6700 ">
            <div class="d-flex gap-3 mb-3">
                <img src="/assets/icons/payme.svg" alt="Payme" width="60">
                <img src="/assets/icons/click.svg" alt="Click" width="60">
                <img src="/assets/icons/uzcard.svg" alt="UzCard" width="60">
                <img src="/assets/icons/humo.svg" alt="Humo" width="60">
            </div>
            <h3 class="fw-bold">Qulay to'lov</h3>
        </div>

        <div class="mt-4">
            <h4 class="fw-bold">Xiaomi internet-do‘konida qanday to‘lov qilish mumkin?</h4>
            <p>Biz sizga qulay va xavfsiz to‘lov usullarini taklif qilamiz: naqd pul, bank kartalari (Humo, Uzcard), Click yoki Payme to‘lov tizimlari orqali. Yuridik shaxslar uchun **bank o‘tkazmasi** orqali to‘lov qilish imkoniyati mavjud.</p>
        </div>

        <div class="mt-3">
            <h5 class="fw-bold">Sotib olish uchun nima qilish kerak?</h5>
            <ol>
                <li>Mobil ilovani yuklab oling yoki saytga kiring.</li>
                <li>Ro‘yxatdan o‘ting yoki tizimga kiring.</li>
                <li>Kerakli mahsulotni tanlang va "Xarid qilish" tugmasini bosing.</li>
                <li>Kerakli ma’lumotlarni to‘ldiring.</li>
                <li>O‘zingizga qulay bo‘lgan usulda to‘lovni amalga oshiring.</li>
            </ol>
        </div>

        <div class="mt-4">
            <p>Agar savollaringiz bo‘lsa, biz bilan bog‘laning yoki <a href="#" class="text-primary fw-bold">qayta qo‘ng‘iroq</a> buyurtma qiling.</p>
        </div>
    </div>

@endsection
