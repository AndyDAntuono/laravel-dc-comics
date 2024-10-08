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
    //public function store(Request $request)
    //{
    //    $comic = new Comic($request->all());
    //    $comic->save();
//
    //    return redirect()->route('comics.index'); // Reindirizza alla lista dei fumetti
    //}

    public function store(Request $request)
    {
        // Definisci le regole di validazione
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'thumb' => 'required|url',
            'price' => 'required|numeric|min:0',
            'series' => 'required|string|max:255',
            'sale_date' => 'required|date',
            'type' => 'required|string|max:50',
        ], [
            // Messaggi di errore personalizzati
            'title.required' => 'Il titolo è obbligatorio.',
            'description.required' => 'La descrizione è obbligatoria.',
            'thumb.required' => 'L\'URL dell\'immagine è obbligatorio.',
            'thumb.url' => 'Inserisci un URL valido per l\'immagine.',
            'price.required' => 'Il prezzo è obbligatorio.',
            'price.numeric' => 'Il prezzo deve essere un valore numerico.',
            'price.min' => 'Il prezzo non può essere inferiore a 0.',
            'series.required' => 'La serie è obbligatoria.',
            'sale_date.required' => 'La data di vendita è obbligatoria.',
            'sale_date.date' => 'Inserisci una data valida.',
            'type.required' => 'Il tipo è obbligatorio.',
        ]);
    
        // Se la validazione ha successo, crea un nuovo fumetto
        $comic = new Comic($validatedData); // Usa i dati validati
        $comic->save();
    
        return redirect()->route('comics.index')->with('success', 'Comic created successfully!');
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

    //// Aggiorna un fumetto esistente nel database
    //public function update(Request $request, $id)
    //{
    //    $comic = Comic::findOrFail($id);
    //    $comic->update($request->all());
//
    //    return redirect()->route('comics.index');
    //}

    public function update(Request $request, $id)
    {
        // Validazione
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'thumb' => 'required|url',
            'price' => 'required|numeric|min:0',
            'series' => 'required|string|max:255',
            'sale_date' => 'required|date',
            'type' => 'required|string|max:50',
        ], [
            // Messaggi di errore personalizzati
            'title.required' => 'Il titolo è obbligatorio.',
            'description.required' => 'La descrizione è obbligatoria.',
            'thumb.required' => 'L\'URL dell\'immagine è obbligatorio.',
            'thumb.url' => 'Inserisci un URL valido per l\'immagine.',
            'price.required' => 'Il prezzo è obbligatorio.',
            'price.numeric' => 'Il prezzo deve essere un valore numerico.',
            'price.min' => 'Il prezzo non può essere inferiore a 0.',
            'series.required' => 'La serie è obbligatoria.',
            'sale_date.required' => 'La data di vendita è obbligatoria.',
            'sale_date.date' => 'Inserisci una data valida.',
            'type.required' => 'Il tipo è obbligatorio.',
        ]);

        // Troviamo il fumetto esistente e lo aggiorniamo
        $comic = Comic::findOrFail($id);
        $comic->update($validatedData);

        return redirect()->route('comics.index')->with('success', 'Comic updated successfully!');
    }


    // Cancella un fumetto
    public function destroy($id)
    {
        $comic = Comic::findOrFail($id);
        $comic->delete();

        return redirect()->route('comics.index');
    }
}

