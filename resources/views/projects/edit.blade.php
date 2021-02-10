@extends('layouts.app')
@section('content')

 {{-- DB klaidu logika    {{-- Database error/success display logic --}}
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

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Redaguoti projekta</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('project.update', $project->id) }}">
                        @csrf @method("PUT")
                        <div class="form-group">
                            <label for="">Pavadinimas</label>
                            <input type="text" name="projectName" class="form-control" value="{{ $project->projectName }}">
                        </div>
                        
                        <button type="submit" class="btn btn-primary">Pakeisti</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> 
@endsection
