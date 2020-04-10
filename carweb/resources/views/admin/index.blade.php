<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width-device-width,initial-scale=1,shrink-to-fit=no">
    <link rel="stylesheet" href="/showpagestyle/lib/css/bootstrap.css">
    <link rel="stylesheet" href="/showpagestyle/css/index.css">
    <link rel="stylesheet" href="/showpagestyle/lib/css/zico.min.css" >
    <title>首页</title>


</head>
<style type="text/css">
    #navbarNav .nav a{
        margin: 5px 0;
    }
    #navbarNav .nav a:hover{
        border-bottom: 2px solid #fff;
    }
</style>
<body>


<div class="container-fluid p-0 m-0">
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-dark shadow-sm">
            <div class="container-fluid">
                <a class="navbar-brand text-light" href="#">
                    <h5 class="mb-0 p-1">CarWeb 页面管理后台</h5>
                </a>

                <div class="navbar-collapse" id="navbarSupportedContent">
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link text-light" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link text-light" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</div>
    {{--
    <div class="row">

    <div class="col text-light bg-dark p-2">
            <div class="d-flex justify-content-between">
                <h5 class="mb-0 p-1">CarWeb 页面管理后台</h5>
                <div>
                    <ul class="list-group list-group-horizontal mt-1">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item mr-3">
                                <a class="text-light" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item mr-5">
                                    <a class="text-light" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </div>
    </div>
    --}}


    <div class="row">
        <div class="col-lg-2 bg-info">
            <nav class="navbar navbar-expand-lg navbar-light justify-content-end">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse align-items-start" id="navbarNav">
                    <div class="nav flex-column pt-lg-5" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                        <a class="nav-link text-light" id="v-pills-user-tab" data-toggle="tab" href="#v-pills-user" role="tab" aria-controls="v-pills-user" aria-selected="false">用户列表</a>
                        <a class="nav-link text-light" id="v-pills-banner-tab" data-toggle="tab" href="#v-pills-banner" role="tab" aria-controls="v-pills-banner" aria-selected="false">banner管理</a>
                        <a class="nav-link text-light" id="v-pills-home-tab" data-toggle="tab" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="false">首页管理</a>
                        <a class="nav-link text-light" id="v-pills-profile-tab" data-toggle="tab" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">公司简介管理</a>
                    </div>

                </div>
            </nav>
        </div>

        <div class="col-lg-10">
            <div class="tab-content" id="v-pills-tabContent">
                <div class="tab-pane fade" id="v-pills-user" role="tabpanel" aria-labelledby="v-pills-user-tab">
                    <div class="container-fluid table-responsive">
                        <button type="button" class="btn btn-info m-3" data-toggle="modal" data-target="#addUserModal" data-whatever="">新增</button>
                        <table class="table table-striped text-center text-nowrap">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">姓名</th>
                                <th scope="col">邮箱</th>
                                <th scope="col">注册时间</th>
                                <th scope="col">操作</th>
                            </tr>
                            </thead>
{{--                            {{var_dump($errors)}}--}}
                            @if(!empty($errors->first()))
                                <script>alert("{{$errors->first()}}")</script>
                            @endif
                            @if(!empty(session('passerrors')))
                                <script>alert("{{session('passerrors')}}")</script>
                            @endif
                            <tbody>
                            @isset($users)
                            @foreach($users as $user)
                                <tr>
                                    <th scope="row">{{$user->id}}</th>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>{{$user->created_at}}</td>
                                    <td>
                                        <button onclick="setUserValue('user',{{$user->id}},'{{$user->name}}','{{$user->email}}','{{$user->password}}')" type="button" class="btn btn-info btn-sm pt-0 pb-0" data-toggle="modal"
                                                data-target="#EditUserModal" data-whatever="">编辑</button>
                                        <button onclick="del('user',{{$user->id}})" type="button" class="btn btn-info btn-sm pt-0 pb-0">删除</button>
                                    </td>
                                </tr>
                            @endforeach
                            @endisset
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="tab-pane fade" id="v-pills-banner" role="tabpanel" aria-labelledby="v-pills-banner-tab">
                    <div class="container-fluid table-responsive">
                        <button type="button" class="btn btn-info m-3" data-toggle="modal" data-target="#addBannerModal" data-whatever="">新增</button>
                        <table class="table table-striped text-center text-nowrap">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">名称</th>
                                <th scope="col">banner图片</th>
                                <th scope="col">备注</th>
                                <th scope="col">是否展示</th>
                                <th scope="col">添加时间</th>
                                <th scope="col">操作</th>
                            </tr>
                            </thead>
                            <tbody>
                            @isset($banners)
                            @foreach($banners as $banner)
                                <tr>
                                    <th scope="row" class="align-middle">{{$banner->id}}</th>
                                    <td class="align-middle">{{$banner->name}}</td>
                                    <td class="align-middle"><img src="/showpagestyle/images/{{$banner->imgurl}}" alt="" height="50" title="{{$banner->imgurl}}"> <br></td>
                                    <td class="align-middle">{{$banner->notes}}</td>
                                    <td class="align-middle">{{$banner->is_show==1?'是':'否'}}</td>
                                    <td class="align-middle">{{$banner->created_at}}</td>
                                    <td class="align-middle">
                                        <button onclick="setBannerValue('banner',{{$banner->id}},'{{$banner->name}}','{{$banner->imgurl}}','{{$banner->notes}}','{{$banner->is_show}}')" type="button" class="btn btn-info btn-sm pt-0 pb-0" data-toggle="modal"
                                                data-target="#EditBannerModal" data-whatever="">编辑</button>
                                        <button onclick="del('banner',{{$banner->id}})" type="button" class="btn btn-info btn-sm pt-0 pb-0">删除</button>
                                    </td>
                                </tr>
                            @endforeach
                            @endisset
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="tab-pane fade" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                    <div class="container-fluid table-responsive">
                        <button type="button" class="btn btn-info m-3" data-toggle="modal" data-target="#addCarmsgModal" data-whatever="">新增</button>
                        <table class="table table-striped text-center text-nowrap">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">dd标题</th>
                                <th scope="col">图片</th>
                                <th scope="col">说明内容</th>
                                <th scope="col">补贴标题</th>
                                <th scope="col">是否热销</th>
                                <th scope="col">是否展示</th>
                                <th scope="col">添加时间</th>
                                <th scope="col">操作</th>
                            </tr>
                            </thead>
                            <tbody>
                            @isset($recommends)
                                @foreach($recommends as $recommend)
                                    <tr>
                                        <th class="align-middle" scope="row">{{$recommend->id}}</th>
                                        <td class="align-middle">{{$recommend->title}}</td>
                                        <td class="align-middle"><img src="/showpagestyle/images/{{$recommend->imgurl}}" alt="" title="{{$recommend->imgurl}}" width="100"></td>
                                        <td class="align-middle">{!! $recommend->detail !!}</td>
                                        <td class="align-middle">{{$recommend->gift_title}}</td>
                                        <td class="align-middle">{!! $recommend->is_hot==1?'<span class="text-danger">是</span>':'否' !!}</td>
                                        <td class="align-middle">{{$recommend->is_show==1?'是':'否'}}</td>
                                        <td class="align-middle">{{$recommend->created_at}}</td>
                                        <td class="align-middle">
                                            <button
                                                    onclick="setCarmsgValue('home','{{$recommend->id}}','{{$recommend->title}}','{{$recommend->imgurl}}','{{$recommend->detail}}','{{$recommend->gift_title}}','{{$recommend->is_hot}}','{{$recommend->is_show}}')" type="button" class="btn btn-info btn-sm pt-0 pb-0" data-toggle="modal"
                                                    data-target="#EditCarmsgModal" data-whatever="">编辑</button>
                                            <button onclick="del('home','{{$recommend->id}}')" type="button" class="btn btn-info btn-sm pt-0 pb-0">删除</button>
                                        </td>
                                    </tr>
                                @endforeach
                            @endisset
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="tab-pane fade" id="v-pills-carsafe" role="tabpanel" aria-labelledby="v-pills-carsafe-tab">...</div>
                <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                    <div class="container-fluid table-responsive mt-5">
                        @isset($profile)
                        <form id="editProfile" method="post" action="/admin/edit/profile/{{$profile['id']}}" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mt-3">公司简介内容：<textarea class="form-control" name="description" id="" rows="12">{{$profile['description']}}</textarea></div>
                                    <div class="mt-3">电话：<input class="form-control" type="text" name="call_number" value="{{$profile['call_number']}}"></div>
                                    <div class="mt-3">手机：<input class="form-control" type="text" name="phone_number" value="{{$profile['phone_number']}}"></div>
                                    <div class="mt-3">邮箱：<input class="form-control" type="text" name="email" value="{{$profile['email']}}"></div>
                                    <div class="mt-3">地址：<input class="form-control" type="text" name="address" value="{{$profile['address']}}"></div>
                                </div>
                                <div class="col-lg-6 text-center">
                                    （ 只能上传jpg文件 ）
                                    <div class="d-flex align-items-center justify-content-around mt-3">
                                        微信二维码：<img id="wximgurl" class="img-thumbnail" src="/showpagestyle/images/wxqrcode.jpg" alt="" width="100">
                                        <input type="file" accept="image/jpg" class="" name="wximgurl" onchange="changepic(this)">
                                        @isset($rsmsg['wximgurl'])
                                            <span class="text-danger">{{$rsmsg['wximgurl']}}</span>
                                        @endisset
                                    </div>
                                    <div class="d-flex align-items-center justify-content-around mt-3">
                                        QQ二维码：<img id="qqimgurl" class="img-thumbnail" src="/showpagestyle/images/qqqrcode.jpg" alt="" width="100">
                                        <input type="file" accept="image/jpg" class="" name="qqimgurl" onchange="changepic(this)">
                                        @isset($rsmsg['qqimgurl'])
                                            <span class="text-danger">{{$rsmsg['qqimgurl']}}</span>
                                        @endisset
                                    </div>
                                    <div class="d-flex align-items-center justify-content-around mt-3">
                                        地图：<img id="mapurl" class="img-thumbnail" src="/showpagestyle/images/map.jpg" alt="" width="200">
                                        <input type="file" accept="image/jpg" class="" name="mapurl"  onchange="changepic(this)">
                                        @isset($rsmsg['mapurl'])
                                            <span class="text-danger">{{$rsmsg['mapurl']}}</span>
                                        @endisset
                                    </div>
                                    <div class="d-flex align-items-center justify-content-around mt-3">
                                        公司图片：<img id="imgurl" class="img-thumbnail" src="/showpagestyle/images/company.jpg" alt="" width="200">
                                        <input type="file" accept="image/jpg" class="" name="imgurl" onchange="changepic(this)">
                                        @isset($rsmsg['imgurl'])
                                            <span class="text-danger">{{$rsmsg['imgurl']}}</span>
                                        @endisset
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col text-center mt-5">
                                    <a href="/admin/profile" class="btn btn-secondary mr-5">刷新页面</a>
                                    <button type="submit" class="btn btn-info">确认修改</button>
                                </div>
                            </div>
                        </form>
                        @endisset()
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{--model 模块--}}
{{--user-add 模块--}}
<div class="modal fade" id="addUserModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">新增用户</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" action="/admin/user">
            @csrf
            <div class="modal-body">
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">姓名:</label>
                        <input type="text" class="form-control" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">邮箱:</label>
                        <input type="text" class="form-control" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">密码:</label>
                        <input type="password" class="form-control"  name="password" >
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">确认密码:</label>
                        <input type="repassword" class="form-control" name="password_confirmation">
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">关闭</button>
                <button type="submit" class="btn btn-primary">确定新增</button>
            </div>
            </form>
        </div>
    </div>
