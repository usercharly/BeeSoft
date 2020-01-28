<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;
use App\Mascota;
use App\Especie;
use App\Persona;
use App\User;
use App\Post;
use DB;

class MascotaController extends Controller
{
    public function index(Request $request)
    {
        if (!$request->ajax()) return redirect('/');

        $buscar = $request->buscar;
        $criterio = $request->criterio;
        $lobo = \Auth::user()->idrol;
        $oveja = \Auth::user()->id;


        if($lobo==1){
        if ($buscar==''){
            $mascotas = Mascota::join('especies','especies.id','=','mascotas.idespecie')
            ->select('mascotas.id','mascotas.idespecie','especies.nombre as nombre_especie','mascotas.nombre','mascotas.telefono','mascotas.imagen','mascotas.lugar','mascotas.descripcion','mascotas.condicion')
            ->where('mascotas.condicion','=','1')
            ->orderBy('mascotas.id', 'desc')->paginate(10);
        }
        else{
            $mascotas = Mascota::join('especies','especies.id','=','mascotas.idespecie')
            ->select('mascotas.id','mascotas.idespecie','especies.nombre as nombre_especie','mascotas.nombre','mascotas.imagen','mascotas.imagen','mascotas.telefono','mascotas.lugar','mascotas.descripcion','mascotas.condicion')
            ->where('mascotas.'.$criterio, 'like', '%'. $buscar . '%')
            ->orderBy('mascotas.id', 'desc')->paginate(3);
        }
    }else{
        if ($buscar==''){
            $mascotas = Mascota::join('especies','especies.id','=','mascotas.idespecie')
            ->select('mascotas.id','mascotas.idespecie','especies.nombre as nombre_especie','mascotas.nombre','mascotas.telefono','mascotas.imagen','mascotas.lugar','mascotas.descripcion','mascotas.condicion')
            ->where('mascotas.condicion','=','1')
            ->where('mascotas.idduenio',$oveja)
            ->orderBy('mascotas.id', 'desc')->paginate(10);
        }
        else{
            $mascotas = Mascota::join('especies','especies.id','=','mascotas.idespecie')
            ->select('mascotas.id','mascotas.idespecie','especies.nombre as nombre_especie','mascotas.nombre','mascotas.imagen','mascotas.imagen','mascotas.telefono','mascotas.lugar','mascotas.descripcion','mascotas.condicion')
            ->where('mascotas.'.$criterio, 'like', '%'. $buscar . '%')
            ->where('mascotas.idduenio',$oveja)
            ->orderBy('mascotas.id', 'desc')->paginate(3);
        }
    }

        return [
            'pagination' => [
                'total'        => $mascotas->total(),
                'current_page' => $mascotas->currentPage(),
                'per_page'     => $mascotas->perPage(),
                'last_page'    => $mascotas->lastPage(),
                'from'         => $mascotas->firstItem(),
                'to'           => $mascotas->lastItem(),
            ],
            'mascotas' => $mascotas
        ];
    }
    public function listarMascota(Request $request)
    {
        if (!$request->ajax()) return redirect('/');

        $buscar = $request->buscar;
        $criterio = $request->criterio;
        
        if ($buscar==''){
            $mascotas = Mascotas::join('especies','mascotas.id','=','especies.id')
            ->select('mascotas.id','mascotas.idespecie','especies.nombre as nombre_especie','mascotas.nombre','mascotas.imagen','mascotas.telefono','mascotas.lugar','mascotas.descripcion','mascotas.condicion')
            ->orderBy('mascotas.id', 'desc')->paginate(10);
        }
        else{
            $mascotas = Mascotas::join('especies','mascotas.id','=','especies.id')
            ->select('mascotas.id','mascotas.idespecie','especies.nombre as nombre_especie','mascotas.nombre','mascotas.imagen','mascotas.telefono','mascotas.lugar','mascotas.descripcion','mascotas.condicion')
            ->where('mascotas.'.$criterio, 'like', '%'. $buscar . '%')
            ->orderBy('mascotas.id', 'desc')->paginate(10);
        }
        

        return ['mascotas' => $mascotas];
    }
    public function listarMascotaVenta(Request $request)
    {
        if (!$request->ajax()) return redirect('/');

        $buscar = $request->buscar;
        $criterio = $request->criterio;
        
        if ($buscar==''){
            $mascotas = Mascotas::join('especies','mascotas.id','=','especies.id')
            ->select('mascotas.id','mascotas.idespecie','especies.nombre as nombre_especie','mascotas.nombre','mascotas.imagen','mascotas.telefono','mascotas.lugar','mascotas.descripcion','mascotas.condicion')
            ->where('mascotas.stock','>','0')
            ->orderBy('mascotas.id', 'desc')->paginate(10);
        }
        else{
            $mascotas = Mascotas::join('especies','mascotas.id','=','especies.id')
            ->select('mascotas.id','mascotas.idespecie','especies.nombre as nombre_especie','mascotas.nombre','mascotas.imagen','mascotas.telefono','mascotas.lugar','mascotas.descripcion','mascotas.condicion')
            ->where('mascotas.'.$criterio, 'like', '%'. $buscar . '%')
            ->where('mascotas.stock','>','0')
            ->orderBy('mascotas.id', 'desc')->paginate(10);
        }
        

        return ['mascotas' => $mascotas];
    }
    public function listarPdf(){
        $mascotas = Mascotas::join('especies','mascotas.id','=','especies.id')
        ->select('mascotas.id','mascotas.idespecie','especies.nombre as nombre_especie','mascotas.nombre','mascotas.imagen','mascotas.telefono','mascotas.lugar','mascotas.descripcion','mascotas.condicion')
        ->orderBy('mascotas.nombre', 'desc')->get();

        $cont=Mascotas::count();

        $pdf = \PDF::loadView('pdf.mascotaspdf',['mascotas'=>$mascotas,'cont'=>$cont]);
        return $pdf->download('mascotas.pdf');
    }
    public function buscarMascota(Request $request ){
        if (!$request->ajax()) return redirect('/');

        $filtro = $request->filtro;
        $mascotas = Mascotas::where('codigo','=', $filtro)
        ->select('id', 'nombre')->orderBy('nombre', 'asc')->take(1)->get();

        return ['mascotas' => $mascotas];
    }
    public function buscarMascotaVenta(Request $request ){
        if (!$request->ajax()) return redirect('/');

        $filtro = $request->filtro;
        $mascotas = Mascotas::where('codigo','=', $filtro)
        ->select('id', 'nombre','telefono','lugar')
        ->where('telefono','>','0')
        ->orderBy('nombre', 'asc')->take(1)->get();

        return ['mascotas' => $mascotas];
    }
    public function store(Request $request)
    {
        if (!$request->ajax()) return redirect('/');


        $mascota = new Mascota();
        $mascota->idespecie = $request->idespecie;
        $mascota->nombre = $request->nombre;
        if ($request->imagen) {
            $logo = $request->imagen;  //Se obtienen los datos de la imagen desde la solicitud.
            $ext = explode(";", $logo); // Se dividen los datos, en este caso se obtiene la informacion antes del ";" "data:image/jpeg;".
            $ext = str_replace('data:image/', '', $ext); // Se reemplazan los datos "data:image/" por vacio para generar una nueva cadena y obtener la extension de la imagen "jpeg".
            $ext = $ext[0]; // En este punto $ext es un arreglo de datos, por lo tanto la extension de la imagen se encuentra en la primera posicion "0".
            $logo = str_replace('data:image/'. $ext .';base64,', '', $logo); // Se elimina la data inicial de la imagen para luego ser decodificada.
            $logo = base64_decode($logo); //Se decodifica la data de la imagen recibida.
            $logoName = $request->nombre.str_random(2).'.'. $ext; // Se asigna un nombre a la imagen recibida.
            Storage::disk('public')->put($logoName, $logo); // Se almacena la imagen en public/uploads/image.ext
            $mascota->imagen = $logoName;
        }
        else {
            $mascota->imagen = "ninguna";
        };
        $mascota->telefono = $request->telefono;
        $mascota->lugar = $request->lugar;
        $mascota->descripcion = $request->descripcion;
        $mascota->condicion = '1';
        $mascota->idduenio = \Auth::user()->id;
        $mascota->save();
    }
    public function update(Request $request)
    {
        if (!$request->ajax()) return redirect('/');
        $mascota = Mascota::findOrFail($request->id);
        $mascota->id = $request->id;
        $mascota->idespecie = $request->idespecie;
        $mascota->nombre = $request->nombre;
        if ($request->imagen && $request->imagen != $mascota->imagen) {
            $logo = $request->imagen;  //Se obtienen los datos de la imagen desde la solicitud.
            $ext = explode(";", $logo); // Se dividen los datos, en este caso se obtiene la informacion antes del ";" "data:image/jpeg;".
            $ext = str_replace('data:image/', '', $ext); // Se reemplazan los datos "data:image/" por vacio para generar una nueva cadena y obtener la extension de la imagen "jpeg".
            $ext = $ext[0]; // En este punto $ext es un arreglo de datos, por lo tanto la extension de la imagen se encuentra en la primera posicion "0".
            $logo = str_replace('data:image/'. $ext .';base64,', '', $logo); // Se elimina la data inicial de la imagen para luego ser decodificada.
            $logo = base64_decode($logo); //Se decodifica la data de la imagen recibida.
            $logoName = $request->nombre.str_random(2).'.'. $ext; // Se asigna un nombre a la imagen recibida.
            Storage::disk('public')->put($logoName, $logo); // Se almacena la imagen en public/uploads/image.ext
            $mascota->imagen = $logoName;
        };
        $mascota->telefono = $request->telefono;
        $mascota->lugar = $request->lugar;
        $mascota->descripcion = $request->descripcion;
        $mascota->condicion = '1';
        $mascota->save();
    }

