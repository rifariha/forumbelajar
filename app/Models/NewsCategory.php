<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class NewsCategory
 * @package App\Models
 * @version June 28, 2020, 10:31 am UTC
 *
 * @property string $category_name
 */
class NewsCategory extends Model
{

    public $table = 'news_category';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';




    public $fillable = [
        'category_name'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'category_name' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'category_name' => 'required'
    ];

    
}
