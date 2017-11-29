<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoDpf extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'tipo_dpfs';

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
    protected $fillable = ['interes', 'tiempo',  'id_banco'];

    
}
