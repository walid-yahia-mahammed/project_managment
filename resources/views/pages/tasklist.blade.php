@extends('layouts.app')

@section('content')
    <div id="title" class="mt-4 mb-2 d-flex">
        <lable class="col-md-10" >my tasks</lable>
        <button type="button" class="btn btn-success col-md-2" data-toggle="modal" data-target="#task-creation-Modal">create</button>
    </div>
    <div class="divider"></div>
    @foreach($tasks as $task)
        <x-task-card taskId="{{$task->id}}"/>
    @endforeach
    <!-- Modal -->
    <div class="modal fade" id="task-creation-Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">task creation</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="POST" action="{{route('task.store')}}">
                @csrf
                <div class="modal-body">
                        <div class="form-group">
                            <label for="title">task title</label>
                            <input name="title" type="text" class="form-control" placeholder="Enter task title">
                        </div>
                        <div class="form-group">
                            <label for="discription">task discription</label>
                            <input type="text" name="discription" class="form-control" placeholder="Enter task discription">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Submit</button>                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection