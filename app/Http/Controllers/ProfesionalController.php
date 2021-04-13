<?php

namespace App\Http\Controllers;
use App\Models\Profesional;
use Illuminate\Http\Request;

class ProfesionalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $profesional = Profesional::all();
        return $profesional;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $profesional = new Profesional;
        $profesional->nroDocumento =$request->nroDocumento;
        $profesional->nombre =$request->nombre;
        $profesional->apellidos =$request->apellidos;
        $profesional->habilidades =$request->habilidades;
        $profesional->salario =$request->salario;
        $profesional->disponible='0';
        $profesional->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $profesional =  Profesional::findOrFail($request->id);
        $profesional->nroDocumento =$request->nroDocumento;
        $profesional->nombre =$request->nombre;
        $profesional->apellidos =$request->apellidos;
        $profesional->habilidades =$request->habilidades;
        $profesional->salario =$request->salario;
        $profesional->disponible='1';
        $profesional->update();
    }
    public function desactivar(Request $request)
    {
        $profesional =  Profesional::findOrFail($request->id);
        $profesional->disponible='0';
        $profesional->update();
    }
    public function activar(Request $request)
    {
        $profesional =  Profesional::findOrFail($request->id);
        $profesional->disponible='1';
        $profesional->update();
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
