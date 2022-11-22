<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Zona
 *
 * @property $id
 * @property $nombre
 * @property $siglas
 * @property $descripcion
 * @property $gerencia_id
 * @property $created_at
 * @property $updated_at
 *
 * @property Gerencia $gerencia
 * @property Subestacione[] $subestaciones
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Zona extends Model
{
    
    static $rules = [
   
		'nombre' => 'required',
		'siglas' => 'required',
		'descripcion' => 'required',
		'gerencia_id' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre','siglas','descripcion','gerencia_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function gerencia()
    {
        return $this->hasOne('App\Models\Gerencia', 'id', 'gerencia_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
   

}
