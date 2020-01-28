<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Especie;

class EspecieController extends Controller
{
    public function index(Request $request)
    {
        if (!$request->ajax()) return redirect('/');

        $buscar = $request->buscar;
        $criterio = $request->criterio;
        
        if ($buscar==''){
            $especies = Especie::orderBy('id', 'desc')->paginate(3);
        }
        else{
            $especies = Especie::where($criterio, 'like', '%'. $buscar . '%')->orderBy('id', 'desc')->paginate(3);
        }
        

        return [
            'pagination' => [
                'total'        => $especies->total(),
                'current_page' => $especies->currentPage(),
                'per_page'     => $especies->perPage(),
                'last_page'    => $especies->lastPage(),
                'from'         => $especies->firstItem(),
                'to'           => $especies->lastItem(),
            ],
            'especies' => $especies
        ];
    }

    public function selectEspecie(Request $request){
        if (!$request->ajax()) return redirect('/');
        $especies = Especie::where('condicion','=','1')
        ->select('id','nombre')->orderBy('nombre', 'asc')->get();
        return ['especies' => $especies];
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (!$request->ajax()) return redirect('/');
        $especie = new Especie();
        $especie->nombre = $request->nombre;
        $especie->descripcion = $request->descripcion;
        $especie->condicion = '1';
        $especie->save();
    }
  

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        if (!$request->ajax()) return redirect('/');
        $especie = Especie::findOrFail($request->id);
        $especie->nombre = $request->nombre;
        $especie->descripcion = $request->descripcion;
        $especie->condicion = '1';
        $especie->save();
    }

    public function desactivar(Request $request)
    {
        if (!$request->ajax()) return redirect('/');
        $especie = Especie::findOrFail($request->id);
        $especie->condicion = '0';
        $especie->save();
    }

    public function activar(Request $request)
    {
        if (!$request->ajax()) return redirect('/');
        $especie = Especie::findOrFail($request->id);
        $especie->condicion = '1';
        $especie->save();
    }
}
