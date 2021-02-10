@extends('layouts.app')
@section('content')

 {{-- DB klaidu logika --}}    {{-- Database error/success display logic --}}
 {{-- @if (session('status_success'))
 <p style="color: green"><b>{{ session('status_success') }}</b></p>
 @else
 <p style="color: red"><b>{{ session('status_error') }}</b></p>
 @endif


 @if ($errors->any())
 <div>
     @foreach ($errors->all() as $error)
         <p style="color: red">{{ $error }}</p>
     @endforeach
 </div>
 @endif  --}}

 {{-- <div class="card">
         {{-- filtras  --}}
    {{-- <div class="card-header ">
        <div class="mr-auto pull-left">
            <form class="form-inline" action="{{ route('employees.index') }}" method="GET">
                <select name="project_id" id="" class="form-control">
                    <option value="" selected disabled>Pasirinkite projektą klientų filtravimui:</option>
                    @foreach ($projects as $project)
                    <option value="{{ $project->id }}" 
                        @if($project->id == app('request')->input('project_id')) 
                            selected="selected" 
                        @endif>
                        {{ $project->projectName }}
                    </option>
                    @endforeach
                </select>
                <button type="submit" class="btn btn-primary">Pasirinkti</button>
            </form>
        </div>


    </div> --}}

 <div class="card-body">
    @if($errors->any())
    <h4 style="color: red">{{$errors->first()}}</h4>
    @endif
    <table class="table">
        <thead>
            <tr>
                <th>Vardas</th>
                <th>Pavardė</th>
                <th>Email</th>
                <th>Projekto pavadinimas</th>
                <th>Veiksmai</th>
            </tr>
        </thead>
        @foreach ($employees as $employee)
        <tr>
            <td>{{ $employee->name }}</td>
            <td>{{ $employee->surname }}</td>
            <td>{{ $employee->email }}</td>
            <td>{{ $employee->project->projectName}}</td>
            <td>
                <form action={{ route('employee.destroy', $employee->id) }} method="POST">
                    <a class="btn btn-success" href={{ route('employee.edit', $employee->id) }}>Redaguoti</a>
                    @csrf @method('delete')
                    <input type="submit" class="btn btn-danger" value="Trinti"/>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    {{-- <div>
        <a href="{{ route('employees.create') }}" class="btn btn-success">Pridėti</a>
    </div> --}}
 </div>
</div>
@endsection
