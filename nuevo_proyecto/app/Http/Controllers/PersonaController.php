<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;
use App\Models\Persona;
use Illuminate\Http\Request;

class PersonaController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
        $response = Http::get('http://localhost:3000/personas/leerpersonas');
        return view('Persona/persona')->with('resulpersona', json_decode($response, true));    
    }

    public function guardar(Request $p)
    {
        $codigo = $p->COD_PERSONA;
        $nombre = $p->NOM_PERSONA;
        $apellido = $p->APE_PERSONA;
        $identidad = $p->IDENTIDAD;
        $sexo= $p->SEX_PERSONA;
        $estadocivil = $p->IND_CIVIL;
        $edad = $p->EDA_PERSONA;
        $direccion= $p->DIR_PERSONA;
        $tipo= $p->TIP_PERSONA;
        $estado= $p->IND_PERSONA;
        $usuarioregistro= $p->USR_REGISTRO;
        $fecharegistro = date('Y-m-d');

        Persona::create([
            'COD_PERSONA' => $codigo, 'NOM_PERSONA' => $nombre, 'APE_PERSONA' => $apellido, 
            'IDENTIDAD' => $identidad, 'SEX_PERSONA' => $sexo, 'IND_CIVIL' => $estadocivil,
            'EDA_PERSONA' => $edad, 'DIR_PERSONA' => $direccion, 'TIP_PERSONA' => $tipo, 
            'IND_PERSONA' => $estado, 'USR_REGISTRO' => $usuarioregistro, 'FEC_REGISTRO' => $fecharegistro, 
        ]);

        return redirect('/Persona');
        
    }
    function eliminar($id){
        $verP = Persona::select('COD_PERSONA')
        ->where('COD_PERSONA', $id)
        ->delete();
     return redirect('/Persona');
     
    }

    function editar($id){
        $editar = Persona::select('COD_PERSONA','NOM_PERSONA', 'APE_PERSONA', 'IDENTIDAD', 'SEX_PERSONA', 'IND_CIVIL', 'EDA_PERSONA', 'DIR_PERSONA',
        'TIP_PERSONA', 'IND_PERSONA', 'USR_REGISTRO', 'FEC_REGISTRO')
        ->where('COD_PERSONA', $id)
        ->first();

        return view('Persona/editar')->with('resulpersona', $editar);
    }

    function actualizar(Request $p3){
        
        $codigo = $p3->COD_PERSONA;
        $nombre = $p3->NOM_PERSONA;
        $apellido = $p3->APE_PERSONA;
        $identidad = $p3->IDENTIDAD;
        $sexo= $p3->SEX_PERSONA;
        $estadocivil = $p3->IND_CIVIL;
        $edad = $p3->EDA_PERSONA;
        $direccion= $p3->DIR_PERSONA;
        $tipo= $p3->TIP_PERSONA;
        $estado= $p3->IND_PERSONA;
        $usuarioregistro= $p3->USR_REGISTRO;

        $actu =Persona::select('COD_PERSONA','NOM_PERSONA', 'APE_PERSONA', 'IDENTIDAD', 'SEX_PERSONA', 'IND_CIVIL', 'EDA_PERSONA', 'DIR_PERSONA',
        'TIP_PERSONA', 'IND_PERSONA', 'USR_REGISTRO')
        ->where('COD_PERSONA', $codigo)
        ->update([
            'COD_PERSONA' => $codigo, 'NOM_PERSONA' => $nombre, 'APE_PERSONA' => $apellido, 
            'IDENTIDAD' => $identidad, 'SEX_PERSONA' => $sexo, 'IND_CIVIL' => $estadocivil,
            'EDA_PERSONA' => $edad, 'DIR_PERSONA' => $direccion, 'TIP_PERSONA' => $tipo, 
            'IND_PERSONA' => $estado, 'USR_REGISTRO' => $usuarioregistro
        ]);

      return redirect('/Persona');
    }
    
}


