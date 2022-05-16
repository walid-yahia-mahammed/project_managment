@extends('layouts.app')

@section('content')
    <div id="title" class="mt-4 mb-2 d-flex">
        <lable class="col-md-10" >my tasks</lable>
        <button type="button" class="btn btn-success col-md-2" data-toggle="modal" data-target="#task-creation-Modal">create</button>
    </div>
    <div class="divider"></div>
    <div class="card">
        <div class="card-header">
        task title
        </div>
        <div class="card-body d-flex">
            <div class="info col-md-10">
                <h5 class="card-title">task description</h5>
                <p class="card-text">task last update and state</p>
            </div>
            <div class="options col-md-2">
                <button type="button" class="btn btn-danger mb-1" id="delete">delete</button>
                <button type="button" class="btn btn-primary" id="update">update</button>
            </div>
        </div>
    </div>
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
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label for="title">task title</label>
                            <input name="title" type="text" class="form-control" placeholder="Enter task title">
                        </div>
                        <div class="form-group">
                            <label for="discription">task discription</label>
                            <input type="text" name="discription" class="form-control" placeholder="Enter task discription">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
@endsection