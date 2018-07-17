@extends('layouts/layout') @section('title') Tasks List @endsection @section('content')

<div class="form-group">
            <!-- This action will route to the controller -->
            
            <button class="btn" type="button"><a href="/create">Create new task</a></button>

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
        @foreach ($tasks as $task)
        <tr>
            <th scope="row">2</th>
            <td><a  href="/tasks/{{$task->id}}">{{$task->name}}</a></td>
            <td>{{$task->description}}</td>
            <td>{{$task->responsible}}</td>
            <td>{{$task->deadline}}</td>
            @if ($task->completed == 1)
            <td>Task completed</td>
            @else
            <td>Task not completed</td>
            @endif
            <td>{{$task->created_at->toFormattedDateString()}}</td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection
