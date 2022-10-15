<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasks=Task::where('user_id',Auth::user()->id)->orderBy('created_at','asc')->paginate(5);
        return view('tasks.index', compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tasks.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Task $task)
    {
        $task->title=$request->input('title');
        $task->description=$request->input('description');
        $task->end_date=$request->input('endDate');
        $task->user_id=Auth::user()->id;
        $task->status='En cours';
        $task->save();
        return redirect()->route('tasks.index')->with('success','Tâche ajoutée avec succès');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $task=Task::find($id);
        return view ('tasks.edit', compact('task'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $task=Task::find($id);
        $task->title=$request->title;
        $task->description=$request->description;
        $task->end_date=$request->endDate;
        $task->save();
        return redirect()->route('tasks.index')->with("success","Tâche modifiée avec succès");

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $task=Task::find($id);
        $task->delete();
        return redirect()->route('tasks.index')->with("success","Tâche supprimée avec succès");

    }
    public function changeStatus(Request $request, Task $task)
    {
        if($task->status=="En cours")
        {
            $task->status="Terminee";
        }
        else {
            $task->status="En cours";
        }
        $task->save();
        return redirect()->route('tasks.index');
    }
}
