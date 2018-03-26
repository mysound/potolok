<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Block;
use Illuminate\Http\Request;

class SettingsController extends Controller
{

	public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $comments = Comment::where('confirmed', '0')->get();
        $blocks = Block::all();
    	return view('settings.index', compact('blocks', 'comments'));
    }

    public function show($id) 
    {
        $block = Block::find($id);
        return view('settings.block', compact('block'));
    }
}
