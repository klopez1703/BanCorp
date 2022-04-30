<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reporte extends Model
{

    protected $table = 'reportes';
    protected $primaryKey = 'ID_REPORTE';
    public $timestamps = false;
    protected $fillable = ['ID_REPORTE','COD_CTA','COD_USUARIO','CLAVE','NUM_CTA','TIP_CTA', 'FEC_REGISTRO', 'SAL_CTA', 'IND_CTA'];
}
