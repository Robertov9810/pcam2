<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Punto
 *
 * @property $id
 * @property $leyenda
 * @property $entity_name
 * @property $bin_in
 * @property $bin_out
 * @property $requerido_op
 * @property $fecha_cambio
 * @property $subestacion_id
 * @property $tipopunto_id
 * @property $estadopunto_id
 * @property $comentario_id
 * @property $created_at
 * @property $updated_at
 *
 * @property Comentario $comentario
 * @property Estadopunto $estadopunto
 * @property Subestacione $subestacione
 * @property Tipopunto $tipopunto
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Punto extends Model
{
    
    static $rules = [
		'leyenda' => 'required',
		'entity_name' => 'required',
		'bin_in' => 'required',
		'bin_out' => 'required',
		'estatus' => 'required',
        'comentario' => 'required',
        'control_validado' => 'required',
        'estadopunto_id' => 'required',
		'subestacion_id' => 'required',
		'tipopunto_id' => 'required',	
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
 
    protected $fillable = [
        'leyenda',
        'entity_name',
        'bin_in','bin_out',
        'estatus',
        'comentario',
        'control_validado',
        'estadopunto_id',
        'subestacion_id',
        'tipopunto_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function comentario()
    {
        return $this->hasOne('App\Models\Comentario', 'id', 'comentario');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function estadopunto()
    {
        return $this->hasOne('App\Models\Estadopunto', 'id', 'estadopunto_id');
    }
    
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
    public function tipopunto()
    {
        return $this->hasOne('App\Models\Tipopunto', 'id', 'tipopunto_id');
    }
    

}
