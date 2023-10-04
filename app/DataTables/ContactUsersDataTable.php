<?php

namespace App\DataTables;

use App\Models\ContactUs;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;
use \Illuminate\Support\Str;

class ContactUsersDataTable extends DataTable
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
            ->addColumn('full_name', function($value){
                return $value->first_name.' '.$value->last_name;
            })
            ->editColumn('country', function($value){
                return $value->countries->name ?? '';
            })
            ->editColumn('already_customer', function($value){
                return ($value->already_customer == 1) ? 'Yes' : 'No';
            })
            ->editColumn('message', function($value){
                if(str_word_count($value->message) > 20) {
                    return Str::limit($value->message ,20, '').'  <a href="#" style="color:#033eff" data-bs-toggle="modal" data-content="'.$value->message.'" data-bs-target="#MessageModel"> read more...</a>';
                } else {
                    return $value->message;   
                }
            })
            ->addIndexColumn()
            ->rawColumns(['message']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\ContactUser $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(ContactUs $model)
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
                    ->setTableId('contactusers-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->dom('Blfrtip')
                    ->orderBy([1, 'DESC'])
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
            Column::make('full_name'),
            Column::make('company_name'),
            Column::make('email'),
            Column::make('already_customer'),
            Column::make('account_no')->title('Account Number'),
            Column::make('country'),
            Column::make('phone_no')->title('Phone'),
            Column::make('question'),
            Column::make('message'),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'ContactUsers_' . date('YmdHis');
    }
}
