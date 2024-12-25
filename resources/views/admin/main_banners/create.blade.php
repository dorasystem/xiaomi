@extends('layouts.admin')

@section('content')
    <form action="{{ route('main_banners.store') }}" method="POST" enctype="multipart/form-data"
          class="needs-validation">
        @csrf

        <main class="nxl-container">
            <div class="nxl-content">
                <div class="page-header">
                    <div class="page-header-left d-flex align-items-center">
                        <div class="page-header-title">
                            <h5 class="m-b-10">Создать баннер</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('admins.dashboard') }}">Главная</a></li>
                            <li class="breadcrumb-item">Баннер</li>
                        </ul>
                    </div>
                    <div class="page-header-right ms-auto">
                        <button type="submit" class="btn btn-primary">Создать</button>
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
                                    <h5 class="card-title">Детали баннера</h5>
                                </div>
                                <div class="d-flex justify-content-around p-4">
                                    <div class="form-group pb-3">
                                        <label for="images">Выберите несколько изображений:</label>
                                        <input type="file" name="images[]" id="images" class="form-control" multiple>
                                    </div>

                                    <div class="form-group pb-3">
                                        <label for="image1">Изображение 1:</label>
                                        <input type="file" name="image1" id="image1" class="form-control">
                                    </div>
                                    <div class="form-group pb-3">
                                        <label for="image2">Изображение 2:</label>
                                        <input type="file" name="image2" id="image2" class="form-control">
                                    </div>
                                </div>
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
