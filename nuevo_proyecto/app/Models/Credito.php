<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Credito extends Model
{


    protected $table = 'tar_credito';
    protected $primaryKey = 'COD_TAR_CREDITO';
    public $timestamps = false;
    protected $fillable = ['TIPO_TARJETA','NOM_PERSONA','NUM_TARJETA','FECHA_CADU','CVV','CUOTAS', 'INTERES', 'MONTO_TOTAL','MES_PRIMER_CUOTA','DETALLE','MES_ULTIMA_CUOTA','COD_CTA'];
}
