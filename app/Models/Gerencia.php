<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Gerencia
 *
 * @property $id
 * @property $nombre
 * @property $siglas
 * @property $descripcion
 * @property $created_at
 * @property $updated_at
 *
 * @property Subestacione[] $subestaciones
 * @property Zona[] $zonas
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Gerencia extends Model
{
  
    static $rules = [
		'nombre' => 'required',
		'siglas' => 'required',
		'acronimo' => 'required',
        'tipoproceso_id'=>'required',       
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre','siglas','acronimo','tipoproceso_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */

    public function tipoprocesos()
    {
        return $this->hasOne('App\Models\Tipoproceso', 'id', 'tipoproceso_id');
    }
    public function subestaciones()
    {
        return $this->hasMany('App\Models\Subestacione', 'gerencia_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function zonas()
    {
        return $this->hasMany('App\Models\Zona', 'gerencia_id', 'id');
    }
    
    

}
