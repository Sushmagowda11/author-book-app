<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Author;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        // Fetch all books with author data
        $books = Book::with('author')->get();
        return view('books.index', compact('books'));
    }

    public function create()
    {
        // Get all authors for the dropdown
        $authors = Author::all();
        return view('books.create', compact('authors'));
    }

    public function store(Request $request)
    {
        // Validate the incoming data
        $validatedData = $request->validate([
            'title' => 'required|max:255|unique:books,title',
            'author_id' => 'required|exists:authors,id',
        ], [
            // Custom error messages (optional)
            'title.required' => 'The title field is required.',
            'title.max' => 'The title cannot be longer than 255 characters.',
            'title.unique' => 'This book title already exists.',
            'author_id.required' => 'You must select an author.',
            'author_id.exists' => 'The selected author is invalid.',
        ]);

        // Create a new book
        Book::create([
            'title' => $validatedData['title'],
            'author_id' => $validatedData['author_id'],
        ]);

        return redirect()->route('books.index')->with('success', 'Book created successfully!');
    }

    public function show(Book $book)
    {
        return view('books.show', compact('book'));
    }

    public function edit(Book $book)
    {
        // Get all authors for the dropdown
        $authors = Author::all();
        return view('books.edit', compact('book', 'authors'));
    }

    public function update(Request $request, Book $book)
    {
        // Validate the incoming data
        $validatedData = $request->validate([
            'title' => 'required|max:255|unique:books,title,' . $book->id, // Exclude current book's title from unique check
            'author_id' => 'required|exists:authors,id',
        ], [
            // Custom error messages (optional)
            'title.required' => 'The title field is required.',
            'title.max' => 'The title cannot be longer than 255 characters.',
            'title.unique' => 'This book title already exists.',
            'author_id.required' => 'You must select an author.',
            'author_id.exists' => 'The selected author is invalid.',
        ]);

        // Update the book
        $book->update([
            'title' => $validatedData['title'],
            'author_id' => $validatedData['author_id'],
        ]);

        return redirect()->route('books.index')->with('success', 'Book updated successfully!');
    }

    public function destroy(Book $book)
    {
        $book->delete();
        return redirect()->route('books.index')->with('success', 'Book deleted successfully!');
    }
}
