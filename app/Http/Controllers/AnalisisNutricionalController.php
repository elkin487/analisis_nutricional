<?php

namespace App\Http\Controllers;

use App\Analisi_Nutricional;
use Illuminate\Http\Request;

class AnalisisNutricionalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $analisis = Analisi_Nutricional::all();
        return view('analisis_nutricional/index', compact('analisis'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $analisis = Analisi_Nutricional::all();
        return view('analisis_nutricional/create', compact('analisis'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Analisi_Nutricional  $analisi_Nutricional
     * @return \Illuminate\Http\Response
     */
    public function show(Analisi_Nutricional $analisi_Nutricional)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Analisi_Nutricional  $analisi_Nutricional
     * @return \Illuminate\Http\Response
     */
    public function edit(Analisi_Nutricional $analisi_Nutricional)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Analisi_Nutricional  $analisi_Nutricional
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Analisi_Nutricional $analisi_Nutricional)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Analisi_Nutricional  $analisi_Nutricional
     * @return \Illuminate\Http\Response
     */
    public function destroy(Analisi_Nutricional $analisi_Nutricional)
    {
        //
    }
}
