<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaccion extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'transaccions';

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
    protected $fillable = ['fecha', 'monto', 'id_banco', 'id_cuenta', 'id_cuenta_destino'];

    
}
