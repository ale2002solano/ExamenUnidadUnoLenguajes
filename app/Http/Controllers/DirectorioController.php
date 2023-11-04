<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\directorio;

class DirectorioController extends Controller
{
    //
    public function index(){
        $directorios= Directorio::all();//VARIABLE QUE CONTIENE TODOS LOS DIRECTORIOS
        return view('directorio',compact('directorios'));
    }

    public function create(){
        return view('crearEntrada');
    }
    public function search(){
        return view('buscar');
    }
    public function see(Request $request,$id){
        $directorios = Directorio::find($id);

        $directorios->id=$request->input("codigoEntrada");
        $directorios->nombre=$request->input("nombre");
        $directorios->apellido=$request->input("apellido");
        

        return view('vercontactos',compact('directorios'));
    }
    public function delete(){
        return view('eliminar');
    }

    public function store(Request $request){
        $directorios=new Directorio();
        
        $directorios->codigoEntrada=$request->input("codigoEntrada");
        $directorios->nombre=$request->input("nombre");
        $directorios->apellido=$request->input("apellido");
        $directorios->telefono=$request->input("telefono");
        $directorios->correo=$request->input("correo");
         
        $directorios->save();
        return redirect('directorio.inicio');
    }
}
