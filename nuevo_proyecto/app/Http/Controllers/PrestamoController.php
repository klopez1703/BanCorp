<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;
use App\Models\Prestamo;
use Illuminate\Http\Request;

class PrestamoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {        
        $response = Http::get('http://localhost:3000/prestamo/leer');
        return view('Prestamo/prestamo')->with('resulprestamo', json_decode($response, true));
    }

    public function guardar(Request $p)
    {        
        $importe = $p->IMPORTE_PRESTAMO;
        $interes = $p->INTERESES;
        $plazo = $p->PLAZO_ANUAL;
        $pagos = $p->N_PAGOSANUAL;
        $saldof = $p->SALDO_FINAL;
        $name = $p->NOMBRE;
        $apellido = $p->APELLIDO;
        $fechapresta = date('Y-m-d');

        Prestamo::create([
            'IMPORTE_PRESTAMO' => $importe, 'INTERESES' => $interes, 'PLAZO_ANUAL' => $plazo, 
            'N_PAGOSANUAL' => $pagos, 'SALDO_FINAL' => $importe, 'FECHA_PRESTAMO' => $fechapresta,
            'NOMBRE' => $name, 'APELLIDO' => $apellido
        ]);

        return redirect('/Prestamo');
    }

    public function eliminar($id){
        $verP = Prestamo::select('COD_PRESTAMO')
        ->where('COD_PRESTAMO', $id)
        ->delete();

        return redirect('/Prestamo');
    }

    public function editar($id){
        $editar = Prestamo::select('COD_PRESTAMO', 'INTERESES', 'PLAZO_ANUAL', 'N_PAGOSANUAL', 'NOMBRE', 'APELLIDO')
        ->where('COD_PRESTAMO', $id)
        ->first();

        return view('Prestamo/editar')->with('resulprestamo', $editar);
    }

    public function actualizar(Request $p3){
        
        $id = $p3->COD_PRESTAMO;
        $interes = $p3->INTERESES;
        $plazo = $p3->PLAZO_ANUAL;
        $pagos = $p3->N_PAGOSANUAL;
        $name = $p3->NOMBRE;
        $apellido = $p3->APELLIDO;

        $actu = Prestamo::select('COD_PRESTAMO', 'INTERESES', 'PLAZO_ANUAL', 'N_PAGOSANUAL','NOMBRE', 'APELLIDO')
        ->where('COD_PRESTAMO', $id)
        ->update([
            'INTERESES' => $interes, 'PLAZO_ANUAL' => $plazo, 'N_PAGOSANUAL' => $pagos, 'NOMBRE' => $name, 'APELLIDO' => $apellido
        ]);

        return redirect('/Prestamo');
    }

}
