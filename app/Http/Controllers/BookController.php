<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = [
            'books' => Book::all(),
        ];
        return view('books.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('books.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request){
        // dd($request->all());
        $request->validate([
            'title' => ['required', 'unique:books,title'],
            'author' => ['required'],
            'edition' => ['required'],
            'no_of_pages' => ['required']
        ]);
        $result = Book::create([
            'title' => $request->title,
            'author' => $request->author,
            'edition' => $request->edition,
            'no_of_pages' => $request->no_of_pages,
        ]);

            if ($result) {
                return redirect()->route('book.create')->with('success', 'Book details has been created');
            } else {
            return redirect()->route('book.create')->with('failed', 'Books details has failed to create');
        }
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
        $data = [
            'book' => $book,
        ];
        return view('books.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Book $book)
    {
        $request->validate([
            'title' => ['required', 'unique:books,title,' . $book->id . ',id'],
            'author' => ['required'],
            'edition' => ['required'],
            'no_of_pages' => ['required']
        ]);
        $result = Book::find($book->id)->update([
            'title' => $request->title,
            'author' => $request->author,
            'edition' => $request->edition,
            'no_of_pages' => $request->no_of_pages,
        ]);

            if ($result) {
                return back()->with('success', 'Book details has been Updated');
            } else {
            return back()->with('failed', 'Books details has failed to Update');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        if (Book::find($book->id)->delete()) {
            return back()->with('success', 'Book details has been Delete');
        } else {
        return back()->with('failed', 'Books details has failed to Delete');
    }
    }
}
