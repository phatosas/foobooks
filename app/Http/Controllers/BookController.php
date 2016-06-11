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
		$books = \foobooks\Book::with('author')->orderBy('id', 'desc')->get();
        return view('books.index')->with('books',$books);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getCreate()
    {
		$authors_for_dropdown = \foobooks\Author::authorsForDropDown();
		return view('books.create')->with('authors_for_dropdown', $authors_for_dropdown);
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
			'published' => 'required|min:4|date_format:Y',
			'cover' => 'required|url',
			'purchase_link' => 'required|url'
		]);
		
		$book = new \foobooks\Book();
		$book->title = $request->title;
		$book->author_id = $request->author_id;
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
        $book = \foobooks\Book::with('tags')->find($id);
		
		$authors_for_dropdown = \foobooks\Author::authorsForDropDown();


		$tags_for_checkbox = \foobooks\Tag::getTagsForCheckboxes();

    /*
    Create a simple array of just the tag names for tags associated with this book;
    will be used in the view to decide which tags should be checked off
    */
    $tags_for_this_book = [];
    foreach($book->tags as $tag) {
        $tags_for_this_book[] = $tag->id;
    }
    # Results in an array like this: $tags_for_this_book['novel','fiction','classic'];

    return view('books.edit')
        ->with([
            'book' => $book,
            'authors_for_dropdown' => $authors_for_dropdown,
            'tags_for_checkbox' => $tags_for_checkbox,
            'tags_for_this_book' => $tags_for_this_book,
        ]);

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
		$book->author_id = $request->author_id;
		$book->published = $request->published;
		$book->cover = $request->cover;
		$book->purchase_link = $request->purchase_link;
		
		# If there were tags selected...
		if($request->tags) {
			$tags = $request->tags;
		}
		# If there were no tags selected (i.e. no tags in the request)
		# default to an empty array of tags
		else {
			$tags = [];
		}		
		$book->tags()->sync($tags);
		
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
    public function getDelete($id)
    {
        $book =\foobooks\Book::find($id);
		$book->tags()->sync([]);
		
		$book->delete();
		\Session::flash('flash_message','The book has been deleted');
		return redirect('/books');
    }
}
