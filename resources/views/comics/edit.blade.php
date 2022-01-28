@extends('layouts.main')

@section('content')

   <div class="container">

      <h1>Modifica: {{ $comic->title }}</h1>
       

      <form action="{{ route('comics.update', $comic) }}" method="post">
         @csrf
         @method('PUT')

         <div class="mb-3">
           <label for="title" class="form-label">Titolo</label>
           <input type="text" class="form-control" id="title" name="title" value="{{ $comic->title }}">
         </div>
         <div class="mb-3">
            <label for="description" class="form-label">Descrizione</label>
            <textarea style="height: 200px" class="form-control" id="title" name="description">{{ $comic->description }}</textarea>
         </div>
         <div class="mb-3">
            <label for="thumb" class="form-label">Immagine copertina</label>
            <input type="text" class="form-control" name="thumb" id="title" value="{{ $comic->thumb }}">
         </div>
         <div class="mb-3">
            <label for="price" class="form-label">Prezzo</label>
            <input type="number" class="form-control" name="price" id="title" value="{{ $comic->price }}">
         </div>
         <div class="mb-3">
            <label for="series" class="form-label">Serie</label>
            <input type="text" class="form-control" name="series" id="title" value="{{ $comic->series }}">
         </div>
         <div class="mb-3">
            <label for="sale_date" class="form-label">Data di uscita</label>
            <input type="text" class="form-control" name="sale_date" id="title" value="{{ $comic->sale_date }}">
         </div>
         <div class="mb-3">
            <label for="type" class="form-label">Tipo</label>
            <input type="text" class="form-control" name="type" id="title" value="{{ $comic->type }}">
         </div>
         
         <button type="submit" class="btn btn-primary">Submit</button>
         <button type="submit" class="btn btn-success">Reset</button>
      </form>
   </div>

@endsection