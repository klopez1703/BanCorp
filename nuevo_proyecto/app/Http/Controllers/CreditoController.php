<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;

use App\Models\Credito;

use Illuminate\Http\Request;

class CreditoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {        
        $response = Http::get('http://localhost:3000/tarjeta_credito/tar_credito');
        return view('Credito/credito')->with('resulcredito', json_decode($response, true));
    }

    public function guardar(Request $p)
    {        
        $tipo_tar = $p->TIPO_TARJETA;
        $NomP = $p->NOM_PERSONA;
        $numt = $p->NUM_TARJETA;
        
        $fecha = $p->FECHA_CADU;
        $cvv = $p->CVV;
        $cuotas = $p->CUOTAS;
        $interes = $p->INTERES;
        $monto = $p->MONTO_TOTAL;
        $pcuota = $p->MES_PRIMER_CUOTA;
        $detalle = $p->DETALLE;
        $ucuota = $p->MES_ULTIMA_CUOTA;
        $fechapresta = date('Y-m-d');

        Credito::create([
            'TIPO_TARJETA' => $tipo_tar,'NOM_PERSONA' => $NomP, 'NUM_TARJETA' => $numt, 
            'FECHA_CADU' => $fecha, 'CVV' => $cvv, 'CUOTAS' => $cuotas,
            'INTERES' => $interes, 'MONTO_TOTAL' => $monto,'MES_PRIMER_CUOTA' => $pcuota,'DETALLE' => $detalle,
            'MES_ULTIMA_CUOTA' => $ucuota,
        ]);

        return redirect('/Credito');
    }

    public function eliminarC($id){
        $verP = Credito::select('COD_TAR_CREDITO')
        ->where('COD_TAR_CREDITO', $id)
        ->delete();

        return redirect('/Credito');
    }

    public function editar($id){
        $editar = Credito::select('COD_TAR_CREDITO', 'NOM_PERSONA','NUM_TARJETA', 'FECHA_CADU', 'CVV', 'CUOTAS', 'INTERES','MONTO_TOTAL','MES_PRIMER_CUOTA','DETALLE','MES_ULTIMA_CUOTA')
        ->where('COD_TAR_CREDITO', $id)
        ->first();

        return view('Credito/editar')->with('resulcredito', $editar);
    }

    public function actualizar(Request $p3){
        
        $cod_Tar = $p3->COD_TAR_CREDITO;
        $NomP = $p3->NOM_PERSONA;
        $numt = $p3->NUM_TARJETA;
        $fecha = $p3->FECHA_CADU;
        $cvv = $p3->CVV;
        $cuotas = $p3->CUOTAS;
        $interes = $p3->INTERES;
        $monto = $p3->MONTO_TOTAL;
        $pcuota = $p3->MES_PRIMER_CUOTA;
        $detalle = $p3->DETALLE;
        $ucuota = $p3->MES_ULTIMA_CUOTA;

        $actu = Credito::select('NOM_PERSONA', 'NUM_TARJETA', 'CVV')
        ->where('COD_TAR_CREDITO', $cod_Tar)
        ->update([
            'NOM_PERSONA' => $NomP, 'NUM_TARJETA' => $numt, 'CVV' => $cvv
        ]);

        return redirect('/Credito');
    }

}
