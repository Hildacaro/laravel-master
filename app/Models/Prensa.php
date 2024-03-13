<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Prensa
 *
 * @property $id
 * @property $title
 * @property $date
 * @property $URL
 * @property $photo
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Prensa extends Model
{
    protected $table = 'prensa';

    static $rules = [
		'title' => 'required',
		'date' => 'required',
		'URL' => 'required',
        'photo' => 'required'
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['title', 'date', 'URL', 'photo'];



}
