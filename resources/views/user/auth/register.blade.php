@extends('layouts.auth')

@section('content')
    <main class="auth-minimal-wrapper">
        <div class="auth-minimal-inner">
            <div class="minimal-card-wrapper">
                <div class="card mb-4 mt-5 mx-4 mx-sm-0 position-relative">
                    <div class="card-body p-sm-5">
                        <h2 class="fs-20 fw-bolder mb-4">Ro‘yxatdan o‘tish</h2>
                        <form id="auth-form" action="{{ route('user.register') }}" method="post" class="w-100 mt-4 pt-2">
                            @csrf
                            <input type="text" hidden="hidden" name="role" value="0"> <!-- Faqat customer roli uchun -->

                            <div class="mb-4">
                                <input id="full_name" type="text" class="form-control" placeholder="To‘liq ismingiz" name="full_name" required value="{{ old('full_name') }}">
                                @error('full_name')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <input id="phone" type="text" class="form-control" placeholder="Telefon raqam" name="phone" required value="{{ old('phone') }}">
                                @error('phone')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <input id="email" type="email" class="form-control" placeholder="Email" name="email" required value="{{ old('email') }}">
                                @error('email')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <input id="password" type="password" class="form-control" placeholder="Parol" name="password" required value="{{ old('password') }}">
                                @error('password')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <input id="password_confirmation" type="password" class="form-control" placeholder="Parolni tasdiqlang" name="password_confirmation" required>
                                @error('password_confirmation')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="mt-4 mb-3">
                                <button type="submit" class="btn btn-lg btn-primary w-100">Ro‘yxatdan o‘tish</button>
                            </div>
                            <a href="{{ route('login') }}" class="link-primary">Login</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
