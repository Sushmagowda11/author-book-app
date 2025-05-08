@extends('layouts.app')

@section('title', 'Edit Book')

@section('content')
<div class="container mt-5">
    <div class="card shadow-sm border-0">
        <div class="card-body">
            <h4 class="text-dark mb-4">
                <i class="fas fa-edit text-secondary me-2"></i>Edit Book
            </h4>

            <form action="{{ route('books.update', $book->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="title" class="form-label fw-semibold">Book Title</label>
                    <input type="text"
                           class="form-control @error('title') is-invalid @enderror"
                           id="title"
                           name="title"
                           value="{{ old('title', $book->title) }}"
                           required>
                    @error('title')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="author_id" class="form-label fw-semibold">Select Author</label>
                    <select class="form-control @error('author_id') is-invalid @enderror"
                            id="author_id"
                            name="author_id"
                            required>
                        @foreach($authors as $author)
                            <option value="{{ $author->id }}"
                                {{ old('author_id', $book->author_id) == $author->id ? 'selected' : '' }}>
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
                        <i class="fas fa-save me-1"></i> Update Book
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
@endsection
