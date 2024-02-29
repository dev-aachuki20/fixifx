{{--
    @extends('errors::illustrated-layout')

@section('title', __('Service Unavailable'))
@section('code', '503')

@section('image')
    <div style="background-image: url({{ asset('/frontend/images/bg.jpg') }});" class="absolute pin bg-cover bg-no-repeat md:bg-left lg:bg-center">
</div>
@endsection

@section('message', __('Service Unavailable'))
--}}


<!doctype html>
<title>Site Maintenance</title>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Inter:wght@500;600;700;800;900&display=swap');
  </style>
<style>
    
    body{
        margin: 0px;
        padding: 0px;
        font-family: 'Inter', sans-serif;
    }
    *{
        box-sizing: border-box;
    }
    .comingsoonpage{
        height: 100vh;
        overflow: hidden;
        background-color: #000;
        background: url(comin_soon_bg.png) no-repeat;
        background-size: cover;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .comingsoonpage .innerfluid .transparentHeading{
        /* font-size: 8vw;
        font-weight: 700;
        text-align: center;
        color: transparent;
        -webkit-text-stroke: 0.6px #cccccc4d;
		text-stroke: 0.6px #cccccc4d;
        text-shadow: none;
        line-height: 100%;
        position: relative;
        overflow: hidden; */
        margin: auto;
        width: 70vw;
    }
    .comingsoonpage .innerfluid .transparentHeading img {
        width: 100%;
    }
    .comingsoonpage .innerfluid .coming_heading{
        margin-top: 2%;
        font-size: 5vw;
        color: #2EEECE;
        font-weight: 700;
        text-align: center;
        line-height: 100%;
    }
    .comingsoonpage .innerfluid .buttongroup{
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
    }
    .comingsoonpage .innerfluid .buttongroup .homeBtn {
        margin-top: 3vw;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 0.8vw;
        /* padding: ; */
        font-size: 1vw;
        text-decoration: none;
        color: #fff;
        font-style: normal;
        line-height: 100%;
        font-weight: 600;
        line-height: normal;
        padding: 1vw 1.3vw;
        border-radius: 0.4vw;
        background: #2EEECE;
        box-shadow: 2px 2px 13px 0px rgba(0, 58, 49, 0.10);
        transition: all ease-in-out 0.3s;
    }
    .comingsoonpage .innerfluid .buttongroup .homeBtn .arrowIMg{
        display: flex;
        height: 1vw;
    }
    .comingsoonpage .innerfluid .buttongroup .homeBtn .arrowIMg img {
        height: 100%;
    }
    @media screen and (max-width: 768px) {
    .comingsoonpage .innerfluid .transparentHeading{
        /* font-size: 10vw; */
        width: 80vw;
    }
    .comingsoonpage .innerfluid .coming_heading{
        font-size: 7vw;
    }
    .comingsoonpage .innerfluid .buttongroup .homeBtn {
        margin-top: 3vw;
        gap: 0.8vw;
        font-size: 1.5vw;
        padding: 1.2vw 1.5vw;
        border-radius: 0.5vw;
    }
    .comingsoonpage .innerfluid .buttongroup .homeBtn .arrowIMg{
        height: 1.5vw;
    }
    }
</style>

<section class="comingsoonpage">
        <div class="innerfluid">
            <!-- <div class="transparentHeading">NEW UPDATE</div> -->
            <div class="transparentHeading"><img src="comingsoon.png" alt=""></div>
            <div class="buttongroup">
                <div class="coming_heading">COMING SOON</div>
            </div>
        </div>
</section>