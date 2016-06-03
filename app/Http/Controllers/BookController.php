<?php

namespace foobooks\Http\Controllers;

use Illuminate\Http\Request;

use foobooks\Http\Requests;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getIndex()
    {
		$books = \foobooks\Book::orderBy('id', 'desc')->get();
        return view('books.index')->with('books',$books);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getCreate()
    {
		return view('books.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function postCreate(Request $request)
    {
		$this->validate($request, [
			'title' => 'required|min:3',
			'author' => 'required|min:3',
			'published' => 'required|min:4|date_format:Y',
			'cover' => 'required|url',
			'purchase_link' => 'required|url'
		]);
		
		$book = new \foobooks\Book();
		$book->title = $request->title;
		$book->author = $request->author;
		$book->published = $request->published;
		$book->cover = $request->cover;
		$book->purchase_link = $request->purchase_link;
		$book->save();
		
		\Session::flash('message', 'Your book was added');
		
		return redirect('/books');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getShow($id)
    {
        $book =\foobooks\Book::find($id);
		
		return view('books.show')->with('book',$book);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getEdit($id)
    {
        $book = \foobooks\Book::find($id);
		
		return view('books.edit')->with('book',$book);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function postEdit(Request $request)
    {
        $book = \foobooks\Book::find($request->id);
		
		$book->title = $request->title;
		$book->author = $request->author;
		$book->published = $request->published;
		$book->cover = $request->cover;
		$book->purchase_link = $request->purchase_link;
		$book->save();
		
		\Session::flash('message', 'Your book has been updated');
		return redirect('/books/show/'.$request->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
