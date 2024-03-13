<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Beneficiario
 *
 * @property $id
 * @property $name
 * @property $lastName
 * @property $DNI
 * @property $email
 * @property $phone
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Beneficiario extends Model
{
    
    static $rules = [
		'name' => 'required',
		'lastName' => 'required',
		'DNI' => 'required',
		'email' => 'required',
		'phone' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['name','lastName','DNI','email','phone'];



}
