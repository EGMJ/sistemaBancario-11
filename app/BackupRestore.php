<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BackupRestore extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'backup_restores';

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
    protected $fillable = ['nombre', 'ruta', 'fecha', 'id_usuario', 'id_banco'];

    
}
