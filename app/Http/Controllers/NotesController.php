<?php

namespace App\Http\Controllers;

use App\Models\notes;
use App\Http\Controllers\Controller;
use App\Http\Requests\StorenotesRequest;
use App\Http\Requests\UpdatenotesRequest;
use Illuminate\Http\Request;

class NotesController extends Controller
{
   
    public function index()
    {
        //
        
    }

   
    public function store(Request $request)
    {
        //
        $validated = $request->validate([
            'valeur' => 'required|numeric|between:0,20',
            'matiere_id' => 'required|exists:matieres,id',
            'eleve_id' => 'required|exists:eleves,id',
        ]);

        $note = notes::create($validated);
        return response()->json($note, 201);
    }

   
    public function show($notes)
    {
        //

        $notes= notes::findOrFail($notes);

        return response()->json($notes);


    }

    
    public function update(Request $request,  $notes)
    {
        //
        $validated = $request->validate([
            'valeur' => 'required|numeric|between:0,20',
        ]);

        $notes= notes::findOrFail($notes);
        $notes->update($validated);
        return response()->json($notes);
    }

    
    public function destroy( $notes)
    {
        //
        $notes= notes::findOrFail($notes);
        $notes->delete();
        return response()->json(null, 204);
    }
}
