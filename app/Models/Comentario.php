<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Comentario
 *
 * @property $id
 * @property $fecha_hora
 * @property $texto
 *
 * @property Punto[] $puntos
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Comentario extends Model
{
    
    static $rules = [
		'texto' => 'required',
    'punto_id' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['texto', 'punto_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function puntos()
    {
        return $this->hasMany('App\Models\Punto', 'comentario_id', 'id');
    }
    

}
