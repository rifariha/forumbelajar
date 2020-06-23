<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class Slider
 * @package App\Models
 * @version June 23, 2020, 11:50 am UTC
 *
 * @property string $slider_name
 * @property string $image
 * @property string $desription
 */
class Slider extends Model
{

    public $table = 'slider';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'slider_name',
        'image',
        'desription'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'slider_name' => 'string',
        'image' => 'string',
        'desription' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'slider_name' => 'required',
        'image' => 'required'
    ];

    
}
