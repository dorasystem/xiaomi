@extends('layouts.admin')

@section('content')
    <form action="{{ route('main_banners.update', $mainBanner->id) }}" method="POST" enctype="multipart/form-data"
          class="needs-validation">
        @csrf
        @method('PUT')

        <main class="nxl-container">
            <div class="nxl-content">
                <div class="page-header">
                    <div class="page-header-left d-flex align-items-center">
                        <div class="page-header-title">
                            <h5 class="m-b-10">Редактировать баннер</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('admins.dashboard') }}">Главная</a></li>
                            <li class="breadcrumb-item">Баннер</li>
                        </ul>
                    </div>
                    <div class="page-header-right ms-auto">
                        <button type="submit" class="btn btn-primary">Сохранить изменения</button>
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
                                <div class="card-body p-4">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group pb-3">
                                                <input type="file" name="images[]" id="images" class="form-control" multiple>
                                            </div>
                                            <div class="form-group pb-3">
                                                <label class="mb-3">Текущие изображения:</label>
                                                <div class="d-flex flex-wrap">
                                                    @if ($mainBanner->images)
                                                        @foreach ($mainBanner->images as $key => $image)
                                                            <div class="image-preview m-2 position-relative">
                                                                <img src="{{ asset('storage/' . $image) }}" alt="image" style="width: 100px; height: 100px; object-fit: cover;">
                                                                <form action="{{ route('mainBanner.deleteImage', ['mainBanner' => $mainBanner->id, 'image' => $image]) }}" method="POST" style="position: absolute; top: 0; right: 0;">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="submit" class="btn btn-danger btn-sm">X</button>
                                                                </form>
                                                            </div>
                                                        @endforeach
                                                    @else
                                                        <p>Нет изображений.</p>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group pb-3">
                                                <input type="file" name="image1" id="image1" class="form-control">
                                            </div>
                                            <div class="form-group pb-3">
                                                <label class="mb-3" for="image1">Текущее изображение 1:</label>
                                                @if ($mainBanner->image1)
                                                    <div class="mb-3 position-relative">
                                                        <img src="{{ asset('storage/' . $mainBanner->image1) }}" alt="image1"
                                                             style="width: 100px; height: 100px; object-fit: cover;">
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group pb-3">
                                                <input type="file" name="image2" id="image2" class="form-control">
                                            </div>
                                             <div class="form-group pb-3">
                                                <label class="mb-3" for="image2">Текущее изображение 2:</label>
                                                @if ($mainBanner->image2)
                                                    <div class="mb-3 position-relative">
                                                        <img src="{{ asset('storage/' . $mainBanner->image2) }}" alt="image2"
                                                             style="width: 100px; height: 100px; object-fit: cover;">
                                                    </div>
                                                @endif
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

    <form id="deleteImageForm" method="POST" style="display: none;">
        @csrf
        @method('DELETE')
    </form>

    <script>
        function deleteImage(key) {
            if (confirm('Вы уверены, что хотите удалить это изображение?')) {
                const form = document.getElementById('deleteImageForm');
                form.action = `{{ url('admin/main_banners/' . $mainBanner->id . '/images') }}/${key}`;
                form.submit();
            }
        }

        function editImage(key) {
            const editImageSection = document.getElementById('edit-image-' + key);
            if (editImageSection) {
                editImageSection.style.display = editImageSection.style.display === 'none' ? 'block' : 'none';
            }
        }
    </script>
@endsection
