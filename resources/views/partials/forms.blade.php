

@section('forms')
    <form id="doneForm" action="done/{{$task->id}}" method="POST" style="display: none">
        <input id="doneID" type="text" value="{{$task->id}}" style="display:none">
        @csrf
    </form>

    <form id="delForm" action="delete/{{$task->id}}" method="POST" style="display: none">
        @csrf
    </form>

    <form class="col-md-5" method="POST" enctype="multipart/form-data" id="editForm" style="display : none">
        {{ csrf_field() }}
        <input id="id" type="text" value="{{$task->id}}" style="display:none">
        <div class="form-group row">
            <input class="form-control" type="text" name="title" value="{{$task->title}}">
        </div>
        <h3 class="form-group row" style="padding-left: 10px">due : </h3>
        <div class="form-group row">
            <input class="form-control" type="datetime" name="due_time" value="{{$task->due_time}}">
        </div>
        <button class="btn btn-primary" id="done"><strong>Done</strong></button>
    </form>
@endsection

@section('addForm')
    <div class="col-md-4"></div>
    <form class="col-md-5" method="POST" action="tasks" id="addForm" style="display : none">
        {{ csrf_field() }}
        <input type="number" name="user_id" value="{{ Auth::user()->id }}" style="display : none">
        <div class="form-group row">Task Title : </div>
        <div class="form-group row"><input class="form-control" type="text" name="title"> </div>
        <div class="form-group row">Due Time : </div>
        <div class="form-group row"><input class="form-control" type="datetime" name="due_time"> </div>
        <div class="form-group row"><input type="submit" class="btn"></div>
    </form>
@endsection
