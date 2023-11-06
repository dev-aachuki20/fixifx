<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Advan Trade</title>
    <link rel="stylesheet" href="{{ asset('fixifx/css/style.css') }}">
</head>

<body>
    <section class="comingsoonpage">
        <div class="innerfluid">
            <!-- <div class="transparentHeading">NEW UPDATE</div> -->
            <div class="transparentHeading"><img src="comingsoon.png" alt=""></div>
            <div class="buttongroup">
                <div class="coming_heading">{{__('message.coming_soon')}}</div>
                <a href="{{ route('page', [config('app.locale'), 'home']) }}" class="homeBtn"><span class="arrowIMg"><img src="{{asset('/fixifx/images/leftarrow.svg')}}" alt="left-arrow"></span>{{__('message.back_to_home')}}</a>
            </div>
        </div>
    </section>
</body>

</html>