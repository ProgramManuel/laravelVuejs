<?php

namespace App\Http\Controllers;
use App\Comentario;
use Illuminate\Http\Request;


class ComentariosController extends Controller
{
    //Middleware
    public function __construct(){
        $this->middleware('auth');
    }

    public function index()
    {
        //
        return Comentario::where('user_id', auth()->id())->get();
    }

   
    public function store(Request $request)
    {
        //
        $comentario = new Comentario();
        $comentario->descripcion = $request->descripcion;
        $comentario->user_id = auth()->id();
        $comentario->save();

        return $comentario;
    }

    
    public function show($id)
    {
        //
    }

    
    public function update(Request $request, $id)
    {
        //
        $comentario = Comentario::find($id);
        $comentario->descripcion = $request->descripcion;
        $comentario->save();

        return $comentario;
    }

    
    public function destroy($id)
    {
        //
        $comentario = Comentario::find($id);
        $comentario->delete();
    }
}
