<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use App\Models\Type;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Book::all();
        // dd($books[1]->type->name);
        // dd($books[1]->author->name);
        $b = [];
        foreach ($books as $book) {
            $b[] = [
                'name' => $book->name,
                'pagecount' => $book->pagecount,
                'authorName' => $book->author->full_name ,
                'typeName' => $book->type->name
            ];
        }
        return response()->json($b, 200);
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

    public function booksByTypeId($id){
        //adott katgória könyvei
        $books = Type::find($id)->books;
        return response()->json($books, 200);
    }

    public function typeByBookId($id){
        $type = Book::find($id)->type->name;
        // return response()->json($type, 200);
        return response()->json(['typeName'=>$type], 200);

    }

    public function booksByAuthorName($name, $surname){
        // $books = Author::where('name', "=", $name)->first()->books ?? "Nincs ilyen szerző";
        // $books = Author::where('name', "=", $name)->first();
        $books = Author::where('name', "=", $name)
            ->where('surname', "=", $surname)
            ->first();

        if($books == null){
            return response()->json(['message' => "Nincs ilyen szerző"], 400);
        }
        else{
            return response()->json($books->books, 200);
        }


    }
}
