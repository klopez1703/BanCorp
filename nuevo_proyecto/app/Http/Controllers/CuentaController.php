<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;
use App\Models\Cuenta;
use Illuminate\Http\Request;

class CuentaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $response = Http::get('http://localhost:3000/cuentas/leer');
        return view('Cuenta/cuenta')->with('resulcuenta', json_decode($response,true));
        
    }  
    
    public function guardar(Request $p)
    {
      
        $codigo = $p->COD_CUENTA;
        $numerocuenta = $p->NUMERO_CUENTA;
        $tipocuenta = $p->TIPO_CUENTA;
        $saldocuenta= $p->SALDO_CUENTA;
        $estadocuenta= $p->ESTADO_CUENTA;
        $fecharegistro = date('Y-m-d');

        Cuenta::create([
            'COD_CTA' => $codigo, 'NUM_CTA' => $numerocuenta, 'TIP_CTA' => $tipocuenta, 
            'SAL_CTA' => $saldocuenta, 'IND_CTA' => $estadocuenta,'FEC_REGISTRO' => $fecharegistro, 
        ]);

        
        return redirect('/Cuenta');
    }
    
    
        function eliminar($id){
        $verP = Cuenta::select('COD_CTA')
        ->where('COD_CTA', $id)
        ->delete();
        return redirect('/Cuenta');

        
    }
    
    public function editar($id){
        $editar = Cuenta::select('COD_CTA','NUM_CTA', 'TIP_CTA', 'SAL_CTA', 'IND_CTA','FEC_REGISTRO')
        ->where('COD_CTA', $id)
        ->first();

        return view('Cuenta/editar')->with('resulcuenta', $editar);
        
    }
    
    public function actualizar(Request $p3){
        
        $codigo = $p3->COD_CTA;
        $numerocuenta = $p3->NUM_CTA;
        $tipocuenta = $p3->TIP_CTA;
        $saldocuenta= $p3->SAL_CTA;
        $estadocuenta= $p3->IND_CTA;

        $actu =Cuenta::select('COD_CTA','NUM_CTA', 'TIP_CTA', 'SAL_CTA', 'IND_CTA')
        ->where('COD_CTA', $codigo)
        ->update([
            'COD_CTA' => $codigo, 'NUM_CTA' => $numerocuenta, 'TIP_CTA' => $tipocuenta, 
            'SAL_CTA' => $saldocuenta, 'IND_CTA' => $estadocuenta, 
        ]);

        return redirect('/Cuenta');
    }


}
