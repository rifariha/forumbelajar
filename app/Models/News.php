<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class News
 * @package App\Models
 * @version June 23, 2020, 11:48 am UTC
 *
 * @property string $headline
 * @property string $created_by
 * @property string $content
 * @property string $image
 * @property integer $category_id
 */
class News extends Model
{

    public $table = 'news';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'headline',
        'created_by',
        'content',
        'image',
        'category_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'headline' => 'string',
        'created_by' => 'string',
        'content' => 'string',
        'image' => 'string',
        'category_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'headline' => 'required',
        'created_by' => 'required',
        'content' => 'required',
        'category_id' => 'required'
    ];

    
}
