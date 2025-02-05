<?php

use Illuminate\Support\Facades\Artisan;

if (!function_exists('updateLangFile')) {
    function updateLangFile($local, $file, $key, $value)
    {
        $path = base_path("lang/{$local}/{$file}.php");

        // Agar fayl mavjud bo'lmasa, uni yaratish
        if (!file_exists($path)) {
            file_put_contents($path, "<?php\n\nreturn [];\n");
        }

        // Tarjimalarni yuklash
        $translations = include $path;

        // Mavjud tarjimalarni o‘zgartirish yoki yangi qo‘shish
        $translations[$key] = $value;

        // Tarjimalarni qayta yozish
        $content = "<?php\n\nreturn " . var_export($translations, true) . ";\n";

        file_put_contents($path, $content);

        // Laravel cache tozalash
        Artisan::call('optimize');

        return true;
    }
}

