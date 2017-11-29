<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dpf extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'dpfs';

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
    protected $fillable = ['monto', 'fecha_inicio', 'fecha_final', 'id_cliente', 'id_tipoDpf', 'id_banco'];

    
}
