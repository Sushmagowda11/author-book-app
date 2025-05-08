@extends('layouts.app')

@section('title', 'Author Details')

@section('content')
<div class="container mt-5">
    <div class="card shadow-sm border-0">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-start mb-3">
                <div>
                    <h3 class="text-dark mb-1">{{ $author->name }}</h3>
                    <p class="text-muted mb-2"><strong>Bio:</strong> {{ $author->bio }}</p>
                </div>
                <a href="{{ route('authors.edit', $author->id) }}" class="btn btn-outline-secondary">
                    <i class="fas fa-edit me-1"></i> Edit Author
                </a>
            </div>

            <hr>

            <h5 class="text-secondary mb-3">Books by {{ $author->name }}:</h5>

            @if ($author->books->isEmpty())
                <p class="text-muted">No books found for this author.</p>
            @else
                <ol class="ps-3 text-dark" style="line-height: 1.8;">
                    @foreach ($author->books as $book)
                        <li>
                            <i class="fas fa-book text-muted me-1"></i>{{ $book->title }}
                        </li>
                    @endforeach
                </ol>
            @endif

            <hr>

            <div class="mt-4">
                <a href="{{ route('authors.index') }}" class="btn btn-outline-dark">
                    <i class="fas fa-arrow-left me-1"></i> Back to Authors
                </a>
            </div>
        </div>
    </div>
</div>

<!-- Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
@endsection