</div>

{{--user-edit 模块--}}
<div class="modal fade" id="EditUserModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">修改用户信息</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="formedit" method="post" action="/admin/edit/user/">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">姓名:</label>
                        <input type="text" class="form-control" id="edit-recipient-name" name="name">
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">邮箱:</label>
                        <input type="text" class="form-control" id="edit-recipient-email" name="email">
                    </div>

                    <a href="#" class="d-flex justify-content-end" onclick="resetPassword(this)">重置密码</a>
                    <div id="displaypassword" class="invisible">
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">新密码:</label>
                            <input type="password" class="form-control" id="edit-recipient-password" name="password">
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">确认密码:</label>
                            <input type="repassword" class="form-control" id="edit-recipient-repassword" name="password_confirmation">
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">关闭</button>
                    <button type="submit" class="btn btn-primary">确定修改</button>
                </div>
            </form>
        </div>
    </div>
</div>

{{--banner-add 模块--}}
<div class="modal fade" id="addBannerModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">新增Banner</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" action="/admin/banner" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">(必填)banner名称:</label>
                        <input type="text" class="form-control" id="recipient-name" name="name" required>
                        <select class="custom-select" name="name">
                            <option value="index-lg" selected>首页-大图</option>
                            <option value="index-sm">首页-小图</option>
                            <option value="carsafe-lg">车险服务-大图</option>
                            <option value="carsafe-sm">车险服务-小图</option>
                            <option value="profile-lg">公司简介-大图</option>
                            <option value="profile-sm">公司简介-小图</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <div><img id="banner_img" class="img-thumbnail" src="" alt="" width="300"></div>
                        <input type="file" accept="image/jpg" class="mt-2 btn-sm" name="imgurl" onchange="setshowbanner(this)">
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">备注:</label>
                        <input type="text" class="form-control" id="recipient-name" name="notes" required>
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">是否展示: </label>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="is_show" value="1" checked>
                            <label class="form-check-label" for="inlineRadio1">是</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="is_show" value="0">
                            <label class="form-check-label" for="inlineRadio2">否</label>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">关闭</button>
                    <button type="submit" class="btn btn-primary">确定新增</button>
                </div>
            </form>
        </div>
    </div>
