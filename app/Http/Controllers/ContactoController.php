<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contacto;

class ContactoController extends Controller
{
    public function index(Request $request)
    {
        if (!$request->ajax()) return redirect('/');

        $buscar = $request->buscar;
        $criterio = $request->criterio;
        
        if ($buscar==''){
            $contactos = Contacto::select('contactos.id','contactos.nombre','contactos.asunto','contactos.email','contactos.descripcion','contactos.created_at as fecha')
            ->orderBy('contactos.id', 'desc')->paginate(10);
        }
        else{
            $contactos = Contacto::select('contactos.id','contactos.nombre','contactos.asunto','contactos.email','contactos.descripcion','contactos.created_at as fecha')
            ->where('contactos.'.$criterio, 'like', '%'. $buscar . '%')
            ->orderBy('contactos.id', 'desc')->paginate(20);
        }
    
    

        return [
            'pagination' => [
                'total'        => $contactos->total(),
                'current_page' => $contactos->currentPage(),
                'per_page'     => $contactos->perPage(),
                'last_page'    => $contactos->lastPage(),
                'from'         => $contactos->firstItem(),
                'to'           => $contactos->lastItem(),
            ],
            'contactos' => $contactos
        ];
    }
    public function store(Request $request)
    {
        $mascota = new Contacto();
        $mascota->nombre = $request->nombre;
        $mascota->asunto = $request->asunto;
        $mascota->email = $request->email;
        $mascota->descripcion = $request->descripcion;
        $mascota->save();

        return redirect('/contacto');
    }
    public function delete(Request $request)
    {
        if (!$request->ajax()) return redirect('/');
        $post = Contacto::findOrFail($request->id);
        $post->delete();
    }
}
