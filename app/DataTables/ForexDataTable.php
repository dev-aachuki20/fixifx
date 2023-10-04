<?php

namespace App\DataTables;

use App\Models\Forex;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class ForexDataTable extends DataTable
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
                return '<button type="button" class="btn btn-sm btn-success edit_forex" forex_id=' . $data->id . ' data-bs-toggle="modal" data-bs-target="#forexModal">Edit</button>
                <button type="button" class="btn btn-sm btn-danger delete_forex" forex_id=' . $data->id . '>Delete</button>';
            })
            ->addIndexColumn()
            ->rawColumns(['action']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Forex $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Forex $model)
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
            ->setTableId('forex-table')
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
            ])
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
        if (auth()->guard('admin')->check() && (request()->route()->getPrefix() == "PrexSecureCpanel/admin")) {
            return [
                Column::make('no')->data('DT_RowIndex')->searchable(false)->orderable(false),
                Column::make('id')->visible(false),
                Column::make('symbol')->title("Symbol"),
                Column::make('ja_symbol')->title("シンボル"),
                Column::make('description')->title("Description"),
                Column::make('ja_description')->title("説明"),
                Column::make('currency_base')->title("Currency Base"),
                Column::make('ja_currency_base')->title("通貨"),
                Column::make('margin_currency')->title("Margin Currency"),
                Column::make('ja_margin_currency')->title("マージン 通貨"),
                Column::make('contract_size')->title("Contract Size"),
                Column::make('ja_contract_size')->title("契約数"),
                Column::make('max_levarage')->title("Max. Leverage"),
                Column::make('ja_max_levarage')->title("最大 レバレッジ"),
                Column::make('max_volume_trade')->title("Max Volume Per Trade"),
                Column::make('ja_max_volume_trade')->title("最大 取引量"),
                Column::make('min_volume_trade')->title("Min Volume Per Trade"),
                Column::make('ja_min_volume_trade')->title("最小 取引量"),
                Column::make('long_swap')->title("Long Swap"),
                Column::make('ja_long_swap')->title("ロング スワップ"),
                Column::make('short_swap')->title("Short Swap"),
                Column::make('ja_short_swap')->title("ショート スワップ"),
                Column::make('holding_period')->title("Holding Period"),
                Column::make('ja_holding_period')->title("保有期間"),
                Column::make('grant_date')->title("3-Day Swap"),
                Column::make('ja_grant_date')->title("スワップ"),
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
                Column::make('ja_currency_base')->title("<p>通貨</p>"),
                Column::make('ja_margin_currency')->title("<p>マージン 通貨</p>"),
                Column::make('ja_contract_size')->title("<p>契約数</p>"),
                Column::make('ja_max_levarage')->title("<p>最大 レバレッジ</p>"),
                Column::make('ja_max_volume_trade')->title("<p>最大 取引量</p>"),
                Column::make('ja_min_volume_trade')->title("<p>最小 取引量</p>"),
                Column::make('ja_long_swap')->title("<p>ロング スワップ</p>"),
                Column::make('ja_short_swap')->title("<p>ショート スワップ</p>"),
                Column::make('ja_holding_period')->title("<p>保有期間</p>"),
                Column::make('ja_grant_date')->title("<p>スワップ</p>"),
                Column::make('ja_trading_hours')->title("<p>取引時間</p>"),
                Column::computed('action')
                    ->exportable(false)
                    ->printable(false)
                    ->width(60)
                    ->addClass('text-center')
                    ->visible(false),

            ];
        }
        return [
            Column::make('symbol')->title("<p>Symbol</p>"),
            Column::make('description')->title("<p>Description</p>"),
            Column::make('currency_base')->title("<p>Currency Base</p>"),
            Column::make('margin_currency')->title("<p>Margin Currency</p>"),
            Column::make('contract_size')->title("<p>Contract Size</p>"),
            Column::make('max_levarage')->title("<p>Max. Leverage</p>"),
            Column::make('max_volume_trade')->title("<p>Max Volume Per Trade</p>"),
            Column::make('min_volume_trade')->title("<p>Min Volume Per Trade</p>"),
            Column::make('long_swap')->title("<p>Long Swap</p>"),
            Column::make('short_swap')->title("<p>Short Swap</p>"),
            Column::make('holding_period')->title("<p>Holding Period</p>"),
            Column::make('grant_date')->title("<p>3-Day Swap</p>"),
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
        return 'Forex_' . date('YmdHis');
    }
}
