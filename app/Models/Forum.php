<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class Forum
 * @package App\Models
 * @version June 23, 2020, 11:47 am UTC
 *
 * @property integer $topic_id
 * @property integer $parent_id
 * @property integer $user_id
 * @property string $comment
 */
class Forum extends Model
{

    public $table = 'forum';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'topic_id',
        'parent_id',
        'user_id',
        'comment'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'topic_id' => 'integer',
        'parent_id' => 'integer',
        'user_id' => 'integer',
        'comment' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'comment' => 'required'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id','id');
    }

    public function descendant()
    {
        return $this->hasMany(Forum::class,'parent_id','id')->with('user');
    }

    public function topic()
    {
        return $this->belongsTo(Topic::class, 'topic_id', 'id');
    }
    
}
