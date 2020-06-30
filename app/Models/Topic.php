<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class Topic
 * @package App\Models
 * @version June 26, 2020, 10:36 am UTC
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
        'topic_name' => 'required',
        'short_description' => 'required',
    ];

    public static $editrules = [
        'topic_name' => 'required',
        'short_description' => 'required',
    ];

    public function chapter()
    {
        return $this->belongsTo(Chapter::class, 'chapter_id', 'id');
    }
}
