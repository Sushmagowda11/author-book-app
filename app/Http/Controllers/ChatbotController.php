<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Author;
use App\Models\Book;

class ChatbotController extends Controller
{
    public function respond(Request $request)
    {
        $query = strtolower(trim($request->input('query')));

        if (str_contains($query, 'how many authors')) {
            $count = Author::count();
            return response()->json(['answer' => "There are $count authors."]);
        }

        if (str_contains($query, 'how many books')) {
            $count = Book::count();
            return response()->json(['answer' => "There are $count books available."]);
        }

        if (str_contains($query, 'top 5 authors')) {
            $authors = Author::withCount('books')
                            ->orderByDesc('books_count')
                            ->limit(5)
                            ->pluck('name')
                            ->toArray();
            $list = implode(', ', $authors);
            return response()->json(['answer' => "Top 5 authors are: $list"]);
        }

        return response()->json(['answer' => "Sorry, I didn't understand that."]);
    }
}
