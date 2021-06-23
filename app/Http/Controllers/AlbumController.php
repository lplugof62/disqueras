<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Artistas;
use App\Models\Genero;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AlbumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $registros['albums'] = Album::paginate(10);
        return view('album.index', $registros);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $artista = Artistas::all();
        // $dataArtista = array("artistas" => $artista);
        $genero = Genero::all();
        // $dataGenero = array("generos" => $genero);
        return view('album.create', compact('artista', 'genero'));
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
            'nombreAlbum' => 'required|string|max:70',
            'anioPublicacion' => 'required|digits:4|integer',
            'foto' => 'required|mimes:jpg,jpeg,png',
            'idArtistaFK' => 'required',
            'idGeneroFK' => 'required',
            'estadoAlbum' => 'required|string|max:15',
        ];
        $this->validate($request, $campos);

        $datosAlbum = request()->except('_token');

        if (request()->hasFile('foto')) {
            $datosAlbum['foto'] = $request->file('foto')->store('uploads', 'public');
        }

        Album::insert($datosAlbum);
        // return response()->json($datosAlbum);
        return redirect('album')->with('msn', 'Álbum registrado exitosamente!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Album  $album
     * @return \Illuminate\Http\Response
     */
    public function show(Album $album)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Album  $album
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $artista = Artistas::all();
        $genero = Genero::all();
        $album = Album::findOrFail($id);
        return view('album.edit', compact('album','artista', 'genero'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Album  $album
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        //
        $campos = [
            'nombreAlbum' => 'required|string|max:70',
            'anioPublicacion' => 'required|digits:4|integer',
            'foto' => 'required',
            'idArtistaFK' => 'required',
            'idGeneroFK' => 'required',
            'estadoAlbum' => 'required|string|max:15',
        ];
        // if ($request->hasFile('foto')) {
        //     $campos = ['foto' => 'required|mimes:jpg,jpeg,png'];
        // }
        $this->validate($request, $campos);

        $datosAlbum = request()->except('_token', '_method');

        if ($request->hasFile('foto')) {

            $album = Album::findOrFail($id);
            Storage::delete('public/' . $album->foto);
            $datosAlbum['foto'] = $request->file('foto')->store('uploads', 'public');
        }

        Album::where('id', '=', $id)->update($datosAlbum);
        return redirect('album')->with('msn', 'Álbum actualizado exitosamente!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Album  $album
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $album = Album::findOrFail($id);

        if (Storage::delete('public/' . $album->foto)) {
            Album::destroy($id);
        }
        Album::destroy($id);

        return redirect('album')->with('msn', 'Álbum eliminado exitosamente!');
    }
}
