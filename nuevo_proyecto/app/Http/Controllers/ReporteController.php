<?php

namespace App\Http\Controllers;
//incluimos Http
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Reporte;

class ReporteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $response = Http::get('http://localhost:3000/reporte/leer');
        return view('Reportes/reportes')->with('ResulReportes', json_decode($response,true));
    }

    
    public function guardar(Request $p)
    {        
        $id= $p->ID_REPORTE;
        $codcuenta= $p->COD_CTA;
        $codusu = $p->COD_USUARIO;
        $clave = $p->CLAVE;
        $numcuenta = $p->NUM_CTA;
        $tipocuenta = $p->TIP_CTA;
        $fecha = now();
        $saldo = $p->SAL_CTA;
        $estado = $p->IND_CTA;

        

        Reporte::create([
            'ID_REPORTE' => $id, 'COD_CTA' => $codcuenta, 'COD_USUARIO' => $codusu, 
            'CLAVE' => $clave, 'NUM_CTA' => $numcuenta, 'TIP_CTA' => $tipocuenta, 'FEC_REGISTRO' => $fecha,
            'SAL_CTA' => $saldo, 'IND_CTA' => $estado
        ]);

        return redirect('/Reportes');
    }
    
    public function eliminar($id){
        $verP = Reporte::select('ID_REPORTE')
        ->where('ID_REPORTE', $id)
        ->delete();

        return redirect('/Reportes');
    }
}