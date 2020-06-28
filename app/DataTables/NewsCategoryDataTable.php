<?php

namespace App\DataTables;

use App\Models\NewsCategory;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;
use DB;

class NewsCategoryDataTable extends DataTable
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
        $dataTable->addColumn('action', 'news_categories.datatables_actions');
        $dataTable->editColumn('created_at', function ($data) {
            $str = strtotime($data->created_at);
            return date('d F Y', $str);
        })->rawColumns(['action','created_at'])->make(true);

        return $dataTable;
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\NewsCategory $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(NewsCategory $model)
    {
        DB::statement(DB::raw('set @rownum=0'));
        $model = NewsCategory::select([
            DB::raw('@rownum := @rownum + 1 AS number'),
            'id',
            'category_name',
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
            ->addAction(['width' => '120px'])
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
            // ['data'=>'number', 'title' => 'No'],
            ['data' => 'category_name', 'title'=> 'Nama Kategori'],
            ['data'=>'created_at', 'title' => 'Tanggal dibuat','searchable' => false],
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
