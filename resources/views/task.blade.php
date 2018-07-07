@extends('layout') @section('title') Wellcome @endsection @section('content')
 
 <form method="post" action="">
     {{csrf_field()}}
     <div class="form-row">
         <div class="col-md-8 mb-3">
             <div class="form-group">
                 <input name="name" type="text" class="form-control" id="name" placeholder="Name of Task" value="{{$task->responsible}}">
 
             </div>
         </div>
         <div class="col-md-8 mb-3">
             <div class="form-group">
                 <textarea name="description" type="text" class="form-control" id="description" placeholder="Task Description" value="{{$task->description}}"></textarea>
 
             </div>
         </div>
         <div class="col-md-8 mb-3">
             <div class="form-group">
                 <input name="responsible" type="text" class="form-control" id="responsible" placeholder="Task Responsible" value="{{$task->responsible}}">
 
             </div>
         </div>
         <div class="col-md-8 mb-3">
             <div class="form-group">
                 <div class='input-group date' id='datetimepicker1'>
                     <input name="deadline" type='text' class="form-control" id="deadline" value="{{$task->deadline}}" />
                 </div>
             </div>
         </div>
         <div class="col-md-8 mb-3">
             <div class="form-group">
    <label class="form-check-label" for="completed">Completed</label>
                 <input name="completed" type="checkbox" class="form-control" id="completed" placeholder="Name of Task" value="{{$task->completed}}">
 
             </div>
         </div>
     </div>
     <div class="row">
         <!-- This action will route to the controller -->
         
         <input type="hidden" id="custId" name="custId" value="{{$task->id}}">
         <button class="btn btn-primary" type="submit"> Save</button>
     </div>
 </form>
 @endsection
 