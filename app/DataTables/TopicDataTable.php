<?php

namespace App\DataTables;

use App\Models\Topic;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;
use DB;
class TopicDataTable extends DataTable
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

        $dataTable->addColumn('action', 'chapters.topics.datatables_actions');
        $dataTable->editColumn('image', function ($data) {
            $url = asset('storage/' . $data->image);
            return '<img src="' . $url . '" border="0" width="100" align="center" />';
        }); 
        $dataTable->editColumn('created_at', function ($data) {
            $str = strtotime($data->created_at);
            return date('d F Y',$str);
        })->rawColumns(['image', 'action','created_at'])->make(true);
        
        return $dataTable;
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Topic $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Topic $model)
    {
        DB::statement(DB::raw('set @rownum=0'));
        $chapterId = request()->segment(2);
        $model = Topic::select([
            DB::raw('@rownum := @rownum + 1 AS number'),
            'topic.*'
        ])->where('chapter_id',$chapterId);

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
            ['data' => 'topic_name', 'title' => 'Judul Materi'],
            ['data' => 'short_description', 'title' => 'Deskripsi'],
            ['data' => 'created_by', 'title' => 'Dibuat Oleh'],
            ['data' => 'created_at', 'title' => 'Dibuat Tanggal'],
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
