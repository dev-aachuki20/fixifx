@php
    $keywords_jp = 'FiXi FX,フィクシー,お問い合わせ,コンタクト';
    $description_jp = 'FiXi FX（フィクシー）のお問い合わせページ。各部門のチャットサポートやコンタクト･フォームにてお問い合わせいただけます。';
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
                            <!-- <hr class="my-4 border-standard"> -->
                            <div class="inner-features-wrap">
                                <div class="">
                                    @php $section2 = $section->where('section_no', 2)->where('status', 1)->first() @endphp
                                    @if($section2)
                                    <h3 class="">{{ $section2->{config('app.locale').'_title'} }}</h3>
                                    <div class="title_divider_dot"></div>
                                    <div class="uk-table-responsive mt-4">
                                        <table class="uk-table uk-table-middle uk-table-small uk-table-striped uk-text-nowrap">
                                            @foreach($contacts as $contact)
                                            <tr>
                                                <th>{{ $contact->{config('app.locale').'_title'} }}</th>
                                                <td>{{ $contact->value }}</td>
                                            </tr>
                                            @endforeach
                                        </table>
                                    </div> 
                                    @endif
                                </div>
                                
                                @include('front.common.talk_to_us')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
@endsection