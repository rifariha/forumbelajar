<?php

namespace App\DataTables;

use App\Models\Slider;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;

class SliderDataTable extends DataTable
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
        $dataTable->editColumn('image', function ($data) {
            $url = asset('storage/' . $data->image);
            return '<img src="' . $url . '" border="0" width="100" align="center" />';
        })->rawColumns(['image', 'action'])->make(true);
        
        return $dataTable->addColumn('action', 'sliders.datatables_actions');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Slider $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Slider $model)
    {
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
            ->minifiedAjax()
            ->addAction(['width' => '120px'])
            ->parameters([
            'responsive' => true,
            'overflow-x' => 'auto',
                'stateSave' => true,
                'order'     => [[0, 'desc']]
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
            ['data' => 'image', 'title' => 'Foto'],
            ['data' => 'slider_name', 'title' => 'Judul Slider'],
            ['data' => 'desription', 'title' => 'Deskripsi']
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
