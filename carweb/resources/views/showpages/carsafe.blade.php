
@extends('layouts.showapp')
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


<!-----------------------服务优势-begin---------------------->
<div id="carsaft">
    <div class="container mt-5 mb-5">
        <h4 class="text-center mb-5">// 我们的优势是什么？//</h4>
        <div class="row text-center">
            <div class="col-4">
                <i class="zi zi_sortamountdown zi_3x p-2 pl-3 pr-3 shadow-sm"><h5>最低价</h5></i>
                <h6 class="mt-3 mt-lg-4">健全的渠道，确保为您提供最低的车险价格</h6>
            </div>
            <div class="col-4">
                <i class="zi zi_handholdingheart zi_3x p-2 pl-3 pr-3 shadow-sm"><h5>最省心</h5></i>
                <h6 class="mt-3 mt-lg-4">全程代办，让您足不出户即可办理</h6>
            </div>
            <div class="col-4">
                <i class="zi zi_shippingfast zi_3x p-2 pl-3 pr-3 shadow-sm"><h5>最快捷</h5></i>
                <h6 class="mt-3 mt-lg-4">工作日24小时内为您办理妥当</h6>
            </div>
        </div>
        <div class="text-center mt-5"><button type="button" class="btn btn-warning pl-5 pr-5" data-toggle="modal" data-target="#exampleModalCenter"><b>立即咨询办理</b> >></button></div>
    </div>
</div>
<!------------------------服务优势-end----------------------->

<!------------------------覆盖品牌-start----------------------->
<div id="brands" class="bg-light pt-5 pb-5">
    <div class="container">
        <div class="title text-center mb-4">
            <h4>// 主流保险公司全覆盖//</h4>
            <h6>支持各大主流保险公司车险办理服务，我们还会根据您的实际情况为您提供最优的配套方案</h6>
        </div>
        <div class="row">
            <div class="col-lg-6 mr-0">
                <img src="/showpagestyle/images/carsaft-logo1.jpg" alt="" width="100%">
            </div>
            <div class="col-lg-6">
                <img src="/showpagestyle/images/carsaft-logo2.jpg" alt="" width="100%">
            </div>
        </div>

    </div>
</div>
<!------------------------覆盖品牌-end----------------------->
@endsection