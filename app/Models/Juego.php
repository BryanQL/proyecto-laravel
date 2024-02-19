<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Juego
 *
 * @property $id
 * @property $nombre
 * @property $consola_id
 * @property $fecha
 * @property $created_at
 * @property $updated_at
 *
 * @property Consola $consola
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Juego extends Model
{
    
    static $rules = [
		'nombre' => 'required',
		'consola_id' => 'required',
		'fecha' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre','consola_id','fecha'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function consola()
    {
        return $this->hasOne('App\Models\Consola', 'id', 'consola_id');
    }
    

}
