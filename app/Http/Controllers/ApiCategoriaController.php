<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;

class ApiCategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //listar
        $categorias = Categoria::All();

        return response()->json($categorias, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //guardar en la base de datos
        $cat = new Categoria;
        $cat->nombre = $request->nombre;
        $cat->detalle = $request->detalle;
        $cat->save();

        return response()->json(["mensaje" => "Categoria Creada"], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //Mostrar
        $categoria = Categoria::find($id);

        return response()->json($categoria, 200);
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
        //
        $cat = Categoria::find($id);
        $cat->nombre = $request->nombre;
        $cat->detalle = $request->detalle;
        $cat->save();

        return response()->json(["mensaje" => "Categoria Actualizada"], 200);
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
        $cat = Categoria::find($id);
        $cat->delete();

        return response()->json(["mensaje" => "Categoria eliminada"], 200);
    }
}
