<?php

namespace App\Http\Controllers;

use App\Models\visita_juridica;
use App\Models\Visita;
use Illuminate\Http\Request;

class VisitaJuridicaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $visita = Visita::all();
        // dd($visita);
        return view('visita.indexjuridica', compact('visita'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(visita_juridica $visita_juridica)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(visita_juridica $visita_juridica)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, visita_juridica $visita_juridica)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(visita_juridica $visita_juridica)
    {
        //
    }
}
