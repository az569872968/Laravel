@extends('home.layouts.base')@section('title','首页')@section('content')<!--start main--><div class="main-container">    <div class="bread-crumbs-wrap">        <div class="main-module">            <ul class="list-item clearfix">                <li><a href="/"><img src="/home//home/images/common/home-icon.png" width="14" height="14" class="mr15" /><span>首页</span></a></li>                <li class="ml25 mr25"><i class="fa fa-angle-right"></i></li>                <li><a href="/home/project/index"><span>项目列表</span></a></li>                <li class="ml25 mr25"><i class="fa fa-angle-right"></i></li>                <li><a href="/home/project/show?id={{ $info['id'] }}"><span>{{ $info['project_name'] }}</span></a></li>            </ul><!--./list-item-->        </div><!--./main-module-->    </div><!--./bread-crumbs-wrap-->    <div class="page532-wrap pt30 pb100">        <div class="main-module">            <p class="tr pb30"><button class="page532-down-btn">下载文件</button></p>            <iframe height="800px" width="100%" src="http://view.officeapps.live.com/op/view.aspx?src=www.shizhuzaixian.com/excel.xlsx">            </iframe>        </div><!--./main-module-->    </div><!--./page531-wrap-->    <div class="bottom-link pb60">        <h4 class="title tc pt30"><img src="/home/images/footer/link-title.png" width="254" height="46"/></h4>        <ul class="link-list clearfix">            <li><a href="javascript:;"><img src="/home/images/footer/link-1.png" width="200" height="88"/></a></li>            <li><a href="javascript:;"><img src="/home/images/footer/link-2.png" width="200" height="88"/></a></li>            <li><a href="javascript:;"><img src="/home/images/footer/link-3.png" width="200" height="88"/></a></li>            <li><a href="javascript:;"><img src="/home/images/footer/link-4.png" width="200" height="88"/></a></li>            <li><a href="javascript:;"><img src="/home/images/footer/link-5.png" width="200" height="88"/></a></li>            <li><a href="javascript:;"><img src="/home/images/footer/link-6.png" width="200" height="88"/></a></li>            <li><a href="javascript:;"><img src="/home/images/footer/link-7.png" width="200" height="88"/></a></li>            <li><a href="javascript:;"><img src="/home/images/footer/link-8.png" width="200" height="88"/></a></li>        </ul><!--./link-list-->    </div><!--./bottom-link--></div><!--./end main-->@stop