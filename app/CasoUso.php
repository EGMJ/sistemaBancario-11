<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CasoUso extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'caso_usos';

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
    protected $fillable = ['cod', 'nombre', 'descripcion', 'id_menu'];

    
}