</div>

{{--banner-edit 模块--}}
<div class="modal fade" id="EditBannerModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">编辑Banner</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" id="banneredit" action="/admin/edit/banner/" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">(必填)banner名称:</label>
{{--                        <input type="text" class="form-control" id="edit-banner-name" name="name" required>--}}
                        <select class="custom-select" id="edit-banner-name" name="name">
                            <option value="index-lg" selected>首页-大图</option>
                            <option value="index-sm">首页-小图</option>
                            <option value="carsafe-lg">车险服务-大图</option>
                            <option value="carsafe-sm">车险服务-小图</option>
                            <option value="profile-lg">公司简介-大图</option>
                            <option value="profile-sm">公司简介-小图</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <div><img id="edit-banner_img" class="img-thumbnail" src="" alt="" width="300"></div>
                        <input type="file" accept="image/jpg" class="mt-2 btn-sm" name="imgurl" onchange="setshowbanner(this)">
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">备注:</label>
                        <input type="text" class="form-control" id="edit-banner-notes" name="notes" required>
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">是否展示: </label>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="is_show" value="1">
                            <label class="form-check-label" for="inlineRadio1">是</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="is_show" value="0">
                            <label class="form-check-label" for="inlineRadio2">否</label>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">关闭</button>
                    <button type="submit" class="btn btn-primary">确定编辑</button>
                </div>
            </form>
        </div>
    </div>
