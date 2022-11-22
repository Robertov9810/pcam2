<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Subestacione
 *
 * @property $id
 * @property $nombre
 * @property $siglas
 * @property $enlace
 * @property $zona_id
 * @property $gerencia_id

 *
 * @property Gerencia $gerencia
 * @property Punto[] $puntos
 * @property Zona $zona
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Subestacione extends Model
{
    
    static $rules = [
		'nombre' => 'required',
		'siglas' => 'required',
        'voltaje' => 'required',
		'enlace' => 'required',
		'zona_id' => 'required',
		'gerencia_id' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre','siglas','voltaje','enlace','zona_id','gerencia_id'];


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
    public function puntos()
    {
        return $this->hasMany('App\Models\Punto', 'subestacion_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function zona()
    {
        return $this->hasOne('App\Models\Zona', 'id', 'zona_id');
    }
    

}
