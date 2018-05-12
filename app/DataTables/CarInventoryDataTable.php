<?php

namespace App\DataTables;

use App\CarModel;
use App\User;
use Yajra\DataTables\Services\DataTable;

class CarInventoryDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        return datatables($query)
                ->addColumn('action', function ($data) {
                    return '<a href="/backend/sold/model/'.$data->id.'" id="btnDel" class="btn btn-xs btn-danger"><i class="fa fa-btn fa-minus-square"></i> Sold</a>';
                })
                ->addColumn('image', function ($data) {
                    return '<img width="150px" src='.asset('/images/'.$data->image).'></a>';
                })
                ->rawColumns(['action', 'image']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\User $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query()
    {
        $carmodel = CarModel::select(array('id', 'name', 'color', 'manufacturing_year', 'registration_number', 'note', 'image'))->where('status', 'available');
        return $this->applyScopes($carmodel);
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */

    public function html()
    {
        return $this->builder()
                    ->addColumn(['data' => 'id', 'name' => 'id', 'title' => 'SNo'])
                    ->addColumn(['data' => 'name', 'name' => 'name', 'title' => 'Name'])
                    ->addColumn(['data' => 'manufacturing_year', 'name' => 'manufacturing_year', 'title' => 'Manufacturing Year'])
                    ->addColumn(['data' => 'registration_number', 'name' => 'registration_number', 'title' => 'Registration Number'])
                    ->addColumn(['data' => 'note', 'name' => 'note', 'title' => 'Note'])
                    ->addColumn(['data' => 'image', 'name' => 'image', 'title' => 'Image'])
                    ->minifiedAjax()
                    ->addAction(['width' => '80px'])
                    ->parameters([ 'dom' => 'Bflrtip',
                        'buttons' => ['csv', 'excel', 'print', 'reset', 'reload'],
                        'order' => [[0, 'desc']],
                        'responsive' => true,
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
            'id',
            'add your columns',
            'created_at',
            'updated_at'
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'CarInventory_' . date('YmdHis');
    }
}
