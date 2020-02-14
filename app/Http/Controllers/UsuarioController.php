<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Usuario;

class UsuarioController extends Controller
{
    public function index() {
        
        $usuarios = Usuario::all();

        $argumentos = array();
        $argumentos['usuario'] = $usuarios;
        
        return view('usuarios.index', $argumentos);
    }

    public function show($id) {
        //Busca un registro a partir de la
        //llave primaria
        //SELECT * FROM noticias WHERE id = 4
        $usuarios = Usuario::find($id);

        $argumentos = array();
        $argumentos['usuario'] = $usuarios;

        return view('usuarios.show',$argumentos);
    }
}
