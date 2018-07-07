<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
            return view('welcome');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        

        // User::create('task', function (Blueprint $table) { 
        //     $table->increments('id');
        //     $table->string('name');
        //     $table->text('description');
        //     $table->string('responsible');
        //     $table->string('deadline');
        //     $table->boolean('completed');
        //     $table->timestamps();
        //  });


        // return redirect(action('UserController@store'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
            $task =  new Task();
            $task->name = $request->name;
            $task->description = $request->description;
            $task->responsible = $request->responsible;
            $task->deadline = $request->deadline;
            $task->completed = 0;
            $task->save();

            //redirect to show_all page
            return redirect(action('TaskController@show_all'));
    }

    /**
     * Show a list of all elements in storage.
     *
     */
    public function show_all()
    {
        $tasks = Task::all();
        return view('tasks_list',compact('tasks'));

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        $task = Task::find($id);
        return view('task',compact('task'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $tasks = Task::where('id', $id);
        $tasks->update($request->all());
        $task->completed = 0;
        $task->save();
        return view('task',compact('task'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        //
    }
}
