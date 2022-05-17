
<div class="card mb-4">
    <div class="card-header">
    {{$task->title}}
    <span class="badge badge-pill {{$stateclass}}">{{$task->state}}</span>
    </div>
    <div class="card-body d-flex">
        <div class="info col-md-10">
            <h5 class="card-title">{{$task->discription}}</h5>
            <p class="card-text">task last update from {{$task->since[1] }} {{$task->since[0] }}</p>
        </div>
        <div class="options col-md-2">
            <button type="button" class="btn btn-danger mb-1" id="delete">delete</button>
            <button type="button" class="btn btn-primary" id="update">update</button>
        </div>
    </div>
</div>