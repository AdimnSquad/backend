@extends('layouts.app')
@section('title', 'Konten Mobil')
@section('content')
    {{-- Success Toast --}}
    @if (session('success'))
        <div aria-live="polite" aria-atomic="true" class="position-relative">
            <!-- Container Toast (fixed kanan atas) -->
            <div class="toast-container position-fixed top-0 end-0 p-3" style="z-index: 2000">
                <div class="toast align-items-center text-white bg-success border-0 shadow-lg" role="alert"
                    aria-live="assertive" aria-atomic="true">
                    <div class="d-flex">
                        <div class="toast-body">
                            <i class="fas fa-check-circle me-2"></i> {{ session('success') }}
                        </div>
                        <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"
                            aria-label="Close"></button>
                    </div>
                </div>
            </div>
        </div>
    @endif

    <div class="fade-in">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h1 class="h3 fw-bold text-dark">Content Management</h1>
                <p class="text-muted">Manage your car Content</p>
            </div>
            <a href="{{ route('content.create') }}" class="btn btn-primary-custom">
                <i class="fas fa-plus me-2"></i>
                Add New Car Content
            </a>
        </div>

        <div class="row">
            <!-- Cars Table -->
            <div class="col-lg-12 mb-4">
                <div class="card card-custom">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <div>
                            <h5 class="card-title mb-0">Content Car List</h5>
                            <small class="text-muted">View and manage all cars</small>
                        </div>
                        <div class="search-box">
                            <i class="fas fa-search search-icon"></i>
                            <input type="text" class="form-control search-input" placeholder="Search cars...">
                        </div>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-custom mb-0" id="carsTable">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name Cars</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($contents as $item)
                                        <tr>
                                            <td>{{$loop->index}}</td>
                                            <td>{{$item->car->name}}</td>
                                            <td>
                                                <a href="" class="btn btn-sm btn-warning">Edit</a>
                                                <a href="" class="btn btn-sm btn-primary">Show</a>
                                                <button class="btn btn-sm btn-danger">Delete</button>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td class="text-center" colspan="3">Data Tidak ditemukan</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const toastElList = document.querySelectorAll('.toast');
            toastElList.forEach(toastEl => new bootstrap.Toast(toastEl, {
                delay: 4000
            }).show());
        });
    </script>
@endsection
