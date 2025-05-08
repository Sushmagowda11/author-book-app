@extends('layouts.app')

@section('title', 'Edit Author')

@section('content')
<div class="container mt-5">
    <div class="card shadow-sm border-0">
        <div class="card-body">
            <h3 class="text-dark mb-4"><i class="fas fa-user-edit text-secondary me-2"></i>Edit Author</h3>

            <form action="{{ route('authors.update', $author->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="name" class="form-label fw-semibold">Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $author->name }}" required>
                </div>

                <div class="mb-4">
                    <label for="bio" class="form-label fw-semibold">Bio</label>
                    <textarea class="form-control" id="bio" name="bio" rows="5" required>{{ $author->bio }}</textarea>
                </div>

                <div class="d-flex justify-content-between">
                    <a href="{{ route('authors.index') }}" class="btn btn-outline-secondary">
                        <i class="fas fa-arrow-left me-1"></i> Cancel
                    </a>
                    <button type="submit" class="btn btn-success">
                        <i class="fas fa-save me-1"></i> Update Author
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
@endsection
