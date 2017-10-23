<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Caja extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'cajas';

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
    protected $fillable = ['tipo', 'id_sucursal', 'id_banco', 'total'];

    
}
