@php
    $keywords_jp = 'FX,FiXi,フィクシー,アカウント,申請フォーム';
    $description_jp = 'FiXi FX（フィクシー）の口座間振替、サブアカウント申請フォーム、パスワードの変更、出金依頼などの各種リクエスト受付フォームです。';
@endphp

@extends('front.layouts.master')

@section('content')

@include('front.common.page_header')
<div class="uk-section">
    <div class="uk-container">
        <div class="uk-grid">
            @include('front.common.side_section')
            <div class="uk-width-2-3@m">
                <div class="inner-content">
                    @include('front.common.sub_header')
                    <!-- <hr class="my-4"> -->
                    @php $section=$section->where('section_no', '!=', 1) @endphp
                    <div class="inner-features-wrap">
                        <table class="uk-table uk-table-middle uk-table-responsive">
                            <tbody>
                                @foreach($section as $sec)
                                @if($sec)
                                <tr>
                                    <td>
                                        <h3 class="h3-from-h4">{{ $sec->{config('app.locale').'_title'} }}</h3>
                                    </td>
                                    <td class="uk-text-left uk-text-right@m">
                                        <a class="uk-button uk-button-primary uk-border-rounded" href="{{str_contains($sec->getRawOriginal('image'), 'http')?$sec->getRawOriginal('image'):$sec->image}}" download target="_blank">{{__('message.download', [], config('app.locale'))}}<i class="fas fa-file-alt uk-margin-small-left"></i></a>
                                    </td>
                                </tr>
                                @endif
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@push('css')
<style>
    .h3-from-h4{
        font-size: 1.25rem;
    }
</style>
@endpush