@extends('layouts.main')

@section('content')

   <div class="container my-3">

      <h1>Aggiungi nuovo fumetto</h1>
       
      {{-- per dumpare gli errori --}}
      {{-- @dump($errors->all()) --}}

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
      

      <form action="{{ route('comics.store') }}" method="POST">
         @csrf
         @method('POST')
{{-- ---------------------------------------------------------------------------------------- --}}
         <div class="mb-3">
           <label for="title" class="form-label">Titolo</label>
           <input type="text" class="form-control @error('title') is-invalid @enderror" 
           id="title" name="title" placeholder="Inserisci il titolo"
           value="{{ old('title') }}">

           {{-- se esiste l'errore del 'titolo' allora stampa ciò che c'è dentro --}}
           @error('title')
            <p class="errore_nel_form">
               {{-- parametro automatico con cui viene passato il messaggio d'errore --}}
               {{ $message }}
            </p>
            @enderror
         </div>
{{-- ---------------------------------------------------------------------------------------- --}}
         <div class="mb-3">
            <label for="description" class="form-label">
               Descrizione
            </label>
            <textarea class="form-control @error('description') is-invalid @enderror" id="title" name="description"
            {{-- con value="old('') tiene i dati inseriti anche se c'è un errore" --}}
            value="{{ old('description') }}">
            </textarea>

            @error('description')
               <p class="errore_nel_form">
                  {{-- parametro automatico con cui viene passato il messaggio d'errore --}}
                  {{ $message }}
               </p>
            @enderror
         </div>
{{-- ---------------------------------------------------------------------------------------- --}}
         <div class="mb-3">
            <label for="thumb" class="form-label">
               Immagine copertina
            </label>
            <input type="text" class="form-control @error('thumb') is-invalid @enderror" 
            id="title" name="thumb" placeholder="Inserisci l'immagine di copertina"
            value="{{ old('thumb') }}">

            @error('thumb')
               <p class="errore_nel_form">
                  {{-- parametro automatico con cui viene passato il messaggio d'errore --}}
                  {{ $message }}
               </p>
            @enderror
         </div>
{{-- ---------------------------------------------------------------------------------------- --}}
         <div class="mb-3">
            <label for="price" class="form-label">
               Prezzo
            </label>
            <input type="text" class="form-control  @error('price') is-invalid @enderror"
            id="title" name="price" placeholder="Inserisci il prezzo"
            value="{{ old('price') }}">

            @error('price')
               <p class="errore_nel_form">
                  {{-- parametro automatico con cui viene passato il messaggio d'errore --}}
                  {{ $message }}
               </p>
            @enderror
         </div>
{{-- ---------------------------------------------------------------------------------------- --}}
         <div class="mb-3">
            <label for="series" class="form-label">
               Serie
            </label>
            <input type="text" class="form-control @error('series') is-invalid @enderror"
            id="title" name="series" placeholder="Inserisci la serie"
            value="{{ old('series') }}">

            @error('series')
               <p class="errore_nel_form">
                  {{-- parametro automatico con cui viene passato il messaggio d'errore --}}
                  {{ $message }}
               </p>
           @enderror
         </div>
{{-- ---------------------------------------------------------------------------------------- --}}
         <div class="mb-3">
            <label for="sale_date" class="form-label">
               Data di uscita
            </label>
            <input type="text" class="form-control @error('sale_date') is-invalid @enderror"
            id="title" name="sale_date" placeholder="Inserisci la data di uscita"
            value="{{ old('sale_date') }}">

            @error('sale_date')
               <p class="errore_nel_form">
                  {{-- parametro automatico con cui viene passato il messaggio d'errore --}}
                  {{ $message }}
               </p>
            @enderror
         </div>
{{-- ---------------------------------------------------------------------------------------- --}}
         <div class="mb-3">
            <label for="type" class="form-label">
               Tipo
            </label>
            <input type="text" class="form-control @error('type') is-invalid @enderror" 
            id="type" name="type" placeholder="Inserisci la tipologia di fumetto"
            value="{{ old('type') }}">

            @error('type')
               <p class="errore_nel_form">
                  {{-- parametro automatico con cui viene passato il messaggio d'errore --}}
                  {{ $message }}
               </p>
            @enderror
         </div>
{{-- ---------------------------------------------------------------------------------------- --}}
         <button type="submit" class="btn btn-primary">Submit</button>
         <button type="submit" class="btn btn-success">Reset</button>
      </form>
   </div>

@endsection