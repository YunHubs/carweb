<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width-device-width,initial-scale=1,shrink-to-fit=no">
    <link rel="stylesheet" href="/showpagestyle/lib/css/bootstrap.css">
    <link rel="stylesheet" href="/showpagestyle/css/index.css">
    <link rel="stylesheet" href="/showpagestyle/lib/css/zico.min.css" >
    @yield('stylesheet')
    <title>首页</title>
</head>
<body>
<!------------------------头部-begin------------------------>
<div id="car_head">
    <nav class="navbar navbar-expand-lg navbar-light fixed-top bg-white shadow-sm">
        <div class="container bg-white">
            <a class="navbar-brand" href="#">LOGO</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="/">首页</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/carsafe">车险服务</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/aboutus">公司简介</a>
                    </li>
                    <li class="nav-item d-none d-lg-block">
                        <a class="nav-link" href="#">电话：0551-66666666</a>
                    </li>
                    <li class="nav-item d-none d-lg-block">
                        <a class="nav-link" href="#">|</a>
                    </li>
                    <li class="nav-item d-none d-lg-block showcode">
                        <a class="nav-link" href="#">咨询微信
                            <img class="img-thumbnail" src="/showpagestyle/images/wxqrcode.jpg" alt="" width="100">
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</div>

<!------------------------头部-end-------------------------->

@yield('content')

<!------------------------尾部-begin------------------------>
<div id="footer">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="text-center d-none d-lg-block">
                    <h6 class="mt-4 mb-3">覆盖30个以上的主流汽车品牌</h6>
                    <img src="/showpagestyle/images/car_logo.png" alt="" width="60%">
                </div>
            </div>
            <div class="col-lg-6 d-flex justify-content-center align-items-center mt-3">
                <p class="border-right mr-3 pr-3 mb-0 text-right">
                    0551-66666666
                    <br>
                    拨打咨询热线，随时为您服务
                    <br>
                    工作时间：9：00-20：00
                </p>
                <img class="img-thumbnail" src="/showpagestyle/images/wxqrcode.jpg" alt="" width="110px">
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="text-center mt-3 pt-3 border-top copyright">
                    Copyright 2020 www.guazidd55.com All Rights Reserved
                    京ICP备15065625555号 ICP证516571号
                    京公网安备156165127713号
                </div>
            </div>
        </div>
    </div>
</div>
<!------------------------尾部-end-------------------------->


<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header border-0 bg-warning" style="height: 200px;">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!--<div class="modal-body border-0 pb-0 ml-3 mb-0">-->
            <!--我们将第一时间为您提供购车方案-->
            <!--</div>-->
            <div class="modal-footer border-0">
                <div class="container">
                    <div class="row">
                        <div class="col-7 pr-0">
                            <input id="phone_input" type="text" name="phone" class="btn btn-warning btn-block" value="" placeholder="请输入手机号码">
                        </div>
                        <div class="col-5">
                            <button id="ok" type="button" class="btn btn-warning btn-block" data-dismiss="modal"><b>立即咨询</b></button>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>
</div>


<script src="/showpagestyle/lib/js/jquery.js"></script>
<script src="/showpagestyle/lib/js/bootstrap.bundle.js"></script>
<script src="/showpagestyle/lib/js/popper.js"></script>
<script src="/showpagestyle/lib/js/bootstrap.js"></script>

<script>
    $('#ok').click(function () {
        var phone_input = $('#phone_input').val();
        alert(phone_input);
    })
</script>
@yield('script')
</body>
</html><?php /**PATH E:\laragon\www\blog\resources\views/layouts/app.blade.php ENDPATH**/ ?>