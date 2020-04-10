
    @extends('layouts.showapp')
    @section('content')

    <!------------------------banner-begin------------------------>
    <div>
        <div class="banner d-none d-lg-block">
            <img src="/showpagestyle/images/{{$bannerlg->imgurl}}" width="100%" alt="">
        </div>
        <div class="banner d-block d-lg-none d-xl-none">
            <img src="/showpagestyle/images/{{$bannersm->imgurl}}" width="100%" alt="">
        </div>
    </div>
    <!------------------------banner-end-------------------------->

    <!------------------------爆款推荐-begin------------------------>
    <div id="car_recommend">
        <div class="container">
            <!--标题-->
            <div class="row mb-2 mt-5">
                <div class="col align-text-bottom"><br><hr></div>
                <div class="text-center col-auto">
                    <h3><i class="zi zi_starLine"></i> 爆款推荐 <i class="zi zi_starLine"></i></h3>
                    <p>// 每月4台 <b>·</b> 亏本补贴 <b>·</b> 先购先得 //</p>
                </div>
                <div class="col"><br><hr></div>
            </div>
            <!--内容-->
            <div class="row">
                @foreach($carsrec as $v)
                <div class="col-lg-6 mt-3 mb-3">
                    <div class="media">
                        <img class="mr-3" src="/showpagestyle/images/{{$v->imgurl}}" alt="" width="30%">
                        <div class="media-body">
                            <h5 class="mb-4">{{$v->title}}</h5>
                            <p>{!! $v->detail !!}</p>
                        </div>
                    </div>
                    <div class="bg-danger p-2 text-light d-flex justify-content-between">
                        <div class="d-flex align-items-center"><span class="align-middle">{{$v->gift_title}}</span></div>
                        <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#exampleModalCenter">立即抢购 ></button>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
    </div>
    <!------------------------爆款推荐-end-------------------------->

    <!------------------------热销专区-begin------------------------>
    <div id="car_hot" class="pb-4">
        <div class="text-center pt-4 mt-4">
            <h3><i class="zi zi_star"></i> 热销专区 <i class="zi zi_star"></i></h3>
            <p class="mb-0">// 最热车型 <b>·</b> 最高优惠 //</p>
        </div>
        <div class="container">
            <div class="row">
                @foreach($carshot as $v)
                <div class="col-lg-3 col-md-6 col-sm-6 mt-4">
                    <div class="card Small shadow">
                        <img class="card-img-top" src="/showpagestyle/images/{{$v->imgurl}}" alt="">
                        <div class="card-body">
                            <h5 class="card-title">{{$v->title}}</h5>
                            <p class="card-text">{!! $v->detail !!}</p>
                            <a href="#" class="btn btn-warning d-flex justify-content-center" data-toggle="modal" data-target="#exampleModalCenter">立即咨询</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <!------------------------热销专区-end-------------------------->

    <!------------------------购车流程-begin------------------------>
    <div id="car_step">
        <div class="text-center pt-4 mt-4">
            <h3><i class="zi zi_starLine"></i> 购车流程 <i class="zi zi_starLine"></i></h3>
            <h6>// 规范的购车流程，确保给您既省心更舒心的购车体验  //</h6>
        </div>
        <div class="container mb-2 mt-4 mb-5">
            <div class="row text-center text-secondary">
                <div class="col-lg-3 col-md-6">
                    <div class="step-icon"><i class="zi zi_phonevolume zi_4x"></i></div>
                    <h6><b>第 1 步：</b>在线预约</h6>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="step-icon"><i class="zi zi_user zi_4x"></i></div>
                    <h6><b>第 2 步：</b>客户看车</h6>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="step-icon"><i class="zi zi_handshake  zi_4x"></i></div>
                    <h6><b>第 3 步：</b>合约签订</h6>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="step-icon"><i class="zi zi_key zi_4x"></i></div>
                    <h6><b>第 4 步：</b>客户提车</h6>
                </div>
            </div>
        </div>
    </div>
    <!------------------------购车流程-end-------------------------->
    @endsection
