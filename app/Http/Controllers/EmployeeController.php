<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Project;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    //

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // if (isset($request->project_id) && $request->project_id !== 0)
        //     $employees = \App\Models\Employee::where('project_id', $request->project_id)->orderBy('surname')->get();

        // else
        //     $employees = \App\Models\Employee::orderBy('surname')->get();
        // $projects = \App\Models\Project::orderBy('projectName')->get();

        return view('employees.index', ['employees' => Employee::all()]);
    }



    // public function create()
    // {
    //     $projects = \App\Models\Project::orderBy('projectName')->get();
    //     return view('employees.create', ['projects' => $projects]);
    // }


    public function store(Request $request)
    {
        $this->validate($request, [
            // [Dėmesio] validacijoje unique turi būti nurodytas teisingas lentelės pavadinimas ir laukai!
            'name' => 'required',
            'surname' => 'required',
            'email' => 'required',
            'projectName' => 'required',
        ]);

        $employee = new Employee();

        $employee->fill($request->all());


        return ($employee->save() !== 1) ?
            redirect()->route('employees.index')->with('status_success', 'Employee created!') :
            redirect()->route('employees.index')->with('status_error', 'Employee was not created!');
    }


    public function show($id)
    {
        return view('employees.index', ['employee' => Employee::find($id), 'projects' => Project::all()]);
    }


    public function edit(Employee $employee)
    {
        $projects = \App\Models\Project::orderBy('projectName')->get();
        return view('$employees.edit', ['employee' => $employee, 'projects' => $projects]);
    }


    public function update($id, Request $request)
    {
        // [Dėmesio] validacijoje unique turi būti teisingas lentelės pavadinimas!
        $this->validate($request, [
            'name' => 'required',
            'surname' => 'required',
            'email' => 'required',
            'projectName' => 'required',
            'project_id'
        ]);
        $employee = Employee::find($id);
        $employee->name = $request['name'];
        $employee->surname = $request['surname'];
        $employee->email = $request['email'];
        $employee->projectName = $request['projectName'];
        $employee->project_id = $request['project_id'];
        return ($employee->save() !== 1) ?
            redirect('/sprint5/employees/')->with('status_success', 'Employee updated!') :
            redirect('/sprint5/employees/')->with('status_error', 'Employee was not updated!');
    }





    public function destroy($id)
    {
        Employee::destroy($id);
        return redirect()->route('employees.index', ['project_id' => $id->input('project_id')])->with('status_success', 'Employee deleted!');;
    }
}
