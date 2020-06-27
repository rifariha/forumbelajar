<?php

namespace App\DataTables;

use App\Models\Chapter;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;
use DB;

class ChapterDataTable extends DataTable
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
        $dataTable->addColumn('action', 'chapters.datatables_actions');
        $dataTable->editColumn('image', function ($data) {
            $url = asset('storage/' . $data->image);
            return '<img src="' . $url . '" border="0" width="100" align="center" />';
        })->rawColumns(['image', 'action'])->make(true);

        return $dataTable;
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Chapter $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Chapter $model)
    {
        // DB::statement(DB::raw('set @rownum=0'));
        // $model = Chapter::select([
        //     DB::raw('@rownum := @rownum + 1 AS number'),
        //     'chapters.*',
        // ]);
        // return $model;
        return $model->newQuery();
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
            ->addAction(['width' => '120px', 'printable' => false])
            ->parameters([
                'responsive' => true,
                'overflow-x' => 'auto',
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
            // ['data' => 'number', 'title' => 'No', 'searchable' => false],
            ['data' => 'image', 'title' => 'Cover', 'searchable' => false],
            ['data' => 'chapter_name', 'title' => 'Judul Bab'],
            ['data' => 'short_description', 'title' => 'Deskripsi Singkat'],
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
