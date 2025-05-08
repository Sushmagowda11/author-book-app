@extends('layouts.app')

@section('title', 'Add New Book')

@section('content')
<div class="container mt-5">
    <div class="card shadow-sm border-0">
        <div class="card-body">
            <h4 class="text-dark mb-4">
                <i class="fas fa-book me-2 text-primary"></i>Add New Book
            </h4>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> Please correct the following errors:
                    <ul class="mb-0 mt-2">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('books.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label for="title" class="form-label fw-semibold">Book Title</label>
                    <input type="text"
                           name="title"
                           id="title"
                           class="form-control @error('title') is-invalid @enderror"
                           value="{{ old('title') }}"
                           placeholder="Enter the book title"
                           required>
                    @error('title')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="author_id" class="form-label fw-semibold">Author</label>
                    <select name="author_id"
                            id="author_id"
                            class="form-control @error('author_id') is-invalid @enderror"
                            required>
                        <option value="">Select Author</option>
                        @foreach($authors as $author)
                            <option value="{{ $author->id }}" {{ old('author_id') == $author->id ? 'selected' : '' }}>
                                {{ $author->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('author_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="d-flex justify-content-between">
                    <a href="{{ route('books.index') }}" class="btn btn-outline-secondary">
                        <i class="fas fa-arrow-left me-1"></i> Cancel
                    </a>
                    <button type="submit" class="btn btn-success">
                        <i class="fas fa-save me-1"></i> Save Book
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
@endsection
