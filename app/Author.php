<?php

namespace foobooks;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    public function book() {
        # Author has many Books
        # Define a one-to-many relationship.
        return $this->hasMany('\foobooks\Book');
    }
}
