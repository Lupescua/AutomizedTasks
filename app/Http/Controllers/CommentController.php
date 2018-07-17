<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;
use App\Comment;

class CommentController extends Controller
{
      /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Task $task)
    {

        $this->validate(request(),['body'=>'required|min:2']);
        $task->addComment(request('body'));

        return back();
    }
}
