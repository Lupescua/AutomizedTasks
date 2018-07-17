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
        

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate(request(),[
            'name'=>'required',
            'description'=>'required',
            'responsible'=>'required',
            'deadline'=>'required',
        ]);
        Task::create(request(['name','description','responsible','deadline']));
        //redirect to show_all page
        return redirect(action('TaskController@show_all'));
    }

    /**
     * Show a list of all elements in storage.
     *
     */
    public function show_all()
    {
        //show all in descending order
        $tasks = Task::orderBy('created_at','desc')->get();
        
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
    public function update()
    {        
        $task = Task::find($id);
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
