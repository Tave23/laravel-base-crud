@extends('layouts.main')

@section('content')

   <div class="container">

      <h1>Comics</h1>

      <table class="table">
         <thead>
            <tr>
               <th scope="col">ID</th>
               <th scope="col">Titolo</th>
               <th scope="col">Descrizione</th>
               <th scope="col">Prezzo</th>
               <th scope="col">Serie</th>
               <th scope="col">Data di uscita</th>
               <th scope="col">Genere</th>
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
            </tr>
           
            @endforeach
         </tbody>
       </table>
      
       {{ $new_comics->links() }}
      
       
   </div>

@endsection