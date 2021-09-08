<?php

namespace App\Http\Controllers\Persona;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Persona; // Importo mi modelo persona al controlador PersonaController

class PersonaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index() //Get de todo el contenido
    {
        $products = Persona::all();
        return $products;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()//Post de mi contenido Post => Creación 
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)//Post de mi contenido Post => Creación y aquí solo pasamos los argumentos necesarios a guardar
    {
        // 'nombre',
        // 'edad',
        // 'apellido',
        
        $persona = $request->all();
        $savePerson = Persona::create($persona);

        return response()->json(['data' => $savePerson], 201);
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    public function show($id) // Get de un solo index a travez de un ID
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)// Update de un solo index a travez de un ID
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

    public function update(Request $request, $id) // Update de un solo index a travez de un ID
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)// Delete de un solo index a travez de un ID
    {
        //
    }
}
