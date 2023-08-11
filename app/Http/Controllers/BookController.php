<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookRequest;
use App\Models\Book;
use Illuminate\Http\Client\Request as ClientRequest;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Book::all();

        return response()->json($books);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function show(string $user_id)
    {
        $books = Book::findOrFail($user_id);
        return response()->json($books);
    }

    /**
     * Display the specified resource.
     */
    public function store(BookRequest $request)
    {
        $book = Book::create($request->validated());

        return response()->json($book);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $book = Book::findOrFail($id);
        $book->update($request->all());
        return response()->json($book);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $gradebook = Book::findOrFail($id);
        $gradebook->delete();
    }
}
