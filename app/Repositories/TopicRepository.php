<?php

namespace App\Repositories;

use App\Models\Topic;
use App\Repositories\BaseRepository;

/**
 * Class TopicRepository
 * @package App\Repositories
 * @version June 26, 2020, 10:36 am UTC
*/

class TopicRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'chapter_id',
        'image',
        'topic_name',
        'created_by',
        'short_description'
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
        return Topic::class;
    }
}
