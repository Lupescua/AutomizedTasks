@extends('layout') @section('title') Tasks List @endsection @section('content')

<!--content -->
<form >
    {{csrf_field()}}
<table class="table table-dark">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">First</th>
            <th scope="col">Last</th>
            <th scope="col">Handle</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($tasks as $task)
        <tr>
            <th scope="row">2</th>
            <td><a  type="submit" href="/tasks/{{$task->id}}">{{$task->name}}</a></td>
            <td>{{$task->description}}</td>
            <td>{{$task->responsible}}</td>
            <td>{{$task->deadline}}</td>
            @if ($task->completed == 1)
            <td>Task completed</td>
            @else
            <td>Task not completed</td>
            @endif
        </tr>
        @endforeach
    </tbody>
</table>
</form>
@endsection
