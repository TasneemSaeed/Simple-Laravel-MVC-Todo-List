@extends('layouts.app')

@section('content')
    <script src="/js/carousel.js"></script>
    <div class="container">
        <div class="row justify-content-center" style="text-align:center">
            <div>
                <h2>Hello {{ Auth::user()->name }} !</h2>
            </div>
            <h3>Here are your tasks :</h3>
        </div>
        <hr>
        <div class="carousel tasks row justify-content-center">
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-1 hideInfo" id="dn" style="">
                    <button class="btn btn-primary" id='edit' style="margin-top:30px; height:30px" title="Edit Task">
                        <span class="glyphicon glyphicon-edit"></span>
                    </button><br>
                    <button class="btn btn-primary" id="del" style="margin-top:5px; height:30px" title="Delete Task">
                        <span class="glyphicon glyphicon-remove-sign"></span>
                    </button><br>
                    <button class="btn btn-primary" id="taskDone" style="margin-top:5px; height:30px" title="Mark Task As Done">
                        <span class="glyphicon glyphicon-check"></span>
                    </button>
                </div>
                @foreach ($tasks as $key => $task)
                    <div class="showTask col-md-9 hideInfo">
                        <div class="col-md-7">
                            <h3> {{$task->title}} </h3>
                            <h3><strong style="padding-left: 10px"> due : </strong><br></h3>
                            <h3>{{$task->due_time}} </h3>
                        </div>
                        <img id="shwImg" class="img-responsive" src="{{ url('/Media/icons8-checkmark.svg') }}" style="display:none">
                        @if ($task->is_done == 1)
                            <img class="img-responsive" src="{{ url('/Media/icons8-checkmark.svg') }}" alt="">
                            <script>
                                var btns = document.getElementById('dn');
                                btns.style.visibility='hidden';
                            </script>
                        @endif
                    </div>
                @endforeach
                @include('partials.forms')
                @yield('forms')
            </div>
            <div class="row paginate">
                {{$tasks->links('partials.pagination')}}
            </div>
        </div>
        <hr>
        <div class="content row justify-content-center" id="hide">
            <div class="btns">
                <button class="btn btn-primary" id="add" style="width:115px"><strong> Add Task</strong></button>
                <button class="btn btn-primary"><strong> Search Tasks</strong></button>
            </div>
        </div>

        @yield('addForm')
        @if ($errors->any())
        @foreach ($errors->all() as $error)
            <div class="alert alert-danger">{{$error}}</div>
        @endforeach
        @endif
    </div>
    <script src="/js/jquery-3.4.1.js"></script>
    <script src="/js/home.js" type="text/javascript"></script>
@endsection
