<?php

namespace foobooks;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    public function books() {
        # Author has many Books
        # Define a one-to-many relationship.
        return $this->hasMany('\foobooks\Book');
    }
	
	public static function authorsForDropDown(){
		
		$authors = \foobooks\Author::orderBy('last_name', 'ASC')->get();
		$authors_for_dropdown = [];
		
		foreach($authors as $author){
			$authors_for_dropdown[$author->id] = $author->last_name.', '.$author->first_name;
		}
		return $authors_for_dropdown;
	}
}
