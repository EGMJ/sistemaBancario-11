<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RolCu extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'rol_menu';

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
    protected $fillable = ['id_rol', 'id_menu'];

    
}
