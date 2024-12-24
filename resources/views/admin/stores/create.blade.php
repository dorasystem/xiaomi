@extends('layouts.admin')

@section('content')
<form action="{{ route('stores.store') }}" method="POST" enctype="multipart/form-data" novalidate class="needs-validation">
    @csrf

    <main class="nxl-container">
        <div class="nxl-content">
            <div class="page-header">
                <div class="page-header-left d-flex align-items-center">
                    <div class="page-header-title">
                        <h5 class="m-b-10">Create Store</h5>
                    </div>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admins.dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item">Stores</li>
                    </ul>
                </div>
                <div class="page-header-right ms-auto">
                    <button type="submit" class="btn btn-primary">Create</button>
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
                    <div class="col-lg-8">
                        <div class="card stretch">
                            <div class="card-header">
                                <h5 class="card-title">Store Details</h5>
                            </div>
                            <div class="card-body p-4">
                                <ul class="nav-tab-items-wrapper nav nav-justified">
                                    <li class="nav-item">
                                        <a href="#uzContent" class="nav-link active" data-bs-toggle="tab" data-bs-target="#uzContent">O'zbekcha</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#enContent" class="nav-link" data-bs-toggle="tab" data-bs-target="#enContent">English</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#ruContent" class="nav-link" data-bs-toggle="tab" data-bs-target="#ruContent">Русский</a>
                                    </li>
                                </ul>

                                <div class="tab-content pt-3">
                                    @foreach (['uz', 'en', 'ru'] as $lang)
                                        <div class="tab-pane fade show {{ $lang == 'uz' ? 'active' : '' }}" id="{{ $lang }}Content">
                                            <div class="form-group pb-3">
                                                <label for="title_{{ $lang }}">Title ({{ strtoupper($lang) }}):</label>
                                                <input type="text" class="form-control" id="title_{{ $lang }}" name="title_{{ $lang }}"
                                                       value="{{ old('title_' . $lang) }}" required>
                                            </div>
                                            <div class="form-group pb-3">
                                                <label for="address_{{ $lang }}">Address ({{ strtoupper($lang) }}):</label>
                                                <input type="text" class="form-control" id="address_{{ $lang }}" name="address_{{ $lang }}"
                                                       value="{{ old('address_' . $lang) }}" required>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card stretch">
                            <div class="card-header">
                                <h5 class="card-title">Store Image</h5>
                            </div>
                            <div class="card-body p-4">
                                <div class="form-group pb-3">
                                    <label for="phone_1">Phone 1:</label>
                                    <input type="text" class="form-control" id="phone_1" name="phone_1" value="{{ old('phone_1') }}">
                                </div>
                                <div class="form-group pb-3">
                                    <label for="phone_2">Phone 2:</label>
                                    <input type="text" class="form-control" id="phone_2" name="phone_2" value="{{ old('phone_2') }}">
                                </div>
                                <div class="form-group pb-3">
                                    <label for="email">Email:</label>
                                    <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}">
                                </div>
                                <div class="form-group pb-3">
                                    <label for="latitude">Latitude:</label>
                                    <input type="text" class="form-control" id="latitude" name="latitude" value="{{ old('latitude') }}">
                                </div>
                                <div class="form-group pb-3">
                                    <label for="longitude">Longitude:</label>
                                    <input type="text" class="form-control" id="longitude" name="longitude" value="{{ old('longitude') }}">
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
