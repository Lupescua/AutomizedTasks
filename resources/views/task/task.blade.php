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