</div>

{{--carmsg-add 模块--}}
<div class="modal fade" id="addCarmsgModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">新增首页商品</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" action="/admin/home" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">标题:</label>
                        <input type="text" class="form-control" id="car-title" name="title" required>
                    </div>
                    <div class="form-group">
                        <div><img id="car-imgurl" class="img-thumbnail" src="" alt="" width="300"></div>
                        <input type="file" accept="image/jpg" class="mt-2 btn-sm" name="imgurl" onchange="setshowbanner(this)">
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">参数详情:</label>
                        <input type="text" class="form-control" id="car-detail" name="detail" required>
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">补贴说明:</label>
                        <input type="text" class="form-control" id="car-gifttitle" name="gift_title">
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">是否热销:</label>
                        <input type="text" class="form-control" id="car-ishot" name="is_hot" required>
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">是否首页展示:</label>
                        <input type="text" class="form-control" id="car-isshow" name="is_show" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">关闭</button>
                    <button type="submit" class="btn btn-primary">确定新增</button>
                </div>
            </form>
        </div>
    </div>
</div>

{{--carmsg-edit 模块--}}
<div class="modal fade" id="EditCarmsgModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">修改首页商品</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" id="carmsgedit" action="/admin/edit/home/" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">标题:</label>
                        <input type="text" class="form-control" id="edit-car-title" name="title" required>
                    </div>
                    <div class="form-group">
                        <div><img id="edit-car-imgurl" class="img-thumbnail" src="" alt="" width="300"></div>
                        <input type="file" accept="image/jpg" class="mt-2 btn-sm" name="imgurl" onchange="setshowbanner(this)">
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">参数详情:</label>
                        <input type="text" class="form-control" id="edit-car-detail" name="detail" required>
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">补贴说明:</label>
                        <input type="text" class="form-control" id="edit-car-gifttitle" name="gift_title">
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">是否热销:</label>
                        <input type="text" class="form-control" id="edit-car-ishot" name="is_hot" required>
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">是否首页展示:</label>
                        <input type="text" class="form-control" id="edit-car-isshow" name="is_show" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">关闭</button>
                    <button type="submit" class="btn btn-primary">确定修改</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="/showpagestyle/lib/js/jquery.js"></script>
