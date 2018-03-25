<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'create', 'store']]);
    }

    public function index()
    {
        $comments = Comment::latest()->where('confirmed', true)->get();
        return view('comments.index', compact('comments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('comments.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate(request(), [
            'name' => 'required|min:2',
            'body' => 'required|min:2'
        ]);

        Comment::create([
            'name' => request('name'),
            'body' => request('body')
        ]);

        return redirect('/');
    }

    public function allcomm()
    {
        $comments = Comment::latest()->get();
        return view('settings.comments.index', compact('comments'));
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
    }

    public function publish(Request $request, Comment $comment)
    {
        if ($comment->confirmed) {
            $comment->confirmed = false;
        } else {
            $comment->confirmed = true;
        }
        $comment->save();
        return redirect('/settings/comments');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Comment $comment)
    {
        return view('settings.comments.view', compact('comment'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comment $comment)
    {
        $this->validate(request(), [
            'body' => 'required|min:2'
        ]);

        $comment->body = request('body');
        $comment->save();

        return redirect('/settings/comments');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment)
    {
        $comment->delete();

        return redirect('/settings/comments');
    }
}
