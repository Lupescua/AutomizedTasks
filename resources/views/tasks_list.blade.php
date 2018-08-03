@extends('layouts/layout') @section('title') Tasks List @endsection @section('content')
<div class="form-group">
            <!-- This action will route to the controller -->
            
            @if (Auth::check())
            <button class="btn" type="button"><a href="/create">Create new task</a></button>
            @endif
          
     
           
</div>
<!--content -->
<table class="table table-dark">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">First</th>
            <th scope="col">Last</th>
            <th scope="col">Handler</th>
            <th scope="col">Deadline</th>
            <th scope="col">Status</th>
            <th scope="col">Created at</th>

        </tr>
    </thead>
    <tbody>
    @if ($tasks)
        @include ('task/task')
    @endif
    </tbody>
</table>

@endsection
