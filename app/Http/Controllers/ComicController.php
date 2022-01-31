<?php

namespace App\Http\Controllers;

// obbligatorio
use App\Comic;

// importo lo slug
use Illuminate\Support\Str;

use Illuminate\Http\Request;

class ComicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){

        // orderBy.... per ordinare in modo decrescente per gli ID
        $new_comics = Comic::orderBy('id', 'desc')->paginate(4);

        // dump($new_comics);

        return view('comics.home', compact('new_comics'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('comics.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // validazione dati form
        $request->validate(
            // come primo parametro stabilisco i parametri in cui devono rientrare i dati che vengono inseriti
            [
                'title' => "required|max:100|min:2",
                'description' => "required|max:1500|min:2",
                'thumb' => "required|min:2",
                'price' => "required|numeric|max:20|min:1",
                'series' => "required|max:150|min:2",
                'sale_date' => "required|date",
                'type' => "required|max:100|min:2",
            ],

            // il secondo parametro è l'array dei messaggi di errore che voglio avere
            [
                'title.required' => "Inserire un titolo",
                'title.max' => "Il titolo non può avere più di :max caratteri",
                'title.min' => "Il titolo non può avere meno di :min caratteri",
                'description.required' => "Inserire una descrizione",
                'description.max' => "La descrizione non può avere più di :max caratteri",
                'description.min' => "La descrizione non può avere meno di :min caratteri",
                'thumb.required' => "Inserire un immagine di copertina",
                'thumb.min' => "L'immagine di copertina deve avere almeno :min caratteri",
                'price.required' => "Inserire un prezzo",
                'price.numeric' => "Il prezzo dev'essere un numero",
                'price.max' => "Il prezzo non può avere più di :max caratteri",
                'price.min' => "Il prezzo deve avere almeno :min caratteri",
                'series.required' => "Inserire una serie",
                'series.max' => "La serie non può avere più di :max caratteri",
                'series.min' => "La serie deve avere almeno :min caratteri",
                'sale_date.required' => "Inserire una data di uscita",
                'sale_date.date' => "La data di uscita dev'essere una data corretta",
                'type.required' => "Inserire un tipo di fumetto",
                'type.max' => "Il tipo non può avere più di :max caratteri",
                'type.min' => "Il tipo deve avere almeno :min caratteri",

            ]
        );



        $data = $request->all();

        $new_comic = new Comic();

        $new_comic->fill($data);

        $new_comic->slug = Str::slug($data['title'], '-');

        $new_comic->save();

        return redirect()->route('comics.show', $new_comic);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // dd($id);

        $comic = Comic::find($id);
        if($comic){

            return view('comics.show', compact('comic'));
        }

        abort(404, 'Fumetto non esistente');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $comic = Comic::find($id);

        if($comic){
            return view('comics.edit', compact('comic'));
        }

        abort(404, 'Fumetto non esistente');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comic $comic)
    {

        $request->validate(
            // come primo parametro stabilisco i parametri in cui devono rientrare i dati che vengono inseriti
            [
                'title' => "required|max:100|min:2",
                'description' => "required|max:1500|min:2",
                'thumb' => "required|min:2",
                'price' => "required|numeric|max:20|min:1",
                'series' => "required|max:150|min:2",
                'sale_date' => "required|date",
                'type' => "required|max:100|min:2",
            ],

            // il secondo parametro è l'array dei messaggi di errore che voglio avere
            [
                'title.required' => "Inserire un titolo",
                'title.max' => "Il titolo non può avere più di :max caratteri",
                'title.min' => "Il titolo non può avere meno di :min caratteri",
                'description.required' => "Inserire una descrizione",
                'description.max' => "La descrizione non può avere più di :max caratteri",
                'description.min' => "La descrizione non può avere meno di :min caratteri",
                'thumb.required' => "Inserire un immagine di copertina",
                'thumb.min' => "L'immagine di copertina deve avere almeno :min caratteri",
                'price.required' => "Inserire un prezzo",
                'price.numeric' => "Il prezzo dev'essere un numero",
                'price.max' => "Il prezzo non può avere più di :max caratteri",
                'price.min' => "Il prezzo deve avere almeno :min caratteri",
                'series.required' => "Inserire una serie",
                'series.max' => "La serie non può avere più di :max caratteri",
                'series.min' => "La serie deve avere almeno :min caratteri",
                'sale_date.required' => "Inserire una data di uscita",
                'sale_date.date' => "La data di uscita dev'essere una data corretta",
                'type.required' => "Inserire un tipo di fumetto",
                'type.max' => "Il tipo non può avere più di :max caratteri",
                'type.min' => "Il tipo deve avere almeno :min caratteri",

            ]
        );


        $data = $request->all();

        $data['slug'] = Str::slug($data['title'], '-');

        $comic->update($data);

        return redirect()->route('comics.show', $comic);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comic $comic)
    {
        $comic->delete();

        return redirect()->route('comics.index')->with('deleted_comic', "Il fumetto: $comic->title è stato eliminato!");
    }
}
