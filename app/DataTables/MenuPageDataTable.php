<?php

namespace App\DataTables;

use App\Models\MenuPage;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class MenuPageDataTable extends DataTable
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
            ->addColumn('action', function($data){
                return '<button class="btn btn-sm btn-success edit_menu_page" data-page_id='.$data->id.' data-bs-toggle="modal" data-bs-target="#EditMenuPageModal">Edit</button>';
            })
            ->editColumn('status',function($data) {
                if($data->status == 0) {
                    return '<button type="button" class="badge bg-danger changeStatus" status="1" title="click to active" menupage_id="'.$data->id.'">Inactive</button>';
                } else {
                    return '<button type="button" class="badge bg-success changeStatus" status="0" title="click to inactive" menupage_id="'.$data->id.'">Active</button>';
                }
            })
            ->editColumn('menu_id', function($data){
                return $data->menu->en_name;
            })
            ->editColumn('sub_menu_id', function($data){
                return $data->subMenu->en_name;
            })
            ->addIndexColumn()
            ->rawColumns(['status', 'action']);
            // ->addColumn('action', 'menu.action');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Menu $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(MenuPage $model)
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
                    ->setTableId('menupage-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->dom('Blfrtip')
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
            Column::make('menu_id')->title('Menu'),
            Column::make('sub_menu_id')->title('Sub Menu'),
            Column::make('en_name')->title('Name (English)'),
            Column::make('ja_name')->title('Name (Japanese)'),
            Column::make('status'),
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
        return 'SubMenu_' . date('YmdHis');
    }
}
