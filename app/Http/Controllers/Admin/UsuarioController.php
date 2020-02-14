<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;



use App\Usuario;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuarios = Usuario::all();
        $argumentos = array();
        $argumentos['usuario'] = $usuarios;
        return view('admin.usuarios.index',
            $argumentos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('admin.usuarios.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $verification = Usuario::where('email', $request->input('email'))->first();
       $usuario = new Usuario();
        $usuario->name = $request->input('txtNombre');
        $usuario->email = $request->input('txtEmail');
        $usuario->password = bcrypt($request->input('txtContrasena'));
        if($usuario->save()) {
            //Si pude guardar la usuario
            return redirect()->
                route('usuarios.index')->
                with('exito',
                'El usuario fue guardada correctamente');
        } 
        return redirect()->
        route('usuarios.create')->
        with('error',
        'No se pudo agregar el Usuario.');
        if($verification){
            return redirect()->
            route('usuarios.create')->
            with('error',
            'El usuario' . $request->input('email') . 'ya existe.');
        }
       
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $usuario = Usuario::find($id);
        if ($usuario) {
            $argumentos = array();
            $argumentos['usuario'] = $usuario;
            return view('admin.usuarios.show', 
                $argumentos);
        }
        return redirect()->
                route('usuarios.index')->
                with('error','No se encontró el usuario.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $usuario = Usuario::find($id);
        if ($usuario) {
            $argumentos = array();
            $argumentos['usuario'] = $usuario;
            return view('admin.usuarios.edit', 
                $argumentos);
        }
        return redirect()->
                route('usuarios.index')->
                with('error','No se encontró el usuario.');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $usuario = Usuario::find($id); 
        if ($usuario) {
            $usuario->name =
                $request->input('txtNombre');
           
            $usuario->password->input('txtContrasena');
            if ($usuario->save()) {
                return redirect()->
                    route('usuarios.edit',$id)->
                    with('exito',
                    'El usuario se actualizó exitosamente');
            }
            return redirect()->
                route('usuarios.edit',$id)->
                with('error',
                    'No se pudo actualizar usuario');
        }
        return redirect()->
            route('usuarios.index')->
            with('error',
                'No se encontró el usuario');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $usuario = Usuario::find($id);
        if ($usuario) {
            if($usuario->delete()) {
                return redirect()->
                        route('usuarios.index')->
                        with('exito','Usuario eliminado exitosamente.');
            }
            return redirect()->
                    route('usuarios.index')->
                    with('error','No se pudo eliminar el usuario.');
        }
        return redirect()->
                route('usuarios.index')->
                with('error','No se encotró el usuario.');
    }
}
