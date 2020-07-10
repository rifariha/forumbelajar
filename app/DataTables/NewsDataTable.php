<?php

namespace App\DataTables;

use App\Models\News;
use App\Models\NewsCategory;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;

class NewsDataTable extends DataTable
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
        $dataTable->editColumn('category_id', function ($data) {
            $category = $data->category->category_name;
            return $category;
        });
        
        $dataTable->editColumn('image', function ($data) {
            $url = asset('storage/' . $data->image);
            return '<img src="' . $url . '" border="0" width="100" align="center" />';
        });

        $dataTable->editColumn('created_at', function ($data) {
            $str = strtotime($data->created_at);
            return date('d F Y', $str);
        })->rawColumns(['content','created_at','category_id','image', 'action'])->make(true);

        return $dataTable->addColumn('action', 'news.datatables_actions');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\News $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(News $model)
    {
        $model = News::select([
            'news.*'
        ])->with('category')->orderBy('created_at','desc');
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
            ['data' => 'headline', 'title' => 'Judul Berita'],
            ['data' => 'created_by', 'title' => 'Dibuat Oleh'],
            ['data' => 'content', 'title' => 'Isi Berita'],
            ['data' => 'image', 'title' => 'Gambar'],
            ['data' => 'category_id', 'title' => 'Kategori','searchable' => false],
            ['data' => 'created_at', 'title' => 'Tanggal dibuat','searchable' => false],
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
