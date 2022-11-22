<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Tipopunto
 *
 * @property $id
 * @property $digital
 * @property $analogico
 * @property $created_at
 * @property $updated_at
 *
 * @property Punto[] $puntos
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Tipopunto extends Model
{
    
    static $rules = [
		'tipo' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['tipo'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function puntos()
    {
        return $this->hasMany('App\Models\Punto', 'tipopunto_id', 'id');
    }
    

}
