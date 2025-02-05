<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request; // ✅ Bu qator to'g'ri bo'lishi kerak
use Illuminate\Support\Facades\Artisan;

class TranslationController extends Controller
{
    // **Mavjud tarjimalarni chiqarish uchun funksiya**
    public function index(Request $request)
    {
        $local = $request->input('local', 'uz'); // Default til: uz
        $file = $request->input('file', 'messages'); // Default fayl: messages.php

        // **To‘g‘ri yo‘lni belgilash (`resource_path()` o‘rniga `base_path()`)**
        $path = base_path("lang/{$local}/{$file}.php");

        // Agar fayl mavjud bo‘lmasa, uni avtomatik yaratish
        if (!file_exists($path)) {
            file_put_contents($path, "<?php\n\nreturn [];\n");
        }

        $translations = include $path;

        return view('admin.translations.index', compact('translations', 'local', 'file'));
    }


    // **Eski tarjimalarni chiqarish**
    public function getTranslation(Request $request)
    {
        $request->validate([
            'local' => 'required|string',
            'file' => 'required|string',
            'key' => 'required|string',
        ]);

        $path = resource_path("lang/{$request->local}/{$request->file}.php"); // ✅ `$request->local` emas, `$request->local`

        if (!file_exists($path)) {
            return response()->json(['value' => 'Topilmadi']);
        }

        $translations = include $path;

        return response()->json(['value' => $translations[$request->key] ?? 'Topilmadi']);
    }

    // **Tarjimalarni yangilash**
    public function update(Request $request)
    {
        $request->validate([
            'local' => 'required|string',
            'file' => 'required|string',
            'key' => 'required|string',
            'value' => 'required|string',
        ]);

        $path = base_path("lang/{$request->local}/{$request->file}.php");

        // Agar fayl mavjud bo‘lmasa, uni yaratish
        if (!file_exists($path)) {
            file_put_contents($path, "<?php\n\nreturn [];\n");
        }

        $translations = include $path;

        // Faqat bitta tarjimani yangilash
        $translations[$request->key] = $request->value;

        // Tarjimalarni faylga qayta yozish
        $content = "<?php\n\nreturn " . var_export($translations, true) . ";\n";
        file_put_contents($path, $content);

        // **CACHE VA CONFIGNI TO‘G‘RI TOZALASH**
        Artisan::call('optimize:clear');

        // **Success sessiyasiga xabar qo‘shish**
        return back()->with('success', "Tarjima ($request->key) yangilandi!");
    }




}
