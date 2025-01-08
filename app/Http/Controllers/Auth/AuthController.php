<?php

namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller{
    public function login()
    {
        return view('user.auth.login');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            switch ($user->role) {
                case '0':
                    return redirect()->route('user.profile');
                case '1':
                    return redirect()->route('products.index');
                case '2':
                    return redirect()->route('products.index');
                default:
                    Auth::logout();

                    return redirect()->route('dashboard')->withErrors(['role' => 'Invalid role assigned to the user.']);
            }
        }

        return redirect()->route('login')->withErrors(['email' => 'Invalid credentials.']);

    }

    public function register()
    {
        return view('user.auth.register');
    }

    public function userRegister(Request $request, User $user)
    {
        $request->validate([
            'full_name' => 'required|string|max:255',
            'phone' => 'required|string|max:20|unique:users,phone',
            'email' => 'required|string|email|max:255|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
        ], [
            'full_name.required' => 'Ismni kiritish majburiy.',
            'phone.required' => 'Telefon raqamni kiritish majburiy.',
            'phone.unique' => 'Bu telefon raqam avval ro‘yxatdan o‘tgan.',
            'email.required' => 'Email manzilini kiritish majburiy.',
            'email.unique' => 'Bu email manzili avval ro‘yxatdan o‘tgan.',
            'password.required' => 'Parolni kiritish majburiy.',
            'password.min' => 'Parol kamida 8 ta belgidan iborat bo‘lishi kerak.',
            'password.confirmed' => 'Tasdiqlovchi parol mos emas.',
        ]);

        $user = new User();
        $user->full_name = $request->full_name;
        $user->phone = $request->phone;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->role = User::ROLE_CUSTOMER;
        $user->status = 1;
        $user->save();

        // Foydalanuvchini avtomatik login qilish
        auth()->login($user);

        return redirect()->route('user.profile')->with('success', 'Siz muvaffaqiyatli ro‘yxatdan o‘tdingiz!');
    }


    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
