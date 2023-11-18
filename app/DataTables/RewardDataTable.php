<?php

namespace App\DataTables;

use App\Models\Reward;
use Illuminate\Http\Request;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class RewardDataTable extends DataTable
{
    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->addIndexColumn()
            ->editColumn('image', function ($data) {
                return '<img class="img-fluid" src="' .  asset('fixifx/images/reward/'.$data->image) . '" alt="" style="width: 30px; height: auto;">';
            })
            ->addColumn('action', function ($data) {
                return '<button type="button" class="btn btn-sm btn-success edit_reward" reward_id=' . $data->id . ' data-bs-toggle="modal" data-bs-target="#rewardModal">Edit</button>';
            })
            ->rawColumns(['image', 'action']);
    }

    public function query(Reward $model)
    {
        return $model->newQuery();
    }

    public function html()
    {
        return $this->builder()
            ->setTableId('reward-table')
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
                    // "sLengthMenu" => __('message.show') . " _MENU_ " . __('message.entries'),
                    // "sInfo" => __('message.showing') . " _START_ " . __('message.to') . " _END_ " . __('message.of') . " _TOTAL_ " . __('message.records'),
                    // "sInfo" =>  config('app.locale') == 'en' ?
                    //     __('message.showing') . " _START_ " . __('message.to') . " _END_ " . __('message.of') . " _TOTAL_ " . __('message.records') :
                    //     __('message.showing') . "_TOTAL_" . __('message.to') . __('message.of') . "_START_-_END_" . __('message.records'),
                    "sInfoEmpty" => __('message.showing') . " 0 " . __('message.to') . " 0 " . __('message.of') . " 0 " . __('message.records'),
                    // "search" => __('message.search'),
                    // "paginate" => [
                    //     "first" => __('message.first'),
                    //     "last" => __('message.last'),
                    //     "next" =>  __('message.next'),
                    //     "previous" =>  __('message.previous'),
                    // ],
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
                Column::make('sr. no')->data('DT_RowIndex')->searchable(false)->orderable(false),
                Column::make('image'),
                Column::make('trade')->orderable(false),
                Column::make('volume'),
                Column::make('points')->orderable(false),
                Column::computed('action')
                    ->exportable(false)
                    ->printable(false)
                    ->width(60)
                    ->addClass('text-center'),
            ];
        }
        // if (config("app.locale") == 'ja') {
        //     return [
        //         Column::make('image')->title('<p>プレミアムアカウント<span>最狭スプレッド</span></p>')->orderable(false),
        //         Column::make('trade')->title('<p>シンボル</p>')->orderable(false),
        //         Column::make('volume')->title('<p>アルティメットアカウント<span>最狭スプレッド</span></p>')->orderable(false),
        //         Column::make('points')->title('<p>プレミアムアカウント<span>最狭スプレッド</span></p>')->orderable(false),
        //         Column::computed('action')
        //             ->visible(false)
        //             ->exportable(false)
        //             ->printable(false)
        //             ->width(60)
        //             ->addClass('text-center'),
        //     ];
        // }
        return [
            Column::make('image')->title('<p>Points</span></p>')->orderable(false),
            Column::make('trade')->title('<p>Trade</p>')->orderable(false),
            Column::make('volume')->title('<p>Volume</span></p>')->orderable(false),
            Column::make('points')->title('<p>Points</span></p>')->orderable(false),
            Column::computed('action')
                ->visible(false)
                ->exportable(false)
                ->printable(false)
                ->width(60)
                ->addClass('text-center'),
        ];
    }

    protected function filename()
    {
        return 'FixiReward_' . date('YmdHis');
    }
}
