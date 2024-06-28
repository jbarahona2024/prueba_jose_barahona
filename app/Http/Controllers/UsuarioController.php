<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UsuarioController extends Controller
{
    public function index() {
        $datos = DB::select("select * FROM usuario");
        return view("welcome")->with("datos", $datos); 
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

        try {
            DB::insert('insert into usuario (apodo, contrasenha) values (?, ?)', [
                $request->apodo, $request->contrasenha
            ]);
            return redirect()->route('usuario.index')->with('success', 'Usuario creado exitosamente.');
        } catch (\Exception $e) {
            return redirect()->route('usuario.create')->with('error', 'Hubo un problema al crear el usuario.');
        }
    }

    public function show($id)
    {
        $usuario = DB::select('select * from usuario where id = ?', [$id]);
        if (!$usuario) {
            return redirect()->route('usuario.index')->with('error', 'Usuario no encontrado.');
        }
        return view('usuario.show', ['usuario' => $usuario[0]]);
    }

    public function edit($id)
    {
        $usuario = DB::select('select * from usuario where id = ?', [$id]);
        if (!$usuario) {
            return redirect()->route('usuario.index')->with('error', 'Usuario no encontrado.');
        }
        return view('usuario.edit', ['usuario' => $usuario[0]]);
    }

    public function update(Request $request)
    {
        /*$validatedData = $request->validate([
            'apodo' => 'required|max:255',
            'contrasenha' => 'required'
        ]);*/

        try {
            DB::update('update usuario set apodo = ?, contrasenha = ? where id = ?', [
                $request->apodo, $request->contrasenha, $request->id
            ]);
            return redirect()->route('usuario.index')->with('success', 'Usuario actualizado exitosamente.');
        } catch (\Exception $e) {
            return redirect()->route('usuario.index')->with('error', 'Hubo un problema al actualizar el usuario.');
        }
    }

    public function destroy($id)
    {
        try {
            DB::delete('delete from usuario where id = ?', [$id]);
            return redirect()->route('usuario.index')->with('success', 'Usuario eliminado exitosamente.');
        } catch (\Exception $e) {
            return redirect()->route('usuario.index')->with('error', 'Hubo un problema al eliminar el usuario.');
        }
    }
}