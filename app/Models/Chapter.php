<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class chapter
 * @package App\Models
 * @version June 23, 2020, 3:29 am UTC
 *
 * @property string $chapter_name
 * @property string $short_description
 * @property string $description
 * @property string $image
 */
class Chapter extends Model
{
    use SoftDeletes;

    public $table = 'chapters';
    

    protected $dates = ['deleted_at'];



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
        'description' => 'required'
    ];

    
}
