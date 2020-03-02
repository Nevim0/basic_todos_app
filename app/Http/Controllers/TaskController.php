<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use \App\Task;

class TaskController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $tasks = auth()->user()->tasks;

        return view('home', compact('tasks'));
    }

    public function create(){
        $task = new Task();
        return view('task.create', compact('task'));
    }

    public function store(){
        $data = request()->validate(
            ['title' => 'required',
            'description' => 'required']);
        auth()->user()->tasks()->create($data);

        return redirect('/tasks');
    }

    public function show(Task $task){
        if($this->cannot_access($task))
            return redirect('/tasks');

        return view('task.show', compact('task'));
    }

    public function edit(Task $task){
        if($this->cannot_access($task))
            return redirect('/tasks');

        return view('task.edit', compact('task'));
    }

    public function update(Task $task){
        if($this->cannot_access($task))
            return redirect('/tasks');

        $data = request()->validate(
            ['title' => 'required',
            'description' => 'required']);
        $task->update($data);
        return redirect('/tasks/'.$task->getKey());
    }

    public function destroy(Task $task){
        if($this->cannot_access($task))
            return redirect('/tasks');

        $task->delete();
        return redirect('/tasks');}

    public function complete(){
        $task = Task::find(request()->id);
        $task->completed = 1;
        $task->save();

        return redirect('/tasks');
    }

    protected function cannot_access($task){
        return Gate::denies('access', $task);
        }
}