    public function desactivar(Request $request)
    {
        if (!$request->ajax()) return redirect('/');
        $mascota = Mascota::findOrFail($request->id);
        $mascota->condicion = '0';
        $mascota->save();
    }

    public function activar(Request $request)
    {
        if (!$request->ajax()) return redirect('/');
        $mascota = Mascotas::findOrFail($request->id);
        $mascota->condicion = '1';
        $mascota->save();
    }
    public function delanteroCat(Request $request)
    {
        $mascotas = Mascota::join('especies','especies.id','=','mascotas.idespecie')
            ->select('mascotas.id','mascotas.idespecie','especies.nombre as nombre_especie','mascotas.nombre','mascotas.imagen')
            ->where('mascotas.condicion','=','1')
            ->where('especies.nombre','Gato')
            ->orderBy('mascotas.id', 'desc')->paginate(10);
        
        return view('mascotas.gatos', compact('mascotas'));
    }
    public function mostrarDetalleCat($id){
                
        $mascota = Mascota::find($id);

        $duenio = Persona::join('mascotas','mascotas.idduenio','=','personas.id')
        ->select('mascotas.id','personas.id','personas.nombre','personas.email')
        ->where('mascotas.id',$id)
        ->get();
        
        $telefonos = Post::select('posts.nombre','posts.asunto','posts.email','posts.descripcion')
        ->where('posts.idmascota',$id)
        ->get();

        return view('mascotas.bloggato', compact('mascota','duenio','telefonos'));
    }
    public function delanteroDog(Request $request)
    {
        $mascotas = Mascota::join('especies','especies.id','=','mascotas.idespecie')
            ->select('mascotas.id','mascotas.idespecie','especies.nombre as nombre_especie','mascotas.nombre','mascotas.imagen')
            ->where('mascotas.condicion','=','1')
            ->where('especies.nombre','Perro')
            ->orderBy('mascotas.id', 'desc')->paginate(10);
        
        return view('mascotas.perros', compact('mascotas'));
    }
    public function mostrarDetalleDog($id){
                
        $mascota = Mascota::find($id);

        $duenio = Persona::join('mascotas','mascotas.idduenio','=','personas.id')
        ->select('mascotas.id','personas.id','personas.nombre','personas.email')
        ->where('mascotas.id',$id)
        ->get();
        $telefonos = Post::select('posts.nombre','posts.asunto','posts.email','posts.descripcion')
        ->where('posts.idmascota',$id)
        ->get();
        
        return view('mascotas.blogperro', compact('mascota','duenio','telefonos'));
    }
    
}
