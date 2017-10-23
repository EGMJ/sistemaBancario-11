<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoCuentum extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'tipo_cuentas';

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
    protected $fillable = ['nombre', 'interes', 'id_banco'];

    public function scope_getTipoCuentas($query ,$id_banco){
        $tipocuenta=$query->where('id_banco',$id_banco)->select(
            'id','nombre'

        );
        return $tipocuenta;
    }
}