<script src="/showpagestyle/lib/js/bootstrap.bundle.js"></script>
{{--<script src="/showpagestyle/lib/js/popper.js" type="module"></script>--}}
{{--<script src="/showpagestyle/lib/js/bootstrap.js"></script>--}}

<script>

    //预览公司信息编辑页面上传的图片
    function changepic(obj) {
        //console.log(obj.getAttribute('name'));
        //console.log(obj.files[0]);//这里可以获取上传文件的name
        //获取当前input对象的name 在html中设置input的上一个img元素id值与当前input的name值一致，方便下面获取img元素并设置其新的url地址
        var setShwoId = obj.getAttribute('name');
        var newsrc=getObjectURL(obj.files[0]);
        document.getElementById(setShwoId).src=newsrc;
    }

    //预览banner图片上传的图片
    function setshowbanner(obj){
        //获取上一个兄弟元素节点 的子元素
        var preobj = obj.previousElementSibling.childNodes[0];
        //console.log(preobj);
        //预览上传图片
        //获取上传图片的临时地址
        var newsrc=getObjectURL(obj.files[0]);
        //显示上传图片 获取input前一个img元素对象 由于html中设置的img的id与input的name一致，所以可以直接获取
        preobj.src=newsrc;
    }


    //建立一個可存取到該file的url
    function getObjectURL(file) {
        var url = null ;
        // 下面函数执行的效果是一样的，只是需要针对不同的浏览器执行不同的 js 函数而已
        if (window.createObjectURL!=undefined) { // basic
            url = window.createObjectURL(file) ;
        } else if (window.URL!=undefined) { // mozilla(firefox)
            url = window.URL.createObjectURL(file) ;
        } else if (window.webkitURL!=undefined) { // webkit or chrome
            url = window.webkitURL.createObjectURL(file) ;
        }
        return url ;
    }



    //user--edit 设置edit模态框中的input默认值
    function setUserValue(opname,id,name,email,password){
        //document.getElementById("edit-recipient-id").value = id;
        document.getElementById("edit-recipient-name").value = name;
        document.getElementById("edit-recipient-email").value = email;
        var actionurl = document.getElementById("formedit").action+id;
        //document.write(formedit);return false;
        document.getElementById("formedit").action = actionurl;
    }

    //banner--edit 设置edit模态框中的input默认值
    function setBannerValue(opname,id,name,imgurl,notes,is_show){
        set_select_checked("edit-banner-name",name);
        set_radio_checked('is_show', is_show);
        document.getElementById("edit-banner_img").src = '/showpagestyle/images/'+imgurl;
        document.getElementById("edit-banner-notes").value = notes;
        var actionurl = document.getElementById("banneredit").action+id;
        //document.write(document.getElementById("banner_img").src);return false;
        document.getElementById("banneredit").action = actionurl;
    }

    /**
     * 设置select控件选中
     * @param selectId select的id值
     * @param checkValue 选中option的值
     */
    function set_select_checked(selectId, checkValue){
        var select = document.getElementById(selectId);
        for (var i = 0; i < select.options.length; i++){
            if (select.options[i].value == checkValue){
                select.options[i].selected = true;
                break;
            }
        }
        // 获取选中的option值
        // var myselect = document.getElementById("edit-banner-name");
        // var value= myselect.options[myselect.selectedIndex].value；
        //alert(value);
    }
    /**
     * 设置radio控件选中
     * @param radioName radio的name值
     * @param checkValue 选中radio的值
     */
    function set_radio_checked(radioName, checkValue){
        var radio = document.getElementsByName(radioName);
        //console.log(radio);
        for (var i = 0; i < radio.length; i++){
            if (radio[i].value == checkValue){
                //console.log(radio[i]);
                radio[i].checked = true;
            }else{
                radio[i].checked = false;
            }
        }
    }


    //carmsg--edit 设置edit模态框中的input默认值
    function setCarmsgValue(opname,id,title,imgurl,detail,gift_title,is_hot,is_show) {
        document.getElementById("edit-car-title").value = title;
        //alert(document.getElementById("edit-car-imgurl").src);return false;
        document.getElementById("edit-car-imgurl").src = '/showpagestyle/images/'+imgurl;
        document.getElementById("edit-car-detail").value = detail;
        document.getElementById("edit-car-gifttitle").value = gift_title;
        document.getElementById("edit-car-ishot").value = is_hot;
        document.getElementById("edit-car-isshow").value = is_show;

        var actionurl = document.getElementById("carmsgedit").action+id;
        //document.write(actionurl);return false;
        document.getElementById("carmsgedit").action = actionurl;
    }


    //del 删除操作
    function del(obname,id){
        if(confirm('确认要删除吗')){
            location.href="/admin/del/"+obname+"/"+id;
        }else {
            return false;
        }
    }


    //窗口载入时操作
    window.onload = function () {
        //设置左侧div的高度，达到背景自适应的效果
        setHeight();

        //设置右侧滑动门默认显示
        var opname = '{{$opname}}';
        var v_pills_user = document.getElementById('v-pills-user');
        var v_pills_banner = document.getElementById('v-pills-banner');
        var v_pills_home = document.getElementById('v-pills-home');
        var v_pills_profile = document.getElementById('v-pills-profile');
        var v_pills_list = [v_pills_user,v_pills_banner,v_pills_home,v_pills_profile];

        //将当前滑动门的模块id与laravel控制器return view带回来的参数对比，如果一致，则显示，不一致则隐藏
        for(i=0;i<v_pills_list.length;i++){
            if('v-pills-'+opname == v_pills_list[i].id){
                v_pills_list[i].className = 'tab-pane fade show active';
            }else{
                v_pills_list[i].className = 'tab-pane fade';
            }
        }
    };

    /* 设置 重置密码/取消重置 对应的显示/隐藏密码修改模块 */
    // 定义全局变量flag 用于设置 重置/取消 内容切换
    var flag=0;
    function resetPassword(obj) {
        var resetobj = document.getElementById("displaypassword");
        if(flag==0){
            flag = 1;
            resetobj.className = "visible";
            obj.innerText = "取消重置";
            //清空密码框中的内容
            document.getElementById("edit-recipient-password").value = "";
            document.getElementById("edit-recipient-repassword").value = "";
        }else{
            flag = 0;
            resetobj.className = "invisible";
            obj.innerText = "重置密码";
        }

    }

    //窗口大小改变时同步设置左侧div的高度，达到背景自适应的效果
    window.onresize = function(){
        setHeight();
    }

    //设置div的高度
    function setHeight(){
        var height = window.innerHeight;
        height = height-60;
        document.getElementById("navbarNav").style = "height:"+height+'px';
    }


</script>



</body>
</html>