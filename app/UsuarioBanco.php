<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UsuarioBanco extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'usuario_bancos';

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
    protected $fillable = ['color', 'font_family', 'font_size', 'id_usuario', 'id_banco', 'id_rol'];

    
}
