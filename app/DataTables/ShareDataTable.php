<?php

namespace App\DataTables;

use App\Models\Share;
use Illuminate\Http\Request;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class ShareDataTable extends DataTable
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
            ->addIndexColumn()
            ->editColumn('category_id', function ($data) {
                return $data->category->en_name ?? "";
            })
            ->addColumn('action', function ($data) {
                return '<button type="button" class="btn btn-sm btn-success edit_share" share_id=' . $data->id . ' data-bs-toggle="modal" data-bs-target="#shareModal">Edit</button>
                <button type="button" class="btn btn-sm btn-danger delete_share" share_id=' . $data->id . '>Delete</button>';
            })
            ->addIndexColumn()
            ->rawColumns(['action']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Share $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Share $model, Request $request)
    {
        if (isset($request->category_id)) {
            $model =  $model->where('category_id', $request->category_id);
        }
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
            ->setTableId('share-table')
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
                     __('message.showing') . " _START_ " . __('message.to') . " _END_ " . __('message.of') . " _TOTAL_ " . __('message.records'):
                     __('message.showing') . "_TOTAL_" . __('message.to') . __('message.of') . "_START_-_END_" . __('message.records'),
                    "sInfoEmpty" => _('message.showing') . " 0 " . __('message.to') . " 0 " . __('message.of') . " 0 " . __('message.records'),
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
                Column::make('category_id')->title('category'),
                Column::make('symbol')->title("Symbol"),
                Column::make('ja_symbol')->title("シンボル"),
                Column::make('description')->title("Description"),
                Column::make('ja_description')->title("説明"),
                Column::make('type')->title("Type"),
                Column::make('ja_type')->title("タイプ"),
                Column::make('currency_base')->title("Currency Base"),
                Column::make('ja_currency_base')->title("通貨"),
                Column::make('margin')->title("Margin Currency"),
                Column::make('ja_margin')->title("マージン通貨"),
                Column::make('max_levarage')->title("Max. Leverage"),
                Column::make('ja_max_levarage')->title("最大レバレッジ"),
                Column::make('contract')->title("Contract Size"),
                Column::make('ja_contract')->title("契約数"),
                Column::make('max_trade_size')->title("Max Volume Per Trade"),
                Column::make('ja_max_trade_size')->title("最大取引量"),
                Column::make('min_trade_size')->title("Min Volume Per Trade"),
                Column::make('ja_min_trade_size')->title("最小取引量"),
                Column::make('long_swap')->title("Long Swap"),
                Column::make('ja_long_swap')->title("ロングスワップ"),
                Column::make('short_swap')->title("Short Swap"),
                Column::make('ja_short_swap')->title("ショートスワップ"),
                Column::make('holding_period')->title("Holding Period"),
                Column::make('ja_holding_period')->title("保有期間"),
                Column::make('day_swap')->title("3-Day Swap"),
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
                Column::make('ja_symbol')->title("<p>" . __('message.symbol') . "</p>"),
                Column::make('ja_description')->title("<p>" . __('message.description') . "</p>"),
                Column::make('ja_type')->title("<p>" . __('message.type') . "</p>"),
                Column::make('ja_currency_base')->title("<p>" . __('message.currency_base') . "</p>"),
                Column::make('ja_margin')->title("<p>" . __('message.margin') . "</p>"),
                Column::make('ja_max_levarage')->title("<p>" . __('message.max_levarage') . "</p>"),
                Column::make('ja_contract')->title("<p>" . __('message.contract') . "</p>"),
                Column::make('ja_max_trade_size')->title("<p>" . __('message.max_trade_size') . "</p>"),
                Column::make('ja_min_trade_size')->title("<p>" . __('message.min_trade_size') . "</p>"),
                Column::make('ja_long_swap')->title("<p>" . __('message.long_swap') . "</p>"),
                Column::make('ja_short_swap')->title("<p>" . __('message.short_swap') . "</p>"),
                Column::make('ja_holding_period')->title("<p>" . __('message.holding_period') . "</p>"),
                Column::make('ja_day_swap')->title("<p>" . __('message.day_swap') . "</p>"),
                Column::make('ja_trading_hours')->title("<p>" . __('message.trading_hours') . "</p>"),
                Column::computed('action')
                    ->exportable(false)
                    ->printable(false)
                    ->width(60)
                    ->addClass('text-center')
                    ->visible(false),

            ];
        }
        return [
            Column::make('symbol')->title("<p>" . __('message.symbol') . "</p>"),
            Column::make('description')->title("<p>" . __('message.description') . "</p>"),
            Column::make('type')->title("<p>" . __('message.type') . "</p>"),
            Column::make('currency_base')->title("<p>" . __('message.currency_base') . "</p>"),
            Column::make('margin')->title("<p>" . __('message.margin') . "</p>"),
            Column::make('max_levarage')->title("<p>" . __('message.max_levarage') . "</p>"),
            Column::make('contract')->title("<p>" . __('message.contract') . "</p>"),
            Column::make('max_trade_size')->title("<p>" . __('message.max_trade_size') . "</p>"),
            Column::make('min_trade_size')->title("<p>" . __('message.min_trade_size') . "</p>"),
            Column::make('long_swap')->title("<p>" . __('message.long_swap') . "</p>"),
            Column::make('short_swap')->title("<p>" . __('message.short_swap') . "</p>"),
            Column::make('holding_period')->title("<p>" . __('message.holding_period') . "</p>"),
            Column::make('day_swap')->title("<p>" . __('message.day_swap') . "</p>"),
            Column::make('trading_hours')->title("<p>" . __('message.trading_hours') . "</p>"),
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
        return 'Share_' . date('YmdHis');
    }
}
