<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    /**
     * Display a listing of the authors.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Fetch all authors with the count of associated books
        $authors = Author::withCount('books')->get();
        return view('authors.index', compact('authors')); // Pass authors data to the view
    }

    /**
     * Show the form for creating a new author.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('authors.create');
    }

    /**
     * Store a newly created author in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        // Validate the input data with custom messages
        $request->validate([
            'name' => 'required|string|max:255',
            'bio' => 'required|string',
        ], [
            'name.required' => 'The author name is required.',
            'bio.required' => 'Please provide a bio for the author.',
        ]);

        // Create a new author if validation passes
        Author::create([
            'name' => $request->name,
            'bio' => $request->bio,
        ]);

        return redirect()->route('authors.index')->with('success', 'Author added successfully!');
    }

    /**
     * Display the specified author.
     *
     * @param  \App\Models\Author  $author
     * @return \Illuminate\View\View
     */
    public function show(Author $author)
    {
        // Display the author details with their associated books
        return view('authors.show', compact('author'));
    }

    /**
     * Show the form for editing the specified author.
     *
     * @param  \App\Models\Author  $author
     * @return \Illuminate\View\View
     */
    public function edit(Author $author)
    {
        // Show the edit form with the existing author data
        return view('authors.edit', compact('author'));
    }

    /**
     * Update the specified author in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Author $author)
    {
        // Validate the input data with custom messages
        $request->validate([
            'name' => 'required|string|max:255',
            'bio' => 'required|string',
        ], [
            'name.required' => 'The author name is required.',
            'bio.required' => 'Please provide a bio for the author.',
        ]);

        // Update the author's information if validation passes
        $author->update([
            'name' => $request->name,
            'bio' => $request->bio,
        ]);

        return redirect()->route('authors.index')->with('success', 'Author updated successfully!');
    }

    /**
     * Remove the specified author from storage.
     *
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Author $author)
    {
        // Delete the author from the database
        $author->delete();

        return redirect()->route('authors.index')->with('success', 'Author deleted successfully!');
    }
}
