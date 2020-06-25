<?php

namespace App\Models;

use Eloquent as Model;
// use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * Class User
 * @package App\Models
 * @version June 23, 2020, 9:04 am UTC
 *
 * @property string $name
 * @property string $email
 * @property string $username
 * @property string|\Carbon\Carbon $email_verified_at
 * @property string $password
 * @property string $phone
 * @property string $image
 * @property boolean $status
 * @property string $bmkz_origin
 * @property string $mz_origin
 * @property string $suluk
 * @property string $alumni
 * @property string $remember_token
 */
class User extends Authenticatable
{
    // use SoftDeletes;
    use HasRoles;

    public $table = 'users';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'name',
        'email',
        'username',
        'email_verified_at',
        'password',
        'phone',
        'image',
        'status',
        'address',
        'bmkz_origin',
        'mz_origin',
        'suluk',
        'alumni',
        'remember_token'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'email' => 'string',
        'username' => 'string',
        'email_verified_at' => 'datetime',
        'password' => 'string',
        'phone' => 'string',
        'image' => 'string',
        'address' => 'string',
        'status' => 'boolean',
        'bmkz_origin' => 'string',
        'mz_origin' => 'string',
        'suluk' => 'string',
        'alumni' => 'string',
        'remember_token' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required',
        'email' => 'required',
        'username' => 'required|unique:users|min:6',
        'password' => 'required|confirmed|min:6',
        'status' => 'required',
        'address' => 'required',
        'bmkz_origin' => 'required',
        'mz_origin' => 'required',
        'suluk' => 'required',
        'alumni' => 'required'
    ];

    public static $editrules = [
        'name' => 'required',
        'email' => 'required',
        'status' => 'required',
        'address' => 'required',
        'bmkz_origin' => 'required',
        'mz_origin' => 'required',
        'suluk' => 'required',
        'alumni' => 'required'
    ];
    
    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = bcrypt($password);
    }

    
}
