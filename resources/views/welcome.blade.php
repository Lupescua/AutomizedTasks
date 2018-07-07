 @extends('layout') @section('title') Wellcome @endsection @section('content')
 
<form method="post" action="{{ action('TaskController@store') }}">
    {{csrf_field()}}
    <div class="form-row">
        <div class="col-md-8 mb-3">
            <div class="form-group">
                <input name="name" type="text" class="form-control" id="validationDefault01" placeholder="Name of Task" value="">

            </div>
        </div>
        <div class="col-md-8 mb-3">
            <div class="form-group">
                <textarea name="description" type="text" class="form-control" id="validationDefault01" placeholder="Task Description" value=""></textarea>

            </div>
        </div>
        <div class="col-md-8 mb-3">
            <div class="form-group">
                <input name="responsible" type="text" class="form-control" id="validationDefault01" placeholder="Task Responsible" value="">

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
    <div class="row">
        <!-- This action will route to the controller -->
        <button class="btn btn-primary" type="submit"> Save</button>
    </div>
</form>
@endsection
