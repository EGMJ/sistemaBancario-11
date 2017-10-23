<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BancoMoneda extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'banco_monedas';

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
    protected $fillable = ['id_moneda', 'id_banco'];

    
}
