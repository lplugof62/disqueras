<?php

namespace App\Http\Controllers;

use App\Models\Artistas;
use App\Models\disqueras;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ArtistasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $registros['artistas'] = Artistas::paginate(10);
        return view('artista.index', $registros);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $disquera = disqueras::all();
        return view('artista.create', compact('disquera'));
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
            'noDocumento' => 'required|digits_between:7,10',
            'tipoDocumento' => 'required|string|max:20',
            'nombreArtista' => 'required|string|max:50',
            'apellidoArtista' => 'required|string|max:50',
            'nombreArtistico' => 'required|string|max:50',
            'fechaNacimArtista' => 'required|date',
            'emailArtista' => 'required|email|max:50',
            'foto' => 'required|mimes:jpg,jpeg,png',
            // 'idDisqueraFK ' => 'required',
            'estadoArtista' => 'required|string|max:15',
        ];
        $this->validate($request, $campos);

        $datosArtista = request()->except('_token');

        if (request()->hasFile('foto')) {
            $datosArtista['foto'] = $request->file('foto')->store('uploads', 'public');
        }

        Artistas::insert($datosArtista);
        // return response()->json($datosArtista);
        return redirect('artista')->with('msn', 'Artista registrado exitosamente!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Artistas  $artistas
     * @return \Illuminate\Http\Response
     */
    public function show(Artistas $artistas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Artistas  $artistas
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        
        $artista = Artistas::findOrFail($id);
        $disquera = disqueras::all();
        return view('artista.edit', compact('artista', 'disquera'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Artistas  $artistas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        $campos = [
            'noDocumento' => 'required|digits_between:7,10',
            'tipoDocumento' => 'required|string|max:20',
            'nombreArtista' => 'required|string|max:50',
            'apellidoArtista' => 'required|string|max:50',
            'nombreArtistico' => 'required|string|max:50',
            'fechaNacimArtista' => 'required|date',
            'emailArtista' => 'required|email|max:50',
            'foto' => 'required',
            // 'idDisqueraFK ' => 'required',
            'estadoArtista' => 'required|string|max:15',
        ];

        // if ($request->hasFile('foto')) {
        //     $campos = ['foto' => 'required|mimes:jpg,jpeg,png'];
        // }

        $this->validate($request, $campos);
        //
        $datosArtista = request()->except('_token', '_method');

        if ($request->hasFile('foto')) {
            $artista = Artistas::findOrFail($id);
            Storage::delete('public/' . $artista->foto);
            $datosArtista['foto'] = $request->file('foto')->store('uploads', 'public');
        }

        Artistas::where('id', '=', $id)->update($datosArtista);
        return redirect('artista')->with('msn', 'Artista actualizado exitosamente!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Artistas  $artistas
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $artista = Artistas::findOrFail($id);

        if (Storage::delete('public/' . $artista->foto)) {
            Artistas::destroy($id);
        }
        Artistas::destroy($id);
        return redirect('artista')->with('msn', 'Artista eliminado exitosamente!');
    }
}
