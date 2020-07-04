<?php

namespace App\Models;

use Eloquent as Model;
/**
 * Class BackupLog
 * @package App\Models
 * @version June 24, 2020, 11:47 am UTC
 *
 * @property integer $topic_id
 * @property boolean $status
 * @property string $created_by
 */
class BackupLog extends Model
{

    public $table = 'backup_log';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];

    public $fillable = [
        'topic_id',
        'status',
        'created_by',
        'folder',
        'filename',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'topic_id' => 'integer',
        'status' => 'boolean',
        'created_by' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'topic_id' => 'required',
        'status' => 'required',
        'created_by' => 'required'
    ];

    public function topic()
    {
        return $this->belongsTo(Topic::class, 'topic_id','id');
    }
    
}
