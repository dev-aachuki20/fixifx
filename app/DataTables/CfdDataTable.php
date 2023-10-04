<?php

namespace App\DataTables;

use App\Models\Cfd;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class CfdDataTable extends DataTable
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
                return '<button type="button" class="btn btn-sm btn-success edit_cfd" cfd_id=' . $data->id . ' data-bs-toggle="modal" data-bs-target="#cfdModal">Edit</button>
            <button type="button" class="btn btn-sm btn-danger delete_cfd" cfd_id=' . $data->id . '>Delete</button>';
            })
            ->addIndexColumn()
            ->rawColumns(['action']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Cfd $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Cfd $model)
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
            ->setTableId('cfd-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->dom('Blfrtip')
            ->orderBy(1)
            ->parameters([
                "sScrollX" => true,
                "scrollCollapse" => true,
                'autoWidth' => true,
                "scrollCollapse" => true,
                'language' => [
                    "sZeroRecords" => __('message.data_not_found'),
                    "sLengthMenu" => __('message.show') . " _MENU_ " . __('message.record_per_page'),
                    // "sInfo" => __('message.showing') . " _START_ " . __('message.to') . " _END_ " . __('message.of') . " _TOTAL_ " . __('message.records'),
                    "sInfo" =>  config('app.locale') == 'en' ?
                        __('message.showing') . " _START_ " . __('message.to') . " _END_ " . __('message.of') . " _TOTAL_ " . __('message.records') :
                        __('message.showing') . "_TOTAL_" . __('message.to') . __('message.of') . "_START_-_END_" . __('message.records'),
                    "sInfoEmpty" => __('message.showing') . " 0 " . __('message.to') . " 0 " . __('message.of') . " 0 " . __('message.records'),
                    "search" => __('message.search'),
                    "paginate" => [
                        "first" => __('message.first'),
                        "last" => __('message.last'),
                        "next" =>  __('message.next'),
                        "previous" =>  __('message.previous'),
                    ],
                    "autoFill" => [
                        "cancel" => __('message.cancel'),
                    ],

                ],
            ]);
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {

        if (auth()->guard('admin')->check() && (request()->route()->getPrefix() == "PrexSecureCpanel/admin")) {
            return [
                Column::make('no')->data('DT_RowIndex')->searchable(false)->orderable(false),
                Column::make('id')->visible(false),
                Column::make('symbol')->title("Symbol"),
                Column::make('ja_symbol')->title("シンボル"),
                Column::make('description')->title("Description"),
                Column::make('ja_description')->title("説明"),
                Column::make('type')->title("Type"),
                Column::make('ja_type')->title("タイプ"),
                Column::make('currency_base')->title("Currency Base"),
                Column::make('ja_currency_base')->title("通貨"),
                Column::make('margin_currency')->title("Margin Currency"),
                Column::make('ja_margin_currency')->title("マージン<br>通貨"),
                Column::make('max_levarage')->title("Max. Leverage"),
                Column::make('ja_max_levarage')->title("最大<br>レバレッジ"),
                Column::make('contract_size')->title("Contract Size"),
                Column::make('ja_contract_size')->title("契約数"),
                Column::make('max_volume_trade')->title("Max Volume Per Trade"),
                Column::make('ja_max_volume_trade')->title("最大<br>取引量"),
                Column::make('min_volume_trade')->title("Min Volume Per Trade"),
                Column::make('ja_min_volume_trade')->title("最小<br>取引量"),
                Column::make('day_swap')->title("3 Day Swap"),
                Column::make('ja_day_swap')->title("スワップ"),
                Column::make('trading_hours')->title("Trading Hours"),
                Column::make('ja_trading_hours')->title("取引時間"),
                Column::computed('action')
                    ->exportable(false)
                    ->printable(false)
                    ->width(60)
                    ->addClass('text-center'),
            ];
        }
        if (config("app.locale") == 'ja') {
            return [
                Column::make('ja_symbol')->title("<p>シンボル</p>"),
                Column::make('ja_description')->title("<p>説明</p>"),
                Column::make('ja_type')->title("<p>" . "タイプ</p>"),
                Column::make('ja_currency_base')->title("<p>通貨</p>"),
                Column::make('ja_margin_currency')->title("<p>マージン<br>通貨</p>"),
                Column::make('ja_max_levarage')->title("<p>最大<br>レバレッジ</p>"),
                Column::make('contract_size')->title("<p>契約数</p>"),
                Column::make('ja_max_volume_trade')->title("<p>" . "最大<br>取引量</p>"),
                Column::make('ja_min_volume_trade')->title("<p>" . "最小<br>取引量</p>"),
                Column::make('ja_day_swap')->title("<p>スワップ</p>"),
                Column::make('ja_trading_hours')->title("<p>" . "取引時間</p>"),
                Column::computed('action')
                    ->exportable(false)
                    ->printable(false)
                    ->width(60)
                    ->addClass('text-center')
                    ->visible(false),

            ];
        }
        return [
            Column::make('symbol')->title("<p>Symbole </p>"),
            Column::make('description')->title("<p>Description</p>"),
            Column::make('type')->title("<p>Type</p>"),
            Column::make('currency_base')->title("<p>Currency Base</p>"),
            Column::make('margin_currency')->title("<p>Margin Currency</p>"),
            Column::make('max_levarage')->title("<p>Max. Leverage</p>"),
            Column::make('contract_size')->title("<p>Contract Size</p>"),
            Column::make('max_volume_trade')->title("<p>Max Volume Per Trade</p>"),
            Column::make('min_volume_trade')->title("<p>Min Volume Per Trade</p>"),
            Column::make('day_swap')->title("<p>3 Day Swap </p>"),
            Column::make('trading_hours')->title("<p>Trading Hours</p>"),
            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->width(60)
                ->addClass('text-center')
                ->visible(false),

        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Cfd_' . date('YmdHis');
    }
}
