<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Project;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;

class ProjectController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $project = Project::paginate(15);

        return view('directory.project.index', compact('project'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('directory.project.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        
        Project::create($request->all());

        Session::flash('flash_message', 'Project added!');

        return redirect('project/project');
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
        $project = Project::findOrFail($id);

        return view('directory.project.show', compact('project'));
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
        $project = Project::findOrFail($id);

        return view('directory.project.edit', compact('project'));
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
        
        $project = Project::findOrFail($id);
        $project->update($request->all());

        Session::flash('flash_message', 'Project updated!');

        return redirect('project/project');
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
        Project::destroy($id);

        Session::flash('flash_message', 'Project deleted!');

        return redirect('project/project');
    }

}
