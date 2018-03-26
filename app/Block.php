<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Block extends Model
{
    public function elements()
    {
    	return $this->hasMany(Element::class);
    }

    public function addElement($title, $body, $image)
    {
    	$this->elements()->create(compact('title', 'body', 'image'));
    }
}
