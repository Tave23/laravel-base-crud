@extends('layouts.main')

@section('content')

   <div class="container">

      <h1>Comics</h1>

      @if (session('deleted_comic'))
         <div class="alert alert-warning" role="alert">
            {{ session('deleted_comic') }}
         </div>
      @endif

      <table class="table">
         <thead>
            <tr>
               <th scope="col">ID</th>
               <th scope="col">Titolo</th>
               <th scope="col" class="text-center">Descrizione</th>
               <th scope="col">Prezzo</th>
               <th scope="col">Serie</th>
               <th scope="col">Data di uscita</th>
               <th scope="col">Genere</th>
               <th colspan="3" class="text-center">Settings</th>
            </tr>
         </thead>
         <tbody>
            @foreach ($new_comics as $comic)
            <tr>
               <th scope="row">{{ $comic->id }}</th>
               <td>{{ $comic->title }}</td>
               <td>{{ $comic->description }}</td>
               <td>{{ $comic->price }}</td>
               <td>{{ $comic->series }}</td>
               <td>{{ $comic->sale_date }}</td>
               <td>{{ $comic->type }}</td>
               <td>
                  <a href="{{ route('comics.show', $comic) }}" type="button" class="btn btn-primary">Show</a>
               </td>
               <td>
                  <a href="{{ route('comics.edit', $comic) }}" type="button" class="btn btn-success">Edit</a>
               </td>
               <td>
                  {{-- per la funzione delete bisogna NECESSARIAMENTE usare il form con il @method DELETE e @csrf --}}
                  <form onsubmit="return confirm('Sicuro di voler eliminare {{ $comic->title }}')" action="{{ route('comics.destroy', $comic) }}" method="POST">
                     @csrf
                     @method('DELETE')

                     <button type="submit" type="button" class="btn btn-danger">Delete</button>

                  </form>
               </td>
            </tr>
           
            @endforeach
         </tbody>
       </table>
      
      {{ $new_comics ?? ''->links() }}

      
      
       
   </div>

@endsection