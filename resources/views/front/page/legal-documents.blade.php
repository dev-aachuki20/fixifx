@php
    $keywords_jp = 'FiXi FX,フィクシー,法的文書,必須法務書類';
    $description_jp = 'FiXi FX（フィクシー）の口座開設･変更･契約などに必要な書式をダウンロード可能。FXの必須法務書類もご確認いただけます。';
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
                    @php $section2 = $section->where('section_no', 2)->first() @endphp
                    <div class="inner-features-wrap">
                                <!-- <h3 class="">Supporting Documents:</h3> -->
                                @php $section2 = $section->where('section_no', 2)->where('status', 1)->first() @endphp
                                @if($section2)
                                    {!! $section2->{config('app.locale').'_desc'} !!}
                                @endif
                            </div>
                    @php $section3 = $section->where('section_no', 3)->first() @endphp
                    @if($section3!=null)
                    <div class="inner-features-wrap">
                        <table class="uk-table uk-table-middle uk-table-responsive">
                            <tbody>
                                @foreach($section3->subSection as $key=>$value)
                                <tr>
                                    <td>
                                        <h3 class="h3-from-h4">{{ $value->{config('app.locale').'_title'} }}</h3>
                                    </td>
                                    <td class="uk-text-left uk-text-right@m">
                                        @php $type=\Illuminate\Http\Testing\MimeType::from($value->image);@endphp
                                        <a class="uk-button uk-button-primary uk-border-rounded" download href="{{str_contains($value->getRawOriginal('image'), 'http')?$value->getRawOriginal('image'):$value->image}}" target="_blank">{{__('message.download', [], config('app.locale'))}}<i class="fas fa-file-alt uk-margin-small-left"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    @endif
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