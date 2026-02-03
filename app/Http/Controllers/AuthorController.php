<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Author;
use App\Models\Book;
use Nette\Utils\Json;
use PhpParser\Builder\Function_;

class AuthorController extends Controller
{
    public function webIndex()
    {
        $authors = Author::with('books')->get();
        return view('authors.index', compact('authors'));
    }
    public function create()
    {
        return view('authors.create');
    }

    public function storeWeb(Request $request)
    {
        $data = $request->validate([
            'name'  => 'required|string|max:255',
            'email' => 'required|email|unique:authors,email',
        ]);

        Author::create($data);

        return redirect('/authors')->with('success', 'Author added successfully');
    }
    public function show(Author $author){
        return $author->load('books');
    }
    public function update(Request $request, Author $author){
        $data = $request-> validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email|unique:author,email,'.$author->id
        ]);
        $author->updated($data);
        return $author;
    }
        public function destroyWeb(Author $author)
    {
        $author->delete(); // books auto-deleted (cascade)

        return redirect('/authors')->with('success', 'Author deleted successfully');
    }
}
