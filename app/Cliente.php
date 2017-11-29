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
    protected $fillable = ['tipo','nombre', 'paterno', 'materno', 'ci', 'fecha_nacimiento', 'genero', 'correo', 'telefono', 'id_banco'];

    public function scope_getClientesBanco($query ,$id_banco){
        $clientes=$query->where('id_banco',$id_banco)->select(
            'id',DB::raw('concat(nombre," ",paterno," ",materno)as nombre ')

        );
        return $clientes;
    }

    public function scope_login($query, $correo)
    {
        $contra = $query->where('correo', $correo)
            ->select('correo as correo', 'ci as password', 'nombre as nombre')->get();
        return $contra;
    }

    public function scope_datos($query, $correo)
    {
        $datos = $query->where('correo', $correo)->get();
        return $datos;
    }

    public function scope_transacciones($query, $correo)
    {
        $datos = $query
           ->join('cuentas', 'clientes.id', '=', 'id_cliente')
           ->join('historicos','historicos.id_cuenta', 'cuentas.id')
            ->where('clientes.correo', $correo)
            ->select('monto as monto','tipo as tipo','moneda as moneda','detalle as detalle','fecha as fecha')
            ->get();
        return $datos;
    }
    public function scope_saldo($query, $correo)
    {
        $datos = $query
            ->join('cuentas', 'clientes.id', '=', 'id_cliente')
            ->join('historicos','historicos.id_cuenta', 'cuentas.id')
            ->where('clientes.correo', $correo)
            ->select('historicos.saldo as saldo','moneda as moneda')

            ->get()->last();
        return $datos;
    }

}
