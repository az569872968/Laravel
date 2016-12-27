<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta charset="utf-8" />
    <meta name="description" content="overview &amp; stats" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
    <title>@yield('title')</title>

    <!--style-->
    <link rel="stylesheet" type="text/css" href="/home/css/style/base/base.css"/>
    <link rel="stylesheet" type="text/css" href="/home/css/style/common/common.css"/>
    <link rel="stylesheet" type="text/css" href="/home/css/style/common/common-animation.css"/>
    <link rel="stylesheet" type="text/css" href="/home/css/style/common/common-module.css"/>
    <link rel="stylesheet" type="text/css" href="/home/css/style/page/style.css"/>
    <link rel="stylesheet" type="text/css" href="/home/css/lib/swiper/swiper.min.css"/>

    <!--font icon-->
    <link rel="stylesheet" type="text/css" href="/home/css/lib/FontAwesome/font-awesome.min.css"/>
    <!--[if IE]>
    <link rel="stylesheet" type="text/css" href="/home/css/lib/FontAwesome/font-awesome-ie7.min.css"/>
    <![endif]-->
    <script src="/home/js/lib/jquery/jquery-1.11.0.js" type="text/javascript" charset="utf-8"></script>

</head>
<body>
<!--start header-->
<div class="header-container">

    <div class="header-wrap">
        <div class="main-module clearfix rel">
            <div class="drop-down-wrap abs">
                <div class="drop-down-title">
                    <span class="f16">浏览项目</span>
                    <i class="fa fa-angle-down f16"></i>
                </div><!--./drop-down-title-->
                <div class="drop-down-item">
                    <div class="drop-down-input">
                        <input type="text" name="" id="" value="" placeholder="请输入项目名称查询"/>
                    </div>
                    <div class="drop-down-list">
                        <ul class="list-item">
                            @foreach($project as $item => $value)
                            <li><a href="/home/project/index?id={{ $value['id'] }}">{{ $value['project_name'] }}</a></li>
                            @endforeach
                        </ul><!--./list-item-->
                    </div><!--./drop-down-list-->
                </div><!--./drop-down-item-->
            </div><!--./drop-down-wrap-->
            <div class="logo-box"><img src="/home/images/header/logo.png" class="mt35" width="24" height="44"/></div><!--./logo-box-->
            <ul class="menu-list abs">
                <li>
                    <a href="javascript:;" class="fb f16">公司简介</a>
                </li>
                <li class="segment"></li>
                <li>
                    <a href="javascript:;" class="fb f16">联系我们</a>
                </li>
                <li class="segment"></li>
                @if(!Session::has('user'))
                    <li class="link-login active">
                        <a href="javascript:;" class="btn-img"><img src="/home/images/header/login-btn.png" width="81" height="32"/></a>
                    </li>
                @else
                    <li class="user-info active">
                        <a href="javascript:;" class="user fb f16">
                            <img src="/home/images/index/portrait-icon.png" width="32" height="32"/>
                            <span>{{ Session::get('user')->user_name }}</span>
                        </a>
                        <ul class="list-item">
                            <li><a href="javascript:;">{{ Session::get('user')->user_name }}</a></li>
                            <li><a href="javascript:;" class="login-out">登出</a></li>
                        </ul>
                    </li>
                @endif
            </ul><!--./menu-list-->
        </div><!--./modul-main-->
    </div><!--./header-wrap-->

</div><!--end header-->
<script type="text/javascript">

    $('.menu-list').on('click','.link-login',function(){
        showLogin();
    })

    $('.menu-list').on('click','.login-out',function(){
        window.location.href='/home/index/loginout';
        //loginOut();
    })

    $(document).on('click','.return-btn',function(){
        closeLogin();
    })

    $(document).on('click','.login-btn',function(){
        $.ajax({
            url:'/home/index/login',
            type:'post',
            dateType:'json',
            data:$('#LogFrom').serialize(),
            success:function (result) {
                if(result.status == -1){
                    alert(result.msg);
                }
                window.location.reload();
            }
        });
        //LoginSuccess();
    })

    function LoginSuccess(){
        $('.link-login').removeClass('active');
        $('.user-info').addClass('active');
        closeLogin();
    }

    function loginOut(){
        $('.user-info').removeClass('active');
        $('.link-login').addClass('active');
    }

    function showLogin(){
        $('.login-wrap').addClass('active');
    }

    function closeLogin(){
        $('.login-wrap').removeClass('active');
    }

</script>
@yield('content')
<div class="footer-container">
    <div class="main-module clearfix">
        <div class="footer-copyright fl">
            <div class="logo">
                <img src="/home/images/footer/footer-logo.png" width="86" height="42"/>
            </div>
            <p class="txt mt10">Copyright © <a href="javascript:;">公司的名称</a> - 鄂ICP备143245435号-43</p>
        </div><!--./footer-copyright-->

        <ul class="share-item fr clearfix">
            <li><a href="javascript:;"><img src="/home/images/footer/share-item-1.png" width="33" height="32"/></a></li>
            <li><a href="javascript:;"><img src="/home/images/footer/share-item-2.png" width="33" height="32"/></a></li>
            <li><a href="javascript:;"><img src="/home/images/footer/share-item-3.png" width="33" height="32"/></a></li>
        </ul><!--./share-item-->

    </div><!--./main-module-->

</div><!--end footer-->
</body>
</html>