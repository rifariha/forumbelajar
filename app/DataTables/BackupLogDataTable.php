<?php

namespace App\DataTables;

use App\Models\BackupLog;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;

class BackupLogDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        $dataTable = new EloquentDataTable($query);
        $dataTable->editColumn('topic_id', function ($data) {
            return $data->topic->topic_name;
        }); 
        $dataTable->editColumn('folder', function($data)
        {
            $folder = 'discussion/backup/'.$data->folder;
            $link = url('storage/'.$folder.'/'.$data->filename);
            return "<a href=$link><button class='btn btn-md btn-success'> Download </button></a>";
        });
        $dataTable->editColumn('created_at', function ($data) {
            $str = strtotime($data->created_at);
            return date('d-m-Y H:i:s', $str);
        });

        $dataTable->rawColumns(['topic_id', 'created_at','folder'])->make(true);
        return $dataTable;
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\BackupLog $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(BackupLog $model)
    {
        $model = BackupLog::with('topic')->orderBy('id','desc');
        return $model;
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->parameters([
                'stateSave' => true,
                'order'     => [[0, 'desc']],
            ]);
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            ['data' => 'topic_id', 'title' => 'Materi Diskusi', 'searchable' => false],
            ['data' => 'created_at', 'title' => 'Tanggal Backup'],
            ['data' => 'created_by', 'title' => 'Dibackup Oleh'],
            ['data' => 'folder', 'title' => 'Download File'],
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return '$MODEL_NAME_PLURAL_SNAKE_$datatable_' . time();
    }
}
