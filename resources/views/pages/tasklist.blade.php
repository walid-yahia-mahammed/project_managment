@extends('layouts.app')

@section('content')
    <div id="title" class="mt-4 mb-2 d-flex">
        <lable class="col-md-10" >my tasks</lable>
        <button type="button" class="btn btn-success col-md-2" data-toggle="modal" onclick="showCreateModal()" data-target="#task-creation-Modal">create</button>
    </div>
    <div class="tasks">
        @foreach($tasks as $task)
            <x-task-card taskId="{{$task->id}}"/>
        @endforeach
    </div>
    <!-- Modal -->
    <div class="modal fade" id="task-creation-Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="ModalLabel">task create</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <form>
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
                    <button type="submit" class="btn btn-primary">Submit</button>                    
                </div>
            </form>
        </div>
    </div>
@endsection

@push('custom-scripts')
<script>
$(":submit").on('click',(e)=>{
    e.preventDefault();
})
    function showCreateModal(){
        $('[name="title"]').val('')
        $('[name="discription"]').val('')
        $("#ModalLabel").html("task create");
        $(":submit").attr('onclick','createTask()');
    }
    function showUpdateModal(id){ 
        $(":submit").attr('onclick',`updateTask(${id})`);
        $("#ModalLabel").html("task update");
        let url = '{{route("task.read", ":id")}}';
        url = url.replace(':id',id);
        $.ajax({
            type: 'GET',
            url: url,
            dataType: 'json',
            success:function(response){
                $("[name='title']").val(response.title);
                $("[name='discription']").val(response.discription);
            },
            catch(err){
                console.log(err);
            }
        });
        
    }

    function createTask(){
        console.log("hhhhhhhhhhhhhhh");
        let data = {
            "_token"    : "{{ csrf_token() }}",
            "title"       : $("[name='title']").val(),
            "discription" : $("[name='discription']").val()
        }
        $.ajax({
            type: 'POST',
            url: "{{route('task.store')}}",
            data: data,
            dataType: 'json',
            success:function(response){
                if(response){
                    location.reload();
                }
            },
            catch(err){
                console.log(err);
            }
        });
    }
    function updateTask(taskId){
        let data = {
            "_token"        :"{{ csrf_token() }}",
            "taskId"        : taskId,
            "title"         : $("[name='title']").val(),
            "discription"   : $("[name='discription']").val()
            };

        $.ajax({
            type: 'POST',
            url: "{{route('task.save')}}",
            data: data,
            dataType: 'json',
            success:function(response){
                if(response){
                    location.reload();
                }
            },
            catch(err){
                console.log(err);
            }
        });
    }
</script>
@endpush
