<?php

namespace App\Repositories;

use App\Models\BackupLog;
use App\Repositories\BaseRepository;

/**
 * Class BackupLogRepository
 * @package App\Repositories
 * @version June 24, 2020, 11:47 am UTC
*/

class BackupLogRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'topic_id',
        'status',
        'created_by'
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
        return BackupLog::class;
    }
}
