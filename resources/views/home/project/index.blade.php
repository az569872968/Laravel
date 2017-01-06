@extends('home.layouts.base')

@section('title','首页')

@section('content')
    <!--start main-->
    <div class="main-container">

        <div class="page3-main pt60 pb40">
            <div class="main-module clearfix">
                <div class="page3-left fl">
                    <img src="/home/images/index/page3-left-img.jpg" width="648" height="548"/>
                </div>
                <div class="page3-right fr">
                    <img src="{{ url($result['project_path']) }}" width="344" height="173"/>
                    <div class="info-details">
                        <h4 class="title mt25 mb25 fb">{{ $result['project_name'] }}</h4>
                        <p class="c-grgy mb25">项目概况</p>
                        <p class="mb25 fb f14 h120 ">{{ $result['project_exp'] }}</p>
                        <a href="/home/project/show?id={{ $result['id'] }}" class="btn-img">
                            <img src="/home/images/index/page3-btn.png" width="172" height="42"/>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="bottom-link pb60">
            <h4 class="title tc pt30"><img src="/home/images/footer/link-title.png" width="254" height="46"/></h4>
            <ul class="link-list clearfix">
                @foreach($link as $value)
                    <li><a href="{{ $value['url'] }}" target="_blank"><img src="{{ url($value['img']) }}" width="200" height="88"/></a></li>
                @endforeach
            </ul><!--./link-list-->
        </div><!--./bottom-link-->

    </div><!--./end main-->
@stop