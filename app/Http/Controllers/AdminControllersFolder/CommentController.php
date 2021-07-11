<?php

namespace App\Http\Controllers\AdminControllersFolder;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Comment;

class CommentController extends Controller
{
    
    public function index()
    {
        $comments = Comment::latest()->get();
        return view('admin.comments.index' , compact('comments'));
    }

    
    public function create()
    {
        //
    }

   
    public function store(Request $request)
    {
        //
    }

   
    public function show($id)
    {
        //
    }

   
    public function edit($id)
    {
        //
    }

   
    public function update(Request $request, $id)
    {
        //
    }

    
    public function destroy(Request $request)
    {   
        $id = $request->id;

        $comment = Comment::findOrFail($id);
        $comment->delete();

        return response()->json($comment);
    }

    public function getAll()
    {
        $comments = Comment::latest()->get();

        return view('admin.comments.getAll' , compact('comments'));
    }

    public function active(Request $request)
    {
        $id = $request->id;
        $comment = Comment::findOrFail($id);
        $comment->approve = 1;
        $comment->save();

        return response()->json($comment);
    }
}
