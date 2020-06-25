<?php

namespace App\DataTables;

use App\Models\User;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;
use DB;

class UserDataTable extends DataTable
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

        $dataTable->addColumn('action', 'users.datatables_actions');
        $dataTable->editColumn('status', function ($data) {
            return ($data->status == 1) ? 'Aktif' : 'Tidak Aktif';
        });

        return $dataTable;
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\User $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(User $model)
    {
        DB::statement(DB::raw('set @rownum=0'));
        $model = User::select([
            DB::raw('@rownum := @rownum + 1 AS number'),
            'users.*',
        ])->where('id','!=','1')->where('id', '!=', '2');

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
            ['data' => 'number', 'title' => 'No'],
            ['data' => 'name', 'title'=> 'Nama'],
            ['data' => 'email', 'title' => 'Email'],
            ['data' => 'phone', 'title' => 'No. Telepon'],
            ['data' => 'address', 'title' => 'Alamat'],
            ['data' => 'status', 'title' => 'Status'],
            ['data' => 'bmkz_origin', 'title' => 'Asal BMKZ'],
            ['data' => 'mz_origin', 'title' => 'Asal MZ'],
            ['data' => 'suluk', 'title' => 'Suluk'],
            ['data' => 'alumni', 'title' => 'Alumni'],
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
