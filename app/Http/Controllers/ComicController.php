<?php

namespace App\Http\Controllers;

use App\Models\Comic;
use Illuminate\Http\Request;

class ComicController extends Controller
{
    // Mostra la lista dei fumetti
    public function index()
    {
        $comics = Comic::all();
        return view('comics.index', ['comics' => $comics]); 
    }

    public function create()
    {
        return view('comics.create'); // Ritorna la vista per creare un nuovo fumetto
    }

    // Salva un nuovo fumetto nel database
    public function store(Request $request)
    {
        $comic = new Comic($request->all());
        $comic->save();

        return redirect()->route('comics.index'); // Reindirizza alla lista dei fumetti
    }

    // Mostra un singolo fumetto
    public function show($id)
    {
        $comic = Comic::findOrFail($id);
        return view('comics.show', ['comic' => $comic]); 
    }

    // Mostra il form per modificare un fumetto
    public function edit($id)
    {
        $comic = Comic::findOrFail($id);
        return view('comics.edit', ['comic' => $comic]); 
    }

    // Aggiorna un fumetto esistente nel database
    public function update(Request $request, $id)
    {
        $comic = Comic::findOrFail($id);
        $comic->update($request->all());

        return redirect()->route('comics.index');
    }

    // Cancella un fumetto
    public function destroy($id)
    {
        $comic = Comic::findOrFail($id);
        $comic->delete();

        return redirect()->route('comics.index');
    }
}

