<?php

namespace App\Http\Controllers;

use App\Models\eleves;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreelevesRequest;
use App\Http\Requests\UpdateelevesRequest;

class ElevesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreelevesRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(eleves $eleves)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateelevesRequest $request, eleves $eleves)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(eleves $eleves)
    {
        //
    }
}
