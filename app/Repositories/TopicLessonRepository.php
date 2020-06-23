<?php

namespace App\Repositories;

use App\Models\TopicLesson;
use App\Repositories\BaseRepository;

/**
 * Class TopicLessonRepository
 * @package App\Repositories
 * @version June 23, 2020, 11:51 am UTC
*/

class TopicLessonRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'topic_id',
        'lesson'
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
        return TopicLesson::class;
    }
}
