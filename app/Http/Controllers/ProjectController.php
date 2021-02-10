<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{

    public function index()
    {
        return view('projects.index', ['projects' => Project::orderBy('projectName')->get()]);
    }



    public function create()
    {
        return view('projects.create');
    }



    public function store(Request $request)
    {
        $this->validate($request, [
            // [Dėmesio] validacijoje unique turi būti nurodytas teisingas lentelės pavadinimas ir laukai!
            'projectName' => 'required|unique:projects',

        ]);

        $project = new Project();

        $project->fill($request->all());


        return ($project->save() !== 1) ?
            redirect()->route('project.index')->with('status_success', 'Project created!') :
            redirect()->route('project.index')->with('status_error', 'Project was not created!');
    }




    public function show($id)
    {
        return view('project', ['project' => Project::find($id)]);
    }


    public function edit(Project $project)
    {
        return view('projects.edit', ['project' => $project]);
    }


    public function update($id, Request $request)
    {
        $this->validate($request, [
            // [Dėmesio] validacijoje unique turi būti nurodytas teisingas lentelės pavadinimas ir laukai!
            'projectName' => 'required|unique:projects'

        ]);

        $project = Project::find($id);
        $project->projectName = $request['projectName'];

        return ($project->save() !== 1) ?
            redirect()->route('project.index')->with('status_success', 'project updated!') :
            redirect()->route('project.index')->with('status_error', 'project was not updated!');
    }


    public function destroy($id)
    {
        Project::destroy($id);
        return redirect()->route('project.index')->with('status_success', 'Project deleted!');
    }
}
