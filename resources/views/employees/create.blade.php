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

 <div class="container">
   <div class="row justify-content-center">
       <div class="col-md-8">
           <div class="card">
               <div class="card-header">Naujas darbuotojas:</div>
               <div class="card-body">
                   <form action="./employees" method="POST">
                        @csrf
                        <div class="form-group">
                            <label>Vardas: </label>
                            <input type="text" name="name" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Pavardė: </label>
                            <input type="text" name="surname" class="form-control"> 
                        </div>
                        <div class="form-group">
                            <label>Email: </label>
                            <input type="text" name="email" class="form-control"> 
                        </div>
                        <div class="form-group">
                            <label>Projekto pavadinimas: </label>
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
