<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class Topic
 * @package App\Models
 * @version June 23, 2020, 11:50 am UTC
 *
 * @property integer $chapter_id
 * @property string $image
 * @property string $topic_name
 * @property string $created_by
 * @property string $short_description
 */
class Topic extends Model
{

    public $table = 'topic';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'chapter_id',
        'image',
        'topic_name',
        'created_by',
        'short_description'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'chapter_id' => 'integer',
        'image' => 'string',
        'topic_name' => 'string',
        'created_by' => 'string',
        'short_description' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'chapter_id' => 'required',
        'topic_name' => 'required',
        'created_by' => 'required',
        'short_description' => 'required'
    ];

    
}
