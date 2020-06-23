<?php

namespace App\Repositories;

use App\Models\Chapter;
use App\Repositories\BaseRepository;

/**
 * Class chapterRepository
 * @package App\Repositories
 * @version June 23, 2020, 3:29 am UTC
*/

class ChapterRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'chapter_name',
        'short_description',
        'description',
        'image'
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
        return chapter::class;
    }
}
