@extends('layouts.app')

@section('title', 'Books List')

@section('content')
<div class="container mt-5">
    <!-- Success Message -->
    @if(session('success'))
        <div class="alert alert-success shadow-sm">
            <i class="fas fa-check-circle me-1"></i> {{ session('success') }}
        </div>
    @endif

    <!-- Page Header -->
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4 class="text-dark mb-0"><i class="fas fa-book text-primary me-2"></i>Books List</h4>
        <a href="{{ route('books.create') }}" class="btn btn-success btn-sm">
            <i class="fas fa-plus me-1"></i> Add New Book
        </a>
    </div>

    <!-- Book Table -->
    <div class="card border-0 shadow-sm">
        <div class="card-body p-0">
            @if($books->count() > 0)
                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead class="bg-light text-muted">
                            <tr>
                                <th style="width: 60px;">#</th>
                                <th>Book Title</th>
                                <th>Author</th>
                                <th class="text-center" style="width: 160px;">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($books as $index => $book)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $book->title }}</td>
                                    <td>{{ $book->author->name }}</td>
                                    <td class="text-center">
                                        <a href="{{ route('books.edit', $book->id) }}" class="btn btn-outline-warning btn-sm me-1">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('books.destroy', $book->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this book?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-outline-danger btn-sm">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <div class="alert alert-warning mb-0">
                    <i class="fas fa-exclamation-circle me-1"></i> No books found.
                </div>
            @endif
        </div>
    </div>
</div>

<!-- Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
@endsection
