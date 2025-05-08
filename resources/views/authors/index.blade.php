@extends('layouts.app')

@section('title', 'Authors List')

@section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4 class="fw-semibold" style="color: #495057;">
            <i class="fas fa-user-edit me-2 text-secondary"></i>Authors
        </h4>
        <a href="{{ route('authors.create') }}" class="btn btn-outline-secondary">
            <i class="fas fa-plus me-1"></i> Add Author
        </a>
    </div>

    @if (session('success'))
        <div class="alert alert-success shadow-sm">{{ session('success') }}</div>
    @endif

    <div class="card border-0 shadow-sm">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover mb-0">
                <thead style="background-color: #e8f5e9; color: #2e7d32;">
                <tr>
                            <th>Name</th>
                            <th>Bio</th>
                            <th>Books</th>
                            <th class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($authors as $author)
                            <tr>
                                <td>{{ $author->name }}</td>
                                <td>{{ Str::limit($author->bio, 100) }}</td>
                                <td>{{ $author->books_count }}</td>
                                <td class="text-center">
                                    <div class="btn-group btn-group-sm">
                                        <a href="{{ route('authors.show', $author->id) }}" class="btn btn-outline-primary" title="View">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="{{ route('authors.edit', $author->id) }}" class="btn btn-outline-secondary" title="Edit">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('authors.destroy', $author->id) }}" method="POST" onsubmit="return confirm('Delete this author?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-outline-danger" title="Delete">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center text-muted">No authors available.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
@endsection
