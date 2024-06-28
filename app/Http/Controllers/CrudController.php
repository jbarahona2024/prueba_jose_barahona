<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Usuario;

class crudcontroller extends Controller
{

    public function index (){
        $datos = DB:: select ("select * FROM laravel.usuario");

        return view ("welcome")->with("datos", $datos); 
    }  
   
    public function create()
    {
        return view('usuario.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'apodo' => 'required|max:255',
            'contrasenha' => 'required'
        ]);
        
        Usuario::create($request -> all());
        return redirect()->route('usuario.index');
    }

    public function show(Usuario $usuario)
    {
        return view('usuario.show', compact('usuario'));
    }

    public function edit(Usuario $usuario)
    {
        return view('usuario.edit', compact('usuario'));
    }

    public function update(Request $request, Usuario $usuario)
    {
        $validatedData = $request->validate([
            'apodo' => 'required|max:255',
            'contrasenha' => 'required'
        ]);
        $usuario->update($validatedData);
        return redirect('/usuario')->with('success', 'Usuario actualizado exitosamente.');
    }

    public function destroy(Usuario $usuario)
    {
        $usuario->delete();
        return redirect('/usuario')->with('success', 'Usuario eliminado exitosamente.');
    }

}
