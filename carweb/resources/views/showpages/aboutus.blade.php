
@extends('layouts.showapp')
@section('stylesheet')
    <link rel="stylesheet" href="/highlight/default.min.css">
@endsection

@section('content')

<!-----------------------banner-begin---------------------->
<div>
    <div class="banner d-none d-lg-block">
        <img src="showpagestyle/images/{{$bannerlg->imgurl}}" width="100%" alt="">
    </div>
    <div class="banner d-block d-lg-none d-xl-none">
        <img src="showpagestyle/images/{{$bannersm->imgurl}}" width="100%" alt="">
    </div>
</div>
<!-----------------------banner-begin---------------------->

<!-----------------------公司介绍-begin---------------------->
<div id="profile">
    <div class="container">
        <!--标题-->
        <div class="row border-bottom mb-lg-5 mb-3">
            <div class="col">
                <div class="d-flex justify-content-start align-items-end pt-4 pb-2">
                    <i class="zi zi_listSquare mr-2"></i><h5 class="m-0">企业简介</h5>
                </div>
            </div>
        </div>
        <!--内容-->
        <div class="row">
            <div class="col-lg-5">
                <img class="img-thumbnail" src="/showpagestyle/images/company.jpg" alt="" width="100%">
            </div>
            <div class="col-lg-7 mt-2">
                <P>
{{--                    {!! $profile['description'] !!}--}}
                    {!! $content !!}
                </P>
            </div>
        </div>
    </div>
</div>

<!------------------------公司介绍-end----------------------->

<!------------------------联系我们-begin--------------------->
<div id="connect_us">
    <div class="container mb-5">
        <!--标题-->
        <div class="row border-bottom mb-lg-5">
            <div class="col">
                <div class="d-flex justify-content-start align-items-end pt-4 pb-2">
                    <i class="zi zi_phone mr-2" style="transform: rotateY(180deg);"></i><h5 class="m-0">联系我们</h5>
                </div>
            </div>
        </div>

        <!--内容-->
        <div class="row">
            <div class="col-lg-6">
                <h6>电话：{{$profile['call_number']}}</h6>
                <h6>手机：{{$profile['phone_number']}}</h6>
                <h6>邮箱：{{$profile['email']}}</h6>
                <h6>地址：{{$profile['address']}}</h6>
                <div class="row mt-lg-5 mb-3">
                    <div class="col-4 text-center">
                        <h6>微信</h6>
                        <img src="/showpagestyle/images/wxqrcode.jpg" alt="" width="80%">
                    </div>
                    <div class="col-4 text-center">
                        <h6>QQ</h6>
                        <img src="/showpagestyle/images/qqqrcode.jpg" alt="" width="80%">
                    </div>
                    <div class="col-4 text-center">
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <img class="img-thumbnail" src="/showpagestyle/images/map.jpg" alt="" width="100%">
            </div>
        </div>
    </div>
</div>
<!------------------------联系我们-end----------------------->
@endsection

@section('script')
    <script src="/highlight/highlight.min.js"></script>
    <script>hljs.initHighlightingOnLoad();</script>
@endsection