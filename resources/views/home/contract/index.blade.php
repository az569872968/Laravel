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
                    <li class="ml25 mr25"><i class="fa fa-angle-right"></i></li>
                    <li><a href="#"><span>进度变更统计</span></a></li>
                </ul><!--./list-item-->
            </div><!--./main-module-->
        </div><!--./bread-crumbs-wrap-->

        <div class="page5-1-wrap pb50">

            <div class="main-module clearfix pt30 pb15">
                <div class="form-search-container fr clearfix">
                    <div class="search-box fl mr15 clearfix">
                        <input type="text" class="input-txt" name="" id="" value="" placeholder="名称或者编号" />
                    </div><!--./search-box-->
                    <div class="search-btn fr"><button type="button">搜索</button></div>
                </div><!--./form-search-box-->
            </div><!--./main-module-->

            <div class="main-module">
                <table class="page5-table" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                        <th width="100">
                            <span>序号</span>
                        </th>
                        <th width="100">
                            <a href="javascript:;" class="sort-btn active">
                                <span>合同编号</span>
                                <i class="fa fa-angle-down"></i>
                            </a>
                        </th>
                        <th width="195">
                            <a href="jvascript:;" class="sort-btn">
                                <span>合同名称</span>
                                <i class="fa fa-angle-down"></i>
                            </a>
                        </th>
                        <th width="140">
                            <span>文件编号</span>
                        </th>
                        <th width="110">
                            <a href="javascript:;" class="sort-btn">
                                <span>日期</span>
                                <i class="fa fa-angle-down"></i>
                            </a>
                        </th>
                        <th width="150">
                            <span>进度</span>
                        </th>
                        <th>
                            <span>文件下载</span>
                        </th>
                    </tr>
                    @foreach($list as $item=>$value)
                        <tr>
                            <td class="tc">
                                <i class="fa fa-plus-square-o ver-mid spread"></i>
                                <span class="ver-mid w60">{{ $item+1 }}</span>
                            </td>
                            <td>{{ $value['numbering'] }}</td>
                            <td>{{ $value['name'] }}</td>
                            <td>{{ $value['file_num'] }}</td>
                            <td>{{ date('Y-m-d', strtotime($value['date_time'])) }}</td>
                            <td>{{ $value['schedule'] }}</td>
                            <td>
                                <button type="button" class="down-btn" data-files="{{ asset($value['file_path']) }}"><i class="fa fa-download mr5"></i>下载</button>
                            </td>
                        </tr>
                        <tr class="lower">
                            <td colspan="8">
                                @if( !empty($value['son']) )
                                    <table border="0" cellspacing="0" cellpadding="0" class="lower-table">
                                        @foreach($value['son'] as $key=>$val)
                                            <tr>
                                                <td class="tc" width="100">
                                                    <i class="fa fa-plus-square-o ver-mid spread"></i>
                                                    <span class="ver-mid w50">{{ $item+1 }}-{{ $key+1 }}</span>
                                                </td>
                                                <td width="100">{{ $val['numbering'] }}</td>
                                                <td width="195">{{ $val['name'] }}</td>
                                                <td width="140">{{ $val['file_num'] }}</td>
                                                <td width="110">{{ date('Y-m-d', strtotime($val['date_time'])) }}</td>
                                                <td width="150">{{ $val['schedule'] }}</td>
                                                <td>
                                                    <button type="button" class="down-btn" data-files="{{ asset($value['file_path']) }}"><i class="fa fa-download mr5"></i>下载</button>
                                                </td>
                                            </tr>
                                            <tr class="lower">
                                                <td colspan="8">
                                                    @if( !empty($val['son']))
                                                        <table border="0" cellspacing="0" cellpadding="0" class="lower-table">
                                                            @foreach($val['son'] as $i=>$data)
                                                                <tr>
                                                                    <td class="tc" width="100">
                                                                        <i class="fa fa-plus-square-o ver-mid spread"></i>
                                                                        <span class="ver-mid w40">{{ $item+1 }}-{{ $key+1 }}-{{ $i+1 }}</span>
                                                                    </td>
                                                                    <td width="100">{{ $data['numbering'] }}</td>
                                                                    <td width="195">{{ $data['name'] }}</td>
                                                                    <td width="140">{{ $data['file_num'] }}</td>
                                                                    <td width="110">{{ date('Y-m-d', strtotime($data['date_time'])) }}</td>
                                                                    <td width="150">{{ $data['schedule'] }}</td>
                                                                    <td>
                                                                        <button type="button" class="down-btn" data-files="{{ asset($value['file_path']) }}"><i class="fa fa-download mr5"></i>下载</button>
                                                                    </td>
                                                                </tr>
                                                                <tr class="lower">
                                                                    <td colspan="8">
                                                                        @if( !empty($data['son']) )
                                                                            <table border="0" cellspacing="0" cellpadding="0" class="lower-table">
                                                                                @foreach($data['son'] as $ite=>$values)
                                                                                    <tr>
                                                                                        <td class="tc" width="100">
                                                                                            <i class="fa fa-plus-square-o ver-mid spread"></i>
                                                                                            <span class="ver-mid w30">{{ $item+1 }}-{{ $key+1 }}-{{ $i+1 }}-{{ $ite+1 }}</span>
                                                                                        </td>
                                                                                        <td width="100">{{ $values['numbering'] }}</td>
                                                                                        <td width="195">{{ $values['name'] }}</td>
                                                                                        <td width="140">{{ $values['file_num'] }}</td>
                                                                                        <td width="110">{{ date('Y-m-d', strtotime($values['date_time'])) }}</td>
                                                                                        <td width="150">{{ $values['schedule'] }}</td>
                                                                                        <td>
                                                                                            <button type="button" class="down-btn" data-files="{{ asset($value['file_path']) }}"><i class="fa fa-download mr5"></i>下载</button>
                                                                                        </td>
                                                                                    </tr>
                                                                                @endforeach
                                                                            </table>
                                                                        @endif
                                                                    </td>
                                                                </tr>
                                                            @endforeach
                                                        </table>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    </table>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </table><!--./page5-table-->
                <div class="paging-wrap mt50">
                    <ul class="page-list clearfix">
                        {{ $Object->appends(['project_id' => $project_id])->render() }}
                    </ul>
                </div>
            </div><!--./main-module-->

        </div><!--./page5-1-->
        <script type="text/javascript">
            $(document).on('click','.sort-btn',function(){
                if($(this).hasClass('active')){
                    $(this).removeClass('active');
                }else{
                    $(this).addClass('active');
                }
            });

            //点击展开
            $(document).on('click','.spread',function(){
                if(isSpread($(this))){
                    $(this).removeClass('active').parents('tr').next('tr.lower').removeClass('active');;
                }else{
                    $(this).addClass('active').parents('tr').next('tr.lower').addClass('active');;
                }
            });


            $(document).on('click', '.down-btn', function () {
                window.location.href=$(this).data('files');
            })

            //是否展开下级
            function isSpread(obj){
                if($(obj).hasClass('active')){
                    return true;
                }else{
                    return false;
                }
            }
        </script>
        <div class="bottom-link pb60">
            <h4 class="title tc pt30"><img src="/home/images/footer/link-title.png" width="254" height="46"/></h4>
            <ul class="link-list clearfix">
                @foreach($link as $value)
                    <li><a href="{{ $value['url'] }}" target="_blank"><img src="{{ asset($value['img']) }}" width="200" height="88"/></a></li>
                @endforeach
            </ul><!--./link-list-->
        </div><!--./bottom-link-->
    </div><!--./end main-->
@stop