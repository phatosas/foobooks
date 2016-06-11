<?php

namespace foobooks;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    public function books() {
		return $this->belongsToMany('\foobooks\Book')->withTimestamps();
	}
	
	public static function getTagsForCheckboxes() {

		$tags = \foobooks\Tag::orderBy('name','ASC')->get();

		$tagsForCheckboxes = [];

		foreach($tags as $tag) {
			$tagsForCheckboxes[$tag['id']] = $tag['name'];
		}

		return $tagsForCheckboxes;

	}
}
