<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Credito extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'creditos';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['monto', 'plaso', 'interes', 'monto_pagado', 'saldo', 'id_cuenta', 'id_banco'];

    
}
