@extends('layouts.main')

@section('content')

   <div class="container">

      <h1>Aggiungi nuovo fumetto</h1>
       
      @dump($errors->all())

      <form action="{{ route('comics.store') }}" method="POST">
         @csrf
         @method('POST')

         <div class="mb-3">
           <label for="title" class="form-label">Titolo</label>
           <input type="text" class="form-control" id="title" name="title">
         </div>
         <div class="mb-3">
            <label for="description" class="form-label">Descrizione</label>
            <textarea class="form-control" id="title" name="description"></textarea>
         </div>
         <div class="mb-3">
            <label for="thumb" class="form-label">Immagine copertina</label>
            <input type="text" class="form-control" id="title" name="thumb">
         </div>
         <div class="mb-3">
            <label for="price" class="form-label">Prezzo</label>
            <input type="number" class="form-control" id="title" name="price">
         </div>
         <div class="mb-3">
            <label for="series" class="form-label">Serie</label>
            <input type="text" class="form-control" id="title" name="series">
         </div>
         <div class="mb-3">
            <label for="sale_date" class="form-label">Data di uscita</label>
            <input type="text" class="form-control" id="title" name="sale_date">
         </div>
         <div class="mb-3">
            <label for="type" class="form-label">Tipo</label>
            <input type="text" class="form-control" id="title" name="type">
         </div>
         
         <button type="submit" class="btn btn-primary">Submit</button>
         <button type="submit" class="btn btn-success">Reset</button>
      </form>
   </div>

@endsection