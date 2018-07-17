 @extends('layouts/layout') @section('title') Wellcome @endsection @section('content')

<form method="post" action="{{ action('TaskController@store') }}">
    {{csrf_field()}}
    <div class="form-row">
        <div class="col-md-8 mb-3">
            <div class="form-group">
                <label for="name">Task Name</label>
                <input name="name" type="text" class="form-control" id="name" placeholder="Task Name">

            </div>
        </div>
        <div class="col-md-8 mb-3">
            <div class="form-group">
                <label for="description">Task Description</label>
                <textarea name="description" type="text" class="form-control" id="description" placeholder="Task Description"></textarea>
            </div>
        </div>
        <div class="col-md-8 mb-3">
            <div class="form-group">
                <label for="responsible">Task Responsible</label>
                <input name="responsible" type="text" class="form-control" id="responsible" placeholder="Task Responsible">

            </div>
        </div>
        <div class="col-md-8 mb-3">
            <div class="form-group">
                <div class='input-group date' id='datetimepicker1'>
                    <label for="deadline">Task Deadline</label>
                    <input name="deadline" type='text' class="form-control" id="deadline" />
                </div>
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="row">
            <!-- This action will route to the controller -->
            <button class="btn btn-primary offset-sm-7" type="submit"> Save</button>
        </div>
    </div>
    @include ('layouts.errors')
</form>

@endsection
