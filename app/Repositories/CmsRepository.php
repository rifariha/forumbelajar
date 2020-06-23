<?php

namespace App\Repositories;

use App\Models\Cms;
use App\Repositories\BaseRepository;

/**
 * Class CmsRepository
 * @package App\Repositories
 * @version June 23, 2020, 11:46 am UTC
*/

class CmsRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'cms_name',
        'content'
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
        return Cms::class;
    }
}
