 @extends('layouts/layout') @section('title') Wellcome @endsection @section('content')

<form method="" action="">
    {{method_field('PATCH')}} {{csrf_field()}}
    <div class="form-row">
        <div class="col-md-8 mb-3">
            <div class="form-group">
                <input name="name" type="text" class="form-control" id="name" placeholder="Name of Task" value="{{$task->name}}">

            </div>
        </div>
        <div class="col-md-8 mb-3">
            <div class="form-group">
                <textarea name="description" type="text" class="form-control" id="description" placeholder="{{$task->description}}" value="{{$task->description}}"></textarea>

            </div>
        </div>
        <div class="col-md-8 mb-3">
            <div class="form-group">
                <input name="responsible" type="text" class="form-control" id="responsible" placeholder="{{$task->responsible}}" value="{{$task->responsible}}">

            </div>
        </div>
        <div class="col-md-8 mb-3">
            <div class="form-group">
                <div class='input-group date' id='datetimepicker'>
                    <input name="deadline" type='text' class="form-control" id="deadline" placeholder="{{$task->deadline}}" value="{{$task->deadline}}"
                    />
                </div>
            </div>
        </div>
        <div class="col-md-8 mb-3">
            <div class="form-group">
                <label class="form-check-label" for="completed">Completed</label>
                <input name="completed" type="checkbox" class="form-control" id="completed" placeholder="Name of Task" value="{{$task->completed}}">

            </div>
        </div>
        <div class="col-md-8 mb-3">
            <div class="form-group">
                <label class="form-check-label">Created at: {{$task->created_at->toFormattedDateString()}}</label>
            </div>
        </div>

    </div>
    <div class="row">
        <!-- This action will route to the controller -->

        <input type="hidden" id="custId" name="custId" value="{{$task->id}}">
        <button class="btn btn-primary" type="submit"> Save</button>
    </div>
</form>
<div class="comments">
    @foreach($task->comments as $comment)
    <li class="list-group-item">
        <strong>
            {{$comment->created_at->diffForHumans()}}:&nbsp;
        </strong>
        {{$comment->body}}
    </li>
    @endforeach
</div>

<div class="card">
    <div class="card-block">
        <form method="post" action="/tasks/{{$task->id}}/comments">
            {{csrf_field()}}
            <div class="form-group">
                <textarea name="body" class="form-control" placeholder="Your comment here" required></textarea>
            </div>
            <div class="form-group">
                    <!-- This action will route to the controller -->
                    <button class="btn btn-primary" type="submit">Add Comment</button>
            </div>
        </form>
    </div>
</div>

    @include ('layouts.errors')

@endsection
