<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class Gallery
 * @package App\Models
 * @version June 27, 2020, 11:14 am UTC
 *
 * @property string $image
 * @property string $short_description
 * @property string $description
 */
class Gallery extends Model
{

    public $table = 'gallery';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    public $fillable = [
        'image',
        'short_description',
        'description'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'image' => 'string',
        'short_description' => 'string',
        'description' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'description' => 'required',
        'short_description' => 'required',
        'image' => 'required|mimes:jpg,jpeg,png|max:1500',
    ];

    
}
