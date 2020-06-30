<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class TopicLesson
 * @package App\Models
 * @version June 23, 2020, 11:51 am UTC
 *
 * @property integer $topic_id
 * @property string $lesson
 */
class TopicLesson extends Model
{

    public $table = 'topic_lesson';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'topic_id',
        'lesson'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'topic_id' => 'integer',
        'lesson' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'lesson' => 'required'
    ];

    
}
