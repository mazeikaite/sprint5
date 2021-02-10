@extends('layouts.app')
@section('content')

   {{-- Database error/success display logic
 @if (session('status_success'))
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

 <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Redaguoti darbuotoja:</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('employees.update', $employee->id) }}">
                        @csrf @method("PUT")
                        <div class="form-group">
                            <label>Vardas: </label>
                            <input type="text" name="name" class="form-control" value="{{ $employee->name }}">
                        </div>
                        <div class="form-group">
                            <label>Pavardė: </label>
                            <input type="text" name="surname" class="form-control" value="{{ $employee->surname }}"> 
                        </div>
                        <div class="form-group">
                            <label>Email: </label>
                            <input type="text" name="email" class="form-control" value="{{ $employee->email }}"> 
                        </div>
                        <div class="form-group">
                            <label>Projekto pavadinimas: </label>
                            <input type="text" name="projectName" class="form-control" value="{{ $employee->projectName }}"> 
                        </div>
                        
                        <button type="submit" class="btn btn-primary">Pakeisti</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
