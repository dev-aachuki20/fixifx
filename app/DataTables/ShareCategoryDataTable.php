<?php

namespace App\DataTables;

use App\Models\ShareCategory;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class ShareCategoryDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->addColumn('action', function ($data) {
                return '<button type="button" class="btn btn-sm btn-success edit-share-category"  data-id="' . $data->id . '" data-bs-toggle="modal" data-bs-target="#addCategory" data-bs-whatever="@mdo">Edit</button>
            &nbsp<a id="share_category_delete" title="Delete Category" class="btn btn-sm btn-danger share_category_delete" share-category-id="' . $data->id . '">Delete</a>';
            })
            ->addIndexColumn()
            ->rawColumns(['action']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\ShareCategory $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(ShareCategory $model)
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
            ->setTableId('sharecategory-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->dom('Blrtip')
            ->orderBy(1)
            ->buttons(
                Button::make('create'),
                Button::make('export'),
                Button::make('print'),
                Button::make('reset'),
                Button::make('reload')
            );
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            Column::make('no')->data('DT_RowIndex')->searchable(false)->orderable(false),
            Column::make('id')->visible(false),
            Column::make('en_name'),
            Column::make('ja_name'),
            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->width(60)
                ->addClass('text-center'),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'ShareCategory_' . date('YmdHis');
    }
}
