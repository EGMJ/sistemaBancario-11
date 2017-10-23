<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Cliente extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'clientes';

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
    protected $fillable = ['nombre', 'paterno', 'materno', 'ci', 'fecha_nacimiento', 'genero', 'correo', 'telefono', 'id_banco'];

    public function scope_getClientesBanco($query ,$id_banco){
        $clientes=$query->where('id_banco',$id_banco)->select(
            'id',DB::raw('concat(nombre," ",paterno," ",materno)as nombre ')

        );
        return $clientes;
    }
    
}
