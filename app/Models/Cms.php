<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class Cms
 * @package App\Models
 * @version June 23, 2020, 11:46 am UTC
 *
 * @property string $cms_name
 * @property string $content
 */
class Cms extends Model
{

    public $table = 'cms_page';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'cms_name',
        'content'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'cms_name' => 'string',
        'content' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'cms_name' => 'required',
        'content' => 'required'
    ];

    
}
