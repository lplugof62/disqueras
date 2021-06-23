<?php

namespace App\Http\Controllers;

use App\Models\Genero;
use Illuminate\Http\Request;

class GeneroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $registros['generos'] = Genero::paginate(10);
        return view('genero.index', $registros);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('genero.create');
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
        $campos = [
            'nombreGenero' => 'required|string|max:30',
            'estadoGenero' => 'required|string|max:10'
        ];
        $this->validate($request, $campos);
        
        $datosGenero=request()->except('_token');
        Genero::insert($datosGenero);
        // return response()->json($datosGenero); 
        return redirect('genero')->with('msn', 'Género registrado exitosamente!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Genero  $genero
     * @return \Illuminate\Http\Response
     */
    public function show(Genero $genero)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Genero  $genero
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $genero=Genero::findOrFail($id);        
        return view('genero.edit',compact('genero'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Genero  $genero
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $campos = [
            'nombreGenero' => 'required|string|max:30',
            'estadoGenero' => 'required|string|max:10'
        ];
        $this->validate($request, $campos);
        
        $datosGenero=request()->except('_token','_method');
        Genero::where('id','=',$id)->update($datosGenero);
        return redirect('genero')->with('msn', 'Registro género actualizado exitosamente!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Genero  $genero
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Genero::destroy($id);
        return redirect('genero')->with('msn', 'Género eliminado exitosamente!');
    }
}
