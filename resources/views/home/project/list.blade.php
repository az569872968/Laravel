@extends('home.layouts.base')

@section('title','首页')

@section('content')
<!--start main-->
<div class="main-container">
    <div class="bread-crumbs-wrap">
        <div class="main-module">
            <ul class="list-item clearfix">
                <li><a href="/"><img src="/home/images/common/home-icon.png" width="14" height="14" class="mr15" /><span>首页</span></a></li>
                <li class="ml25 mr25"><i class="fa fa-angle-right"></i></li>
                <li><a href="/home/project/index"><span>项目列表</span></a></li>
                <li class="ml25 mr25"><i class="fa fa-angle-right"></i></li>
                <li><a href="/home/project/show?id={{ $info['id'] }}"><span>{{ $info['project_name'] }}</span></a></li>
            </ul><!--./list-item-->
        </div><!--./main-module-->
    </div><!--./bread-crumbs-wrap-->

    <div class="main-module pt40 pb70">

        <ul class="page4-list-item clearfix">
            <li>
                <h4 class="title mb10 tc fb f18">工程招标</h4>
                <div class="info-details">
                    <div class="swiper-container swiper-container-a">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide"><a href="/home/tender/index?project_id={{ $info['id'] }}"><img src="/home/images/index/001.png" width="194" height="235"/></a></div>
                            <div class="swiper-slide"><a href="/home/tender/index?project_id={{ $info['id'] }}"><img src="/home/images/index/002.png" width="194" height="235"/></a></div>
                        </div>
                        <div class="swiper-pagination swiper-pagination-a"></div>
                    </div>
                    <div class="info-txt mt30 pl25 pr25">
                        <p class="fb tc">提供专业严谨的招标文件及合同文件</p>
                    </div><!--./info-txt-->
                </div><!--./info-details-->
            </li>
            <li>
                <h4 class="title mb10 tc fb f18">进度款统计</h4>
                <div class="info-details">
                    <div class="swiper-container swiper-container-b">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide"><a href="/home/contract/index?project_id={{ $info['id'] }}"><img src="/home/images/index/002.png" width="194" height="235"/></a></div>
                            <div class="swiper-slide"><a href="/home/contract/index?project_id={{ $info['id'] }}"><img src="/home/images/index/003.png" width="194" height="235"/></a></div>
                        </div>
                        <div class="swiper-pagination swiper-pagination-b"></div>
                    </div>
                    <div class="info-txt mt30 pl25 pr25">
                        <p class="fb tc">使用VFI工程量计算文件，及时调整工程造价</p>
                    </div><!--./info-txt-->
                </div><!--./info-details-->
            </li>
            <li>
                <h4 class="title mb10 tc fb f18">工程预算</h4>
                <div class="info-details">
                    <div class="swiper-container swiper-container-c">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide"><a href="/home/settlement/index?project_id={{ $info['id'] }}"><img src="/home/images/index/004.png" width="194" height="235"/></a></div>
                            <div class="swiper-slide"><a href="/home/settlement/index?project_id={{ $info['id'] }}"><img src="/home/images/index/005.png" width="194" height="235"/></a></div>
                        </div>
                        <div class="swiper-pagination swiper-pagination-c"></div>
                    </div>
                    <div class="info-txt mt30 pl25 pr25">
                        <p class="fb tc">实时监控变更对造价的影响</p>
                    </div><!--./info-txt-->
                </div><!--./info-details-->
            </li>
            <li>
                <h4 class="title mb10 tc fb f18">工程结算</h4>
                <div class="info-details">
                    <div class="swiper-container swiper-container-d">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide"><a href="/home/project/summary?project_id={{ $info['id'] }}"><img src="/home/images/index/005.png" width="194" height="235"/></a></div>
                            <div class="swiper-slide"><a href="/home/project/summary?project_id={{ $info['id'] }}"><img src="/home/images/index/002.png" width="194" height="235"/></a></div>
                        </div>
                        <div class="swiper-pagination swiper-pagination-d"></div>
                    </div>
                    <div class="info-txt mt30 pl25 pr25">
                        <p class="fb tc">掌控最新结算情况</p>
                    </div><!--./info-txt-->
                </div><!--./info-details-->
            </li>
            <li>
                <h4 class="title mb10 tc fb f18">工程审计</h4>
                <div class="info-details">
                    <div class="swiper-container swiper-container-e">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide"><img src="/home/images/index/003.png" width="194" height="235"/></div>
                            <div class="swiper-slide"><img src="/home/images/index/001.png" width="194" height="235"/></div>
                        </div>
                        <div class="swiper-pagination swiper-pagination-e"></div>
                    </div>
                    <div class="info-txt mt30 pl25 pr25">
                        <p class="fb tc">全面,细致的工程量及费用审核</p>
                    </div><!--./info-txt-->
                </div><!--./info-details-->
            </li>
        </ul>

    </div><!--./main-module-->

    <div class="bottom-link pb60">
        <h4 class="title tc pt30"><img src="/home/images/footer/link-title.png" width="254" height="46"/></h4>
        <ul class="link-list clearfix">
            <li><a href="javascript:;"><img src="/home/images/footer/link-1.png" width="200" height="88"/></a></li>
            <li><a href="javascript:;"><img src="/home/images/footer/link-2.png" width="200" height="88"/></a></li>
            <li><a href="javascript:;"><img src="/home/images/footer/link-3.png" width="200" height="88"/></a></li>
            <li><a href="javascript:;"><img src="/home/images/footer/link-4.png" width="200" height="88"/></a></li>
            <li><a href="javascript:;"><img src="/home/images/footer/link-5.png" width="200" height="88"/></a></li>
            <li><a href="javascript:;"><img src="/home/images/footer/link-6.png" width="200" height="88"/></a></li>
            <li><a href="javascript:;"><img src="/home/images/footer/link-7.png" width="200" height="88"/></a></li>
            <li><a href="javascript:;"><img src="/home/images/footer/link-8.png" width="200" height="88"/></a></li>
        </ul><!--./link-list-->
    </div><!--./bottom-link-->
</div><!--./end main-->
<script src="/home/js/lib/swiper/swiper.js" type="text/javascript" charset="utf-8"></script>
<script type="text/javascript">
    var swiperV = new Swiper('.swiper-container-a', {
        pagination: '.swiper-pagination-a',
        paginationClickable: true,
        loop: true,
        autoplay: 2500
    });

    var swiperV = new Swiper('.swiper-container-b', {
        pagination: '.swiper-pagination-b',
        paginationClickable: true,
        loop: true,
        autoplay: 2500
    });

    var swiperV = new Swiper('.swiper-container-c', {
        pagination: '.swiper-pagination-c',
        paginationClickable: true,
        loop: true,
        autoplay: 2500
    });

    var swiperV = new Swiper('.swiper-container-d', {
        pagination: '.swiper-pagination-d',
        paginationClickable: true,
        loop: true,
        autoplay: 2500
    });

    var swiperV = new Swiper('.swiper-container-e', {
        pagination: '.swiper-pagination-e',
        paginationClickable: true,
        loop: true,
        autoplay: 2500
    });
</script>
@stop