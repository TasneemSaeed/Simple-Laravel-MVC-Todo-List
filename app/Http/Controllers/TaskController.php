<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class TaskController extends Controller
{
    Public function index(){
        $tasks = Task::where('user_id' , Auth::id())->orderBy('due_time')->paginate(1);
        $search = false;
        return view('home',compact('search','tasks'));
    }

    public function show(Request $request,$criteria)
    {
        $tasks = Task::where($criteria , $request->all());
        $search = true;
        return view('partials.search',compact('search','tasks'));
    }

    public function store(Request $request){

        $task = Task::create($request->all());
        return Redirect::back();
    }


    public function edit(Request $request,Task $task){

        $task->update(array(
            'title' => $request->input('title'),
            'due_time' => $request->input('due_time')
        ));

        return Redirect::back();

    }

    public function destroy(Task $task)
    {
        $task->delete();
        return Redirect::back();
    }

    public function taskDone(Request $request,Task $task)
    {
        $task->update(array(
            'is_done' => 1,
        ));

        return Redirect::back();
    }

}
