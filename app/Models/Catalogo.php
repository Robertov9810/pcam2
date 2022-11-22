<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Catalogo
 *
 * @property $id
 * @property $zona_id
 * @property $subestacion_id
 * @property $siglas
 * @property $voltaje
 * @property $estatus
 * @property $created_at
 * @property $updated_at
 *
 * @property Subestacione $subestacione
 * @property Zona $zona
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Catalogo extends Model
{
    
    //se definen que se requieren que los campos de las tablas
    //'zona_id','subestacion_id','siglas','voltaje','estatus' no sean con el valor null
    static $rules = [
		'zona_id' => 'required',
		'subestacion_id' => 'required',
		'siglas' => 'required',
		'voltaje' => 'required',
		'estatus' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['zona_id','subestacion_id','siglas','voltaje','estatus'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */

    public function subestacione()
    {
        return $this->hasOne('App\Models\Subestacione', 'id', 'subestacion_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function zona()
    {
        return $this->hasOne('App\Models\Zona', 'id', 'zona_id');
    }
    

}
