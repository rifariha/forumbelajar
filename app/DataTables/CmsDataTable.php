<?php

namespace App\DataTables;

use App\Models\Cms;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;
use DB;

class CmsDataTable extends DataTable
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

        $dataTable->addColumn('action', 'cms.datatables_actions');
        return $dataTable;
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Cms $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Cms $model)
    {
        DB::statement(DB::raw('set @rownum=0'));
        $model = Cms::select([
            DB::raw('@rownum := @rownum + 1 AS number'),
            'id',
            'cms_name',
            'content',
            'created_at',
            'updated_at'
        ]);

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
            ->addAction(['width' => '120px', 'printable' => false])
            // ->parameters([
            //     'dom'       => 'Bfrtip',
            //     'stateSave' => true,
            //     'order'     => [[0, 'desc']],
            //     'buttons'   => [
            //         ['extend' => 'create', 'className' => 'btn btn-default btn-sm no-corner',],
            //         ['extend' => 'export', 'className' => 'btn btn-default btn-sm no-corner',],
            //         ['extend' => 'print', 'className' => 'btn btn-default btn-sm no-corner',],
            //         ['extend' => 'reset', 'className' => 'btn btn-default btn-sm no-corner',],
            //         ['extend' => 'reload', 'className' => 'btn btn-default btn-sm no-corner',],
            //     ],
            // ])
            ;
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        $data = [
            ['data' => 'number', 'title' => 'No','searchable' => false],
            ['data' => 'cms_name', 'title' => 'Nama Cms'],
            
            ['data' => 'content', 'title' => 'Isi Content'],
        ];
        return $data;
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
