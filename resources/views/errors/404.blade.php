@extends('layouts.main')

@section('content')

   <div class="container">

      <h1 class="text-center">Error 404!</h1>

      <h3 class="text-center">Pagina non trovata</h3>

      <h3 class="text-center text-red">
         {{ $exception->getMessage() }}
      </h3>
       
   </div>

@endsection