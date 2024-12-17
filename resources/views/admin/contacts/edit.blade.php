@extends('layouts.admin')

@section('content')
    <form action="{{ route('contacts.update', $contact->id) }}" method="POST" enctype="multipart/form-data" novalidate class="needs-validation">
        @csrf
        @method('PUT')

        <main class="nxl-container">
            <div class="nxl-content">
                <div class="page-header">
                    <div class="page-header-left d-flex align-items-center">
                        <div class="page-header-title">
                            <h5 class="m-b-10">Редактировать контакт</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('admins.dashboard') }}">Главная</a></li>
                            <li class="breadcrumb-item">Контакты</li>
                        </ul>
                    </div>
                    <div class="page-header-right ms-auto">
                        <button type="submit" class="btn btn-primary">Сохранить</button>
                    </div>
                </div>

                @if ($errors->any())
                    <div class="alert alert-danger m-3">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="main-content">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card stretch">
                                <div class="card-header">
                                    <h5 class="card-title">Контактная информация</h5>
                                </div>
                                <div class="row card-body p-4">
                                    <div class="col-lg-4 col-md-4 form-group pb-3">
                                        <label for="email">Email:</label>
                                        <input type="email" class="form-control" id="email" name="email"
                                               value="{{ old('email', $contact->email) }}" required>
                                    </div>
                                    <div class="col-lg-4 col-md-4 form-group pb-3">
                                        <label for="phone">Телефон:</label>
                                        <input type="text" class="form-control" id="phone" name="phone"
                                               value="{{ old('phone', $contact->phone) }}" required>
                                    </div>
                                    <div class="col-lg-4 col-md-4 form-group pb-3">
                                        <label for="address">Адрес:</label>
                                        <input type="text" class="form-control" id="address" name="address"
                                               value="{{ old('address', $contact->address) }}" required>
                                    </div>
                                    <div class="col-lg-4 col-md-4 form-group pb-3">
                                        <label for="facebook">Facebook:</label>
                                        <input type="url" class="form-control" id="facebook" name="facebook"
                                               value="{{ old('facebook', $contact->facebook) }}">
                                    </div>
                                    <div class="col-lg-4 col-md-4 form-group pb-3">
                                        <label for="instagram">Instagram:</label>
                                        <input type="url" class="form-control" id="instagram" name="instagram"
                                               value="{{ old('instagram', $contact->instagram) }}">
                                    </div>
                                    <div class="col-lg-4 col-md-4 form-group pb-3">
                                        <label for="telegram">Telegram:</label>
                                        <input type="url" class="form-control" id="telegram" name="telegram"
                                               value="{{ old('telegram', $contact->telegram) }}">
                                    </div>
                                    <div class="col-lg-4 col-md-4 form-group pb-3">
                                        <label for="youtube">YouTube:</label>
                                        <input type="url" class="form-control" id="youtube" name="youtube"
                                               value="{{ old('youtube', $contact->youtube) }}">
                                    </div>
                                    <div class="col-lg-4 col-md-4 form-group pb-3">
                                        <label for="linkedin">LinkedIn:</label>
                                        <input type="url" class="form-control" id="linkedin" name="linkedin"
                                               value="{{ old('linkedin', $contact->linkedin) }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </form>
@endsection
