<?php

namespace App\Http\Controllers;

use App\Models\enseignants;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreenseignantsRequest;
use App\Http\Requests\UpdateenseignantsRequest;

class EnseignantsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $enseignants = enseignants::with('user')->get();
        return response()->json($enseignants);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreenseignantsRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(enseignants $enseignants)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateenseignantsRequest $request, enseignants $enseignants)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(enseignants $enseignants)
    {
        //
    }
}
