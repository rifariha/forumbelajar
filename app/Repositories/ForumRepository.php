<?php

namespace App\Repositories;

use App\Models\Forum;
use App\Repositories\BaseRepository;

/**
 * Class ForumRepository
 * @package App\Repositories
 * @version June 23, 2020, 11:47 am UTC
*/

class ForumRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'topic_id',
        'parent_id',
        'user_id',
        'comment'
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

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Forum::class;
    }
}
