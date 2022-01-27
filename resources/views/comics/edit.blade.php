@extends('layouts.main')

@section('content')

   <div class="container">

      <h1>Pagina Edit</h1>

      <h2>{{ $comic->title }}</h2>

      
      <a href="{{ route('comics.index') }}">Torna alla lista di fumetti</a>
   </div>

@endsection