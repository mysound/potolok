<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Element extends Model
{
    protected $fillable = [
		'block_id', 
		'title', 
		'body',
		'image'
	];
	
    public function block()
    {
    	return $this->belongsTo(Block::class);
    }
}
