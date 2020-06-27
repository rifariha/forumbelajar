<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class Chapter
 * @package App\Models
 * @version June 26, 2020, 3:24 am UTC
 *
 * @property string $chapter_name
 * @property string $short_description
 * @property string $description
 * @property string $image
 */
class Chapter extends Model
{

    public $table = 'chapters';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    public $fillable = [
        'chapter_name',
        'short_description',
        'description',
        'image'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'chapter_name' => 'string',
        'short_description' => 'string',
        'description' => 'string',
        'image' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'chapter_name' => 'required',
        'short_description' => 'required',
        'description' => 'required',
    ];

    public static $editrules = [
        'chapter_name' => 'required',
        'short_description' => 'required',
        'description' => 'required',
    ];

    
}
