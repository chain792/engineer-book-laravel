<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Book::with('user')->orderBy('created_at', 'desc')->get();
        return view('books.index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Book $book)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        //
    }

    public function search(Request $request)
    {
        $params = $request->only(['search']);
        if (! array_key_exists('search', $params)) {
            $googleBooks = [];
        } elseif (! $params['search']) {
            $googleBooks = [];
            session()->flash('message', '検索キーワードが入力されていません');
        } else {
            $url = "https://www.googleapis.com/books/v1/volumes";
            $text = $params['search'];
            $response = Http::get($url, [
                'q' => $text,
                'langRestrinct' => 'ja',
                'maxResult' => 30,
                'key' => env('GOOGLE_API_KEY'),
            ]);
            $googleBooks = $response->json();
        }

        return view('books.search', compact('googleBooks'));
    }
}
