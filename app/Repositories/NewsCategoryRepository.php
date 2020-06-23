<?php

namespace App\Repositories;

use App\Models\NewsCategory;
use App\Repositories\BaseRepository;

/**
 * Class NewsCategoryRepository
 * @package App\Repositories
 * @version June 23, 2020, 11:49 am UTC
*/

class NewsCategoryRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'category_name'
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
        return NewsCategory::class;
    }
}
