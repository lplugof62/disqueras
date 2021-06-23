<?php

namespace App\Http\Controllers;

use App\Models\disqueras;
use Illuminate\Http\Request;

class DisquerasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $registros['disqueras'] = disqueras::paginate(10);
        return view('disquera.index', $registros);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('disquera.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $campos = [
            'nitDisquera' => 'required|digits:8',
            'nombreDisquera' => 'required|string|max:100',
            'telefonoDisquera' => 'required|digits_between:7,10',
            'estadoDisquera' => 'required|string|max:15'
        ];
        $this->validate($request, $campos);
        //
        $datosDisquera = request()->except('_token');
        disqueras::insert($datosDisquera);
        // return response()->json($datosDisquera); 
        return redirect('disquera')->with('msn', 'Disquera registrada exitosamente!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\disqueras  $disqueras
     * @return \Illuminate\Http\Response
     */
    public function show(disqueras $disqueras)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\disqueras  $disqueras
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $disquera = disqueras::findOrFail($id);
        return view('disquera.edit', compact('disquera'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\disqueras  $disqueras
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        //
        $campos = [
            'nitDisquera' => 'required|digits:8',
            'nombreDisquera' => 'required|string|max:100',
            'telefonoDisquera' => 'required|digits_between:7,10',
            'estadoDisquera' => 'required|string|max:15'
        ];

        $this->validate($request, $campos);

        $datosDisquera = request()->except('_token', '_method');
        disqueras::where('id', '=', $id)->update($datosDisquera);
        return redirect('disquera')->with('msn', 'Disquera actualizada exitosamente!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\disqueras  $disqueras
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        disqueras::destroy($id);
        return redirect('disquera')->with('msn', 'Disquera eliminada exitosamente!');
    }
}
