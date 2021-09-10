<?php

namespace App\Http\Controllers\Persona;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Persona; // Importo mi modelo persona al controlador PersonaController
use Illuminate\Support\Facades\Validator;
use League\CommonMark\Extension\Table\TableParser;

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

    public function create() //Post de mi contenido Post => Creación 
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request) //Post de mi contenido Post => Creación y aquí solo pasamos los argumentos necesarios a guardar
    {
        // 'nombre',
        // 'edad',
        // 'apellido',

        $validation = Validator::make($request->all(), [
            'nombre' => 'required',
            'edad' => 'required',
            'apellido' => 'required',
        ]);

        if ($validation->fails()) {
            return response()->json($validation->errors()->toJson(), 400);
        }

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

    //  Terminar Show
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


    public function edit($id) // Update de un solo index a travez de un ID
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
    //  Terminar update
    // Modelo dentro de la función update ya no aplica 
    public function update(Request $request, $id) // Update de un solo index a travez de un ID
    {
        $persona = Persona::findOrFail($id);

        // $id=2

        // Table
        // nombre edad apellido id
        // lalo   31   lalo     1 
        // eduar  32   eduar    2

        // $persona = eduar  32   eduar    2

        // Datos requeridos y no necesariamente para guardar
        // $request->validate([
        //     'nombre' => 'required|unique:personas,nombre,' . $persona->id,
        //     'edad' => 'required',
        //     'apellido' => 'required'
        // ]);

        $validation = Validator::make($request->all(), [
            'nombre' => 'required|unique:personas,nombre,' . $persona->id,
            'edad' => 'required',
            'apellido' => 'required',
        ]);

        if ($validation->fails()) {
            return response()->json($validation->errors()->toJson(), 400);
        }

        // has determina que le input exista dentro de mi request
        if ($request->has('nombre') && $request->has('apellido') && $request->has('edad')) {
            $persona->nombre = $request->nombre;
            $persona->apellido = $request->apellido; // 1
            $persona->edad = $request->edad;
            // $persona->apellido = $request->apellido;
        }

        // 1
        // $persona->apellido hace referencia a mi modulo Persona y su campo que yo asigne 

        $persona->save();

        return response()->json(['data' => $persona], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    //  Terminar destroy©
    public function destroy($id) // Delete de un solo index a travez de un ID
    {
        //
        $persona = Persona::findOrFail($id);

        $persona->delete();

        return response()->json(['data' => $persona], 200);
    }
}
