<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Cancion;
use Illuminate\Http\Request;

class CancionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $registros['cancions'] = Cancion::paginate(10);
        return view('cancion.index', $registros);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $album = Album::all();
        // $data=array("albums"=>$album);
        return response()-> view('cancion.create',compact('album'));
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
            
            'nombreCancion' => 'required|string|max:50',
            'fechaGrabacion' => 'required|date',
            'duracionCancion' => 'required|string|max:50',
            // 'idAlbumFK ' => 'required',
        ];

        $this->validate($request, $campos);
        
        $datosCancion=request()->except('_token');
        Cancion::insert($datosCancion);
        // return response()->json($datosCancion); 
        return redirect('cancion')->with('msn', 'Canción registrada exitosamente!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cancion  $cancion
     * @return \Illuminate\Http\Response
     */
    public function show(Cancion $cancion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cancion  $cancion
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $cancion=Cancion::findOrFail($id);
        $album = Album::all();
        return view('cancion.edit',compact('cancion','album'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cancion  $cancion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $datosCancion=request()->except('_token', '_method');
        Cancion::where('id','=',$id)->update($datosCancion);
        return redirect('cancion')->with('msn', 'Canción actualizada exitosamente!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cancion  $cancion
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Cancion::destroy($id);
        return redirect('cancion')->with('msn', 'Canción eliminada exitosamente');
    }
}
