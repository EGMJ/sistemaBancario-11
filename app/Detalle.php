<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Detalle extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'detalles';

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
    protected $fillable = ['fecha', 'id_caja', 'monto', 'id_banco', 'detalle'];

    
}
