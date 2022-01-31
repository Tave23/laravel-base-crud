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
            [
                'title' => "required|max:100|min:2",
                'description' => "required|max:1500|min:2",
                'thumb' => "required|min:2",
                'price' => "required|max:20|min:1",
                'series' => "required|max:150|min:2",
                'sale_date' => "required|max:40|min:2",
                'type' => "required|max:100|min:2",
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
