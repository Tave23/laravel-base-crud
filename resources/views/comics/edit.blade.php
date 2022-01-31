@extends('layouts.main')

@section('content')

   <div class="container">

      <h1>Modifica: {{ $comic->title }}</h1>

      @if ($errors->any())
         <div class="alert alert-warning" role="alert">
            <ul>
               {{-- faccio il ciclo degli errori --}}
               @foreach ($errors->all() as $error)
                  <li>
                     {{-- stampo il singolo errore --}}
                     {{ $error }}
                  </li> 
               @endforeach
            </ul>
         </div>
      @endif
       

      <form action="{{ route('comics.update', $comic) }}" method="post">
         @csrf
         @method('PUT')

         <div class="mb-3">
           <label for="title" class="form-label">Titolo</label>
           <input type="text" class="form-control" id="title" name="title" value="{{ $comic->title }}">
           {{-- se esiste l'errore del 'titolo' allora stampa ciò che c'è dentro --}}
            @error('title')
               <p class="errore_nel_form">
                  {{-- parametro automatico con cui viene passato il messaggio d'errore --}}
                  {{ $message }}
               </p>
            @enderror
         </div>
         
         <div class="mb-3">
            <label for="description" class="form-label">Descrizione</label>
            <textarea style="height: 200px" class="form-control" id="title" name="description">{{ $comic->description }}</textarea>
            {{-- se esiste l'errore del 'titolo' allora stampa ciò che c'è dentro --}}
            @error('description')
               <p class="errore_nel_form">
                  {{-- parametro automatico con cui viene passato il messaggio d'errore --}}
                  {{ $message }}
               </p>
           @enderror
         </div>

         <div class="mb-3">
            <label for="thumb" class="form-label">Immagine copertina</label>
            <input type="text" class="form-control" name="thumb" id="title" value="{{ $comic->thumb }}">
            {{-- se esiste l'errore del 'titolo' allora stampa ciò che c'è dentro --}}
            @error('thumb')
               <p class="errore_nel_form">
                  {{-- parametro automatico con cui viene passato il messaggio d'errore --}}
                  {{ $message }}
               </p>
            @enderror
         </div>

         <div class="mb-3">
            <label for="price" class="form-label">Prezzo</label>
            <input type="number" class="form-control" name="price" id="title" value="{{ $comic->price }}">
            {{-- se esiste l'errore del 'titolo' allora stampa ciò che c'è dentro --}}
            @error('price')
               <p class="errore_nel_form">
                  {{-- parametro automatico con cui viene passato il messaggio d'errore --}}
                  {{ $message }}
               </p>
            @enderror
         </div>

         <div class="mb-3">
            <label for="series" class="form-label">Serie</label>
            <input type="text" class="form-control" name="series" id="title" value="{{ $comic->series }}">
            {{-- se esiste l'errore del 'titolo' allora stampa ciò che c'è dentro --}}
            @error('series')
               <p class="errore_nel_form">
                  {{-- parametro automatico con cui viene passato il messaggio d'errore --}}
                  {{ $message }}
               </p>
            @enderror
         </div>

         <div class="mb-3">
            <label for="sale_date" class="form-label">Data di uscita</label>
            <input type="text" class="form-control" name="sale_date" id="title" value="{{ $comic->sale_date }}">
            {{-- se esiste l'errore del 'titolo' allora stampa ciò che c'è dentro --}}
            @error('sale_date')
               <p class="errore_nel_form">
                  {{-- parametro automatico con cui viene passato il messaggio d'errore --}}
                  {{ $message }}
               </p>
            @enderror
         </div>

         <div class="mb-3">
            <label for="type" class="form-label">Tipo</label>
            <input type="text" class="form-control" name="type" id="title" value="{{ $comic->type }}">{{-- se esiste l'errore del 'titolo' allora stampa ciò che c'è dentro --}}
            @error('type')
               <p class="errore_nel_form">
                  {{-- parametro automatico con cui viene passato il messaggio d'errore --}}
                  {{ $message }}
               </p>
            @enderror
         </div>
         
         <button type="submit" class="btn btn-primary">Submit</button>
         <button type="submit" class="btn btn-success">Reset</button>
      </form>
   </div>

@endsection