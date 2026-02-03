<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Author;

class BookController extends Controller
{
        public function webIndex()
    {
        $books = Book::with('author')->get();
        return view('books.index', compact('books'));
    } 
    public function create()
    {
        $authors = Author::all();
        return view('books.create', compact('authors'));
    }
    public function storeWeb(Request $request)
{
    $data = $request->validate([
        'title'     => 'required|string|max:255',
        'author_id'=> 'required|exists:authors,id',
    ]);

    Book::create($data);

    return redirect('/books')->with('success', 'Book added successfully');
}
    public function show(Book $book){
        return $book->load('authors');
    }
    public function update(Request $request, Book $book){
        $data = $request->validate(
            [
                'name' => 'required|string|max:100',
                'author_id' => 'required|exists:authors,id'
            ]
        );
        $book->update($data);
        return $book;
    }
        public function destroyWeb(Book $book)
    {
        $book->delete();
        return redirect('/books')->with('success', 'Book deleted successfully');
    }
}
