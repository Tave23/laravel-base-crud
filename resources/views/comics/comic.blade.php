@extends('layouts.main')

@section('content')

   <div class="container">

      <h1>{{ $comic->title }}</h1>

      <p>{{ $comic->description }}</p>

      <img src="{{$comic->thumb}}" alt="Copertina fumetto">

      <h4>Al prezzo di: {{ $comic->price }} €</h4>

      <h4>Serie: {{ $comic->series }}</h4>

      <h4>In vendita dal: {{ $comic->sale_date }}</h4>

      <h5>Genere: {{ $comic->type }}</h5>
       
   </div>

@endsection