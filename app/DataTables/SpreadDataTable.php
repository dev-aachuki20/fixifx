<?php

namespace App\DataTables;

use App\Models\Spread;
use Illuminate\Http\Request;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class SpreadDataTable extends DataTable
{
    private $currencies;
    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->editColumn('category_id', function ($data) {
                return $data->category->en_name ?? "";
            })
            ->editColumn('symbol', function ($data) {
                $html = '<div class="flag_data"><div class="uk-flag"><span>';
                $currency_changes = $this->currencies;

                if (array_key_exists($data->symbol, $currency_changes)) {
                    if (isset($currency_changes[$data->symbol])) {
                        $flags = $currency_changes[$data->symbol];
                        $html .= '<img class="img-fluid" src="' . $flags['flag_1'] . '" alt=""></span><span><img class="img-fluid" src="' . $flags['flag_2'] . '" alt="">';

                        $html .= '</span></div><div class="title"><span>' . $data->symbol . '</span></div></div>';
                    }
                } else {
                    $html .= $data->symbol;
                }

                return $html;
            })
            ->addIndexColumn()
            ->addColumn('action', function ($data) {
                return '<button type="button" class="btn btn-sm btn-success edit_spread" spread_id=' . $data->id . ' data-bs-toggle="modal" data-bs-target="#spreadModal">Edit</button>
                <button type="button" class="btn btn-sm btn-danger delete_spread" spread_id=' . $data->id . '>Delete</button>';
            })
            ->rawColumns(['category_id', 'action', 'symbol']);
    }

    public function query(Spread $model, Request $request)
    {
        $this->currencies = getAllCurrency();
        if (isset($request->category_id)) {
            $model =  $model->where('category_id', $request->category_id);
        }
        return $model->newQuery();
    }

    public function html()
    {
        return $this->builder()
            ->setTableId('spread-table')
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
                    "sLengthMenu" => __('message.show') . " _MENU_ " . __('message.entries'),
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
            ])
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
        if (auth()->guard('admin')->check() && (request()->route()->getPrefix() == "PrexSecureCpanel/admin")) {
            return [
                Column::make('no')->data('DT_RowIndex')->searchable(false)->orderable(false),
                Column::make('category_id')->title("Category"),
                Column::make('symbol')->orderable(false),
                Column::make('ja_symbol'),
                Column::make('ultimate_account')->orderable(false),
                Column::make('premium_account')->orderable(false),
                Column::make('starter_account')->orderable(false),
                Column::computed('action')
                    ->exportable(false)
                    ->printable(false)
                    ->width(60)
                    ->addClass('text-center'),
            ];
        } else if (config("app.locale") == 'ja') {
            return [
                Column::make('symbol')->title('<p>シンボル</p>')->orderable(false),
                Column::make('ultimate_account')->title('<p>アルティメットアカウント<span>最狭スプレッド</span></p>')->orderable(false),
                Column::make('premium_account')->title('<p>プレミアムアカウント<span>最狭スプレッド</span></p>')->orderable(false),
                Column::make('starter_account')->title('<p>スターターアカウント<span>最狭スプレッド</span></p>')->orderable(false),
                Column::computed('action')
                    ->visible(false)
                    ->exportable(false)
                    ->printable(false)
                    ->width(60)
                    ->addClass('text-center'),
            ];
        }
        return [
            // Column::make('category_id')->title('<p>Category</p>'),
            Column::make('symbol')->title('<div class="heading_table"><div class="title"><h6>Symbol</h6></div></div>')->orderable(true),
            Column::make('ultimate_account')->title('<div class="heading_table"><div class="title"><h6>Ultimate Account</h6></div><div class="subtext_table"><span>As Low As</span></div></div>')->orderable(true),
            Column::make('premium_account')->title('<div class="heading_table"><div class="title"><h6>Premium Account</h6></div><div class="subtext_table"><span>As Low As</span></div></div>')->orderable(false),
            Column::make('starter_account')->title('<div class="heading_table"><div class="title"><h6>Starter Account</h6></div><div class="subtext_table"><span>As Low As</span></div></div>')->orderable(false),
            Column::computed('action')
                ->visible(false)
                ->exportable(false)
                ->printable(false)
                ->width(60)
            //   ->addClass('text-center'),
        ];
    }

    protected function filename()
    {
        return 'Spread_' . date('YmdHis');
    }
}
