<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\BlogComment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Whoops\Exception\ErrorException;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'username' => 'required|string',
            'email' => 'required|email|unique:blog_comments,id',
            'user_id' => 'nullable|exists:users,id',
            'website' => 'nullable',
            'comment' => 'nullable',

        ]);

        $comment = new BlogComment();
        $comment->username = $request->username;
        $comment->email = $request->email;
        if (Auth::user()) {
            $comment['user_id'] = auth()->user()->id;
        } else {
            $comment['user_id'] = null;
        }
        $comment->website = $request->website;
        $comment->body = $request->body;
        $blog = Blog::find($request->input('blog_id'));
        $blog->comments()->save($comment);

        return back()->with('success_message', 'Comment summited successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, Request $request)
    {
        $comment = BlogComment::where('id', $id)->first();
        $blog = Blog::first();
        return view('dashboard.blog.update-comment', compact('comment', 'blog'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // dd($request->all());
        $data = $request->validate([
            'username' => 'required|string',
            'email' => 'required|email',
            'user_id' => 'nullable|exists:users,id',
            'website' => 'nullable',
            'comment' => 'nullable',
        ]);


        $comment = BlogComment::where('id', $id)->first();
        $comment->username = $request->username;
        $comment->email = $request->email;
        $comment['user_id'] = auth()->user()->id;
        $comment->website = $request->website;
        $comment->body = $request->body;
        $blog = Blog::find($comment->blog_id);
        $comment->update();

        return redirect()->route('blog.show', $blog->id)->with('success_message', 'Comment updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        BlogComment::where('id', $id)->delete();
        return back()->with('success_message', 'Your comment has been removed');
    }
}
