@extends('layouts.admin')

@section('content')
    <main class="nxl-container">
        <div class="nxl-content">
            <div class="page-header">
                <div class="page-header-left d-flex align-items-center">
                    <div class="page-header-title">
                        <h5 class="m-b-10">Welcome {{ auth()->user()->full_name }}</h5>
                    </div>
                </div>
            </div>
        </div>
        <div class="container mt-3">
            <iframe src="http://mi.doraholding.com/" frameborder="0" style="width: 100%;height: 100vh;"></iframe>
        </div>
    </main>
@endsection
