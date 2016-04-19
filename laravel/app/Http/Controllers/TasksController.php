<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\tasks;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;

class TasksController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $tasks = tasks::paginate(15);
       #print_r($tasks);
        return response()->json($tasks);

        #return view('tasks.tasks.index', compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('tasks.tasks.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        
        tasks::create($request->all());

        Session::flash('flash_message', 'tasks added!');

        return redirect('tasks/tasks');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return Response
     */
    public function show($id)
    {
        $task = tasks::findOrFail($id);

        return view('tasks.tasks.show', compact('task'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $task = tasks::findOrFail($id);

        return view('tasks.tasks.edit', compact('task'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     *
     * @return Response
     */
    public function update($id, Request $request)
    {
        
        $task = tasks::findOrFail($id);
        $task->update($request->all());

        Session::flash('flash_message', 'tasks updated!');

        return redirect('tasks/tasks');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        tasks::destroy($id);

        Session::flash('flash_message', 'tasks deleted!');

        return redirect('tasks/tasks');
    }

}
