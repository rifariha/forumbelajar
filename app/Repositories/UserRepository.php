<?php

namespace App\Repositories;

use App\Models\User;
use App\Repositories\BaseRepository;

/**
 * Class UserRepository
 * @package App\Repositories
 * @version June 25, 2020, 3:31 am UTC
*/

class UserRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'email',
        'username',
        'phone',
        'address',
        'bmkz_origin',
        'mz_origin',
        'suluk',
        'alumni',
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    public function findWhere($data)
    {
        $user = User::where($data)->first();
        return $user;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return User::class;
    }
}
