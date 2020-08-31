<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Book;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //native: select * from books;
        //cara laravel :
        //return Book::get();//dipanggil di atas (import) menggunakan use
        //atau 
        //return Book::all();//all tanpa filter kalo get misalnya where apa where id sekian
        /*$book = Book::all();
        {
            if($book){
                return response(["message" => "Show data success.", "data" => $book],200);
            }else{
                return response(["message" => "Data not found.", "data" => null], 404);
            }
        }*/
        $book = Book::get();
        {
            if($book && $book -> count() > 0){
                return response(["message" => "Show data success.", "data" => $book],200);
            }else{
                return response(["message" => "Data not found.", "data" => null], 404);
            }
        }
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)//$request biar bisa dari kiriman user
    {
        //native: insert into blalblabla
        $book = Book::create([
            "title" => $request->title,
            "description" => $request->description,
            "author" => $request->author,
            "publisher" => $request->publisher,
            "date_of_issue" => $request->date_of_issue,
        ]);

        return response(["message" => "Create data success.", "data" => $book],201);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $book = Book::find($id);
        {
            if($book && $book -> count() > 0){
                return response(["message" => "Show data success.", "data" => $book],200);
            }else{
                return response(["message" => "Data not found.", "data" => null], 404);
            }
        }
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $book = Book::find($id);
        if($book){
            $book->title = $request->title;
            $book->description = $request->description;
            $book->author = $request->author;
            $book->publisher = $request->publisher;
            $book->date_of_issue = $request->date_of_issue;

            $book->save();

            //return response([],204);
            return response(["message" => "Update data success.", "data" => $book],200);
    }else{
        return response(["error" => "Update data field.", ], 406);
    }
}

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $book = Book::find($id);
        if($book){
            $book->delete();

            return response([],204);
        }else{
            return response(["error" => "Remove data field."],406);
        }

        //return Book::destroy($id);
    }
}
