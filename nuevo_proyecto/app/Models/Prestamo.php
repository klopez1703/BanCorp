<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prestamo extends Model
{


    protected $table = 'prestamo';
    protected $primaryKey = 'COD_PRESTAMO';
    public $timestamps = false;
    protected $fillable = ['IMPORTE_PRESTAMO','INTERESES','PLAZO_ANUAL','N_PAGOSANUAL','SALDO_FINAL','FECHA_PRESTAMO', 'NOMBRE', 'APELLIDO'];
}
