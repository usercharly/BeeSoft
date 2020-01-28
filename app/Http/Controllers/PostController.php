<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
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
            $posts = Post::join('mascotas','posts.idmascota','=','mascotas.id')
            ->select('posts.id','posts.nombre','posts.asunto','posts.email','mascotas.nombre as mascota')
            ->orderBy('posts.id', 'desc')->paginate(10);
        }
        else{
            $posts = Post::join('mascotas','posts.idmascota','=','mascotas.id')
            ->select('posts.id','posts.nombre','posts.asunto','posts.email','mascotas.nombre as mascota')
            ->where('posts.'.$criterio, 'like', '%'. $buscar . '%')
            ->orderBy('posts.id', 'desc')->paginate(20);
        }
    }else{
        if ($buscar==''){
            $posts = Post::join('mascotas','posts.idmascota','=','mascotas.id')
            ->join('personas','mascotas.idduenio','=','personas.id')
            ->select('posts.id','posts.nombre','posts.asunto','posts.email','mascotas.nombre as mascota')
            ->where('personas.id',$oveja)
            ->orderBy('posts.id', 'desc')->paginate(10);
        }
        else{
            $posts = Post::join('mascotas','posts.idmascota','=','mascotas.id')
            ->join('personas','mascotas.idduenio','=','personas.id')
            ->select('posts.id','posts.nombre','posts.asunto','posts.email','mascotas.nombre as mascota')
            ->where('posts.'.$criterio, 'like', '%'. $buscar . '%')
            ->where('personas.id',$oveja)
            ->orderBy('posts.id', 'desc')->paginate(3);
        }
    }

        return [
            'pagination' => [
                'total'        => $posts->total(),
                'current_page' => $posts->currentPage(),
                'per_page'     => $posts->perPage(),
                'last_page'    => $posts->lastPage(),
                'from'         => $posts->firstItem(),
                'to'           => $posts->lastItem(),
            ],
            'posts' => $posts
        ];
    }
    public function store(Request $request)
    {
        $mascota = new Post();
        $mascota->nombre = $request->nombre;
        $mascota->asunto = $request->asunto;
        $mascota->email = $request->email;
        $mascota->descripcion = $request->descripcion;
        $mascota->idmascota = $request->id;
        $mascota->save();

        return redirect('/');
    }
    public function delete(Request $request)
    {
        if (!$request->ajax()) return redirect('/');
        $post = Post::findOrFail($request->id);
        $post->delete();
    }
    
}
