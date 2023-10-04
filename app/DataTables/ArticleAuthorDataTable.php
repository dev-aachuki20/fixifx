<?php

namespace App\DataTables;

use App\Models\ArticleAuthor;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class ArticleAuthorDataTable extends DataTable
{
    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->editColumn('profile', function($data){
                return $data->profile ? '<img src="'.$data->profile.'" width="50px" height="50px" loading="lazy">' : '';
            })
            ->addColumn('action', function($data){
                return '<a class="btn btn-sm btn-success edit_author" data-author_id='.$data->id.' data-bs-toggle="modal" data-bs-target="#EditAuthorModal">Edit</a>';
            })
            ->addIndexColumn()
            ->rawColumns(['profile', 'action']);
    }

    public function query(ArticleAuthor $model)
    {
        return $model->newQuery();
    }

    public function html()
    {
        return $this->builder()
                    ->setTableId('articleauthor-table')
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

    protected function getColumns()
    {
        return [
            Column::make('no')->data('DT_RowIndex')->searchable(false)->orderable(false),
            Column::make('id')->visible(false),
            Column::make('profile'),
            Column::make('name'),
            Column::computed('action')
                  ->exportable(false)
                  ->printable(false)
                  ->width(60)
                  ->addClass('text-center'),
        ];
    }

    protected function filename()
    {
        return 'ArticleAuthor_' . date('YmdHis');
    }
}
