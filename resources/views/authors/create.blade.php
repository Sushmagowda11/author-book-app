@extends('layouts.app')

@section('title', 'Add Author')

@section('content')
<div class="container">
    <h1>Add New Author</h1>

    <!-- Display all validation errors -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Add Author Form -->
    <form action="{{ route('authors.store') }}" method="POST">
        @csrf
        
        <!-- Author Name Field -->
        <div class="mb-3">
            <label for="name" class="form-label">Author Name</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" required>
            <!-- Display validation error for name -->
            @error('name')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        
        <!-- Author Bio Field -->
        <div class="mb-3">
            <label for="bio" class="form-label">Bio</label>
            <textarea name="bio" id="bio" rows="4" class="form-control" required>{{ old('bio') }}</textarea>
            <!-- Display validation error for bio -->
            @error('bio')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <!-- Submit Button -->
        <button type="submit" class="btn btn-success">Add Author</button>
        <!-- Cancel Button -->
        <a href="{{ route('authors.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
