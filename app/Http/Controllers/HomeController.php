<?php

namespace App\Http\Controllers;

use App\Block;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {

		$comments = \App\Comment::latest()->where('confirmed', true)->take(3)->get();

		$carousel = Block::find(1);
		$firstblock = Block::find(2);
		$secondblock = Block::find(3);

		return view('home.index', compact('comments'), compact('carousel'))
			->with('firstblock', $firstblock)
			->with('secondblock', $secondblock);

	}
}
