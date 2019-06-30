<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        //
        return view('mantUsuario.mantenedorUsuario');
        //return User::where('id', auth()->id())->get();
    }

   
    public function store(Request $request)
    {
        
        $user = new User();
        $user->id = $request->id;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();

        return $user;
        
    }

    
    public function show($id)
    {
        //
    }

    
    public function update(Request $request, $id)
    {
        /*
        */
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();

        return $user;
    }

    
    public function destroy($id)
    {
        //
        $user = User::find($id);
        $user->delete();
    }
}
