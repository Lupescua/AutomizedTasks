<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;
use Carbon\Carbon;
use App\Repositories\Tasks;
use App\Http\Requests\RegistrationForm;

class TaskController extends Controller
{
    public function __construct()  
    {
        
    $this->middleware('auth');
    }
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
        auth()->user()->publish(
            new Task(request(['name','description','responsible','deadline']))
        );

        sessions()->flash('message','Your task has been created');
        
        // I moved the create in the Model
        // Task::create([
        //     'name' => request('name'),
        //     'description' => request('description'),
        //     'responsible' => request('responsible'),
        //     'deadline' => request('deadline'),
        //     'user_id' => auth()->id()
        //     ]);

        
        //redirect to show_all page
        return redirect(action('TaskController@show_all'));
    }

    /**
     * Show a list of all elements in storage.
     *
     */
    public function show_all(Tasks $tasks )
    {
        // dd($tasks);
        //show all in descending order
        // $tasks = Task::orderBy('created_at','desc')->get();
        // $tasks = (new \App\Repositories\Tasks)->all();
        
        $tasks = Task::latest();
    
        if($month = request('month')){
            $tasks->whereMonth('created_at',Carbon::parse($month)->month);
        }
        if($year = request('year')){
            $tasks->whereYear('created_at',Carbon::parse($year)->year);
        }

        $tasks = $tasks->get();

        // $archives = Task::archives();
        // return view('tasks_list',compact('tasks','archives'));
        // I did not use this method because I used the App\Providers\AppServiceProvider.php
     
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

        sessions()->flash('message','Your task has been updated');
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
