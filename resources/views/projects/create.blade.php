@extends('layouts.app')
@section('content')

    {{-- DB klaidu logika --}}    {{-- Database error/success display logic --}}
    {{-- @if (session('status_success'))
    <p style="color: green"><b>{{ session('status_success') }}</b></p>
    @else
    <p style="color: red"><b>{{ session('status_error') }}</b></p>
    @endif --}}


    {{-- Validacijos klaidu logika --}}    {{-- Validation error, for invalid incoming data display logic --}}
    {{-- @if ($errors->any())
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
               <div class="card-header">Naujas projektas:</div>
               <div class="card-body">
                   <form action="{{ route('project.store') }}" method="POST">
                       @csrf
                       {{-- @error('projectName')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror --}}
                       <div class="form-group">
                           <label>Pavadinimas: </label>
                           <input type="text" name="projectName" class="form-control">
                       </div>
                       <button type="submit" class="btn btn-primary">Submit</button>
                   </form>
               </div>
           </div>
       </div>
   </div>
</div>
@endsection
