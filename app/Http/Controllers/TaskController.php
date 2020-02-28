<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Task;

class TaskController extends Controller
{
    public function index(){
        return redirect('/home');
    }

    public function create(){
        return view('task.create');
    }

    public function store(){
        $data = request()->validate(
            ['title' => 'required',
                'description' => 'required']);
        $task = auth()->user()->tasks()->create($data);

        return redirect('/home');
    }

    public function show(Task $task){
        return view('task.show', compact('task'));
    }

    public function edit(Task $task){
        return view('task.edit', compact('task'));
    }

    public function update(Task $task){
        $data = request()->validate(['title' => 'required',
            'description' => 'required']);

        $task->update($data);

        return redirect('/home');
    }

    public function destroy(Task $task){
        $task->delete();

        return redirect('/home');}

    public function complete(Task $task){
        $task->setAttribute('completed', 1);
        $task->save();

        return redirect('/home');
    }
}
