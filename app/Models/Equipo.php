<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Equipo
 *
 * @property $id
 * @property $name
 * @property $lastName
 * @property $photo
 * @property $position
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Equipo extends Model
{

    protected $table = 'equipo';

    static $rules = [
		'name' => 'required',
		'lastName' => 'required',
		'photo' => 'required',
		'position' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['name','lastName','photo','position'];



}
