<?php

namespace App\DataTables;

use App\Models\Article;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class ArticleDataTable extends DataTable
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
                return '<a class="btn btn-sm btn-success edit_menu" href="' . route('admin.article', ['article' => $data->id, 'slug' => $this->slug]) . '">Edit</a>&nbsp<a id="article_delete" title="Delete Article" class="btn btn-sm btn-danger article_delete" article-id="' . $data->id . '">Delete</a>';
            })
            ->editColumn('status', function ($data) {
                if ($data->status == 0) {
                    return '<button type="button" class="badge bg-danger changeStatus" status="1" title="click to active" article_id="' . $data->id . '">Inactive</button>';
                } else {
                    return '<button type="button" class="badge bg-success changeStatus" status="0" title="click to inactive" article_id="' . $data->id . '">Active</button>';
                }
            })
            ->editColumn('event_date', function ($data) {
                if ($data->event_date != null) {
                    return date('d M, Y', strtotime($data->event_date));
                }
                return date('d M, Y', strtotime($data->created_at));
            })
            ->addColumn('category', function ($data) {
                return $data->categories->en_name ?? '';
            })
            ->addIndexColumn()
            ->rawColumns(['status', 'action', 'category']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Article $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Article $model)
    {
        return $model->with('categories')->where('page_id', $this->page_id)->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->setTableId('article-table')
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
        $visible = false;
        if ($this->page_id==20){
            $visible = true;
        }

        return [
            Column::make('no')->data('DT_RowIndex')->searchable(false)->orderable(false),
            Column::make('id')->visible(false),
            Column::make('en_title'),
            Column::make('status'),
            Column::make('category')->visible($visible),
            Column::make('event_date'),
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
        return 'Article_' . date('YmdHis');
    }
}
