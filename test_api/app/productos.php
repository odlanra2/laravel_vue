<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class productos extends Model
{
    //
    //
    protected $table='productos';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'Nombre', 'Descripcion', 'Peso', 'Precio', 'categoria_id', 'foto'
    ];
}
