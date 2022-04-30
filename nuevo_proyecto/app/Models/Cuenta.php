<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cuenta extends Model
{


    protected $table = 'cuentas';
    protected $primaryKey = 'COD_CTA';
    public $timestamps = false;
    protected $fillable = ['NUM_CTA', 'TIP_CTA', 'FEC_REGISTRO', 'SAL_CTA','IND_CTA'];
}
