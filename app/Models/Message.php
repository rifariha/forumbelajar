<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class Message
 * @package App\Models
 * @version June 23, 2020, 11:48 am UTC
 *
 * @property string $subject
 * @property string $sender_name
 * @property string $message
 * @property integer $user_id
 * @property boolean $status
 */
class Message extends Model
{

    public $table = 'message';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'subject',
        'sender_name',
        'message',
        'user_id',
        'status'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'subject' => 'string',
        'sender_name' => 'string',
        'message' => 'string',
        'user_id' => 'integer',
        'status' => 'boolean'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'subject' => 'required',
        'sender_name' => 'required',
        'message' => 'required',
        'user_id' => 'required',
        'status' => 'required'
    ];

    
}
