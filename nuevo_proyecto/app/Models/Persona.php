<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    protected $table = 'personas';
    protected $primaryKey = 'COD_PERSONA';
    public $timestamps = false;
    protected $fillable = ['NOM_PERSONA', 'APE_PERSONA', 'IDENTIDAD', 'SEX_PERSONA', 'IND_CIVIL', 'EDA_PERSONA', 'DIR_PERSONA',
    'TIP_PERSONA', 'IND_PERSONA', 'USR_REGISTRO', 'FEC_REGISTRO'];
}