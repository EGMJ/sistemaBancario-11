<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cuentum extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'cuentas';

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
    protected $fillable = ['id_cliente', 'saldo', 'id_banco', 'id_tipo'];

    
}
