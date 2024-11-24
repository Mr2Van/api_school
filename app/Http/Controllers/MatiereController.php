<?php

namespace App\Http\Controllers;

use App\Models\Matiere;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreMatiereRequest;
use App\Http\Requests\UpdateMatiereRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MatiereController extends Controller
{
    
    public function index()
    {
        //
        $matieres = Matiere::with('enseignant')->get();
        return response()->json($matieres);
    }

    
    public function store(Request $request)
    {
        //
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'enseignant_id' => 'required|exists:enseignants,id',

        ]);
        $matiere = Matiere::create([
            'name'=> $request->name,
            'enseignant_id'=> $request->enseignant_id
            
        ]);

        return response()->json($matiere, 201);
    }

    
    public function show( $matiere)
    {
        //

        $matiere = Matiere::findOrFail($matiere);


        return response()->json($matiere->load('enseignant', 'notes'));
    }

    
    public function update( Request $request, $matiere)
    {
        //
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $matiere= Matiere::findOrFail($matiere);

        $matiere->update($validated);
        return response()->json($matiere);
    }

   
    public function destroy($matiere)
    {
        //
        $matiere= Matiere::findOrFail($matiere);
        $matiere->delete();
        return response()->json(null, 204);
    }
}
