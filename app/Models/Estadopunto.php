<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Estadopunto
 *
 * @property $id
 * @property $nom
 * @property $created_at
 * @property $updated_at
 *
 * @property Punto[] $puntos
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Estadopunto extends Model
{
    
    static $rules = [
		'nom' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nom'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function puntos()
    {
        return $this->hasMany('App\Models\Punto', 'estadopunto_id', 'id');
    }
    

}
