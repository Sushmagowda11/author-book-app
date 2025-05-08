@extends('layouts.app')

@section('title', 'Book Details')

@section('content')
<div class="container mt-5">
    <div class="card shadow-sm border-0">
        <div class="card-header bg-light">
            <h5 class="mb-0 text-dark">
                <i class="fas fa-book text-secondary me-2"></i>Title: {{ $book->title }}
            </h5>
        </div>
        <div class="card-body">
            <p class="mb-2"><strong>Author:</strong> {{ $book->author->name }}</p>
            <p class="mb-0"><strong>Author Bio:</strong> {{ $book->author->bio }}</p>
        </div>
    </div>

    <div class="mt-4">
        <a href="{{ route('books.index') }}" class="btn btn-outline-primary">
            <i class="fas fa-arrow-left me-1"></i> Back to Book List
        </a>
    </div>
</div>

<!-- Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
@endsection
