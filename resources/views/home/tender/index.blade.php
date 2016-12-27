@extends('home.layouts.base')

@section('title','首页')

@section('content')
<!--start main-->
<div class="main-container">

    <div class="bread-crumbs-wrap">
        <div class="main-module">
            <ul class="list-item clearfix">
                <li><a href="javascript:;"><img src="/home/images/common/home-icon.png" width="14" height="14" class="mr15" /><span>首页</span></a></li>
                <li class="ml25 mr25"><i class="fa fa-angle-right"></i></li>
                <li><a href="javascript:;"><span>项目列表</span></a></li>
                <li class="ml25 mr25"><i class="fa fa-angle-right"></i></li>
                <li><a href="javascript:;"><span>aaa住宅项目</span></a></li>
            </ul><!--./list-item-->
        </div><!--./main-module-->
    </div><!--./bread-crumbs-wrap-->

    <div class="page5-1-wrap pb50">

        <div class="main-module clearfix pt30 pb15">
            <div class="form-search-container fr clearfix">
                <div class="search-box fl mr15 clearfix">
                    <input type="text" class="input-txt" name="" id="" value="" placeholder="输入文件编号进行搜索" />
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
                            <span>招标文件名称</span>
                            <i class="fa fa-angle-down"></i>
                        </a>
                    </th>
                    <th width="140">
                        <span>招标文件编号</span>
                    </th>
                    <th width="110">
                        <a href="javascript:;" class="sort-btn">
                            <span>日期</span>
                            <i class="fa fa-angle-down"></i>
                        </a>
                    </th>
                    <th width="100">
                        <span>进度</span>
                    </th>
                    <th width="150">
                        <span>备注</span>
                    </th>
                    <th>
                        <span>文件下载</span>
                    </th>
                </tr>
                <tr>
                    <td class="tc">
                        <i class="fa fa-plus-square-o ver-mid spread"></i>
                        <span class="ver-mid w60">一</span>
                    </td>
                    <td>00001</td>
                    <td>总承包招标</td>
                    <td>2.1.1-001</td>
                    <td>2016.09.09</td>
                    <td>已完成</td>
                    <td>已发送至业主</td>
                    <td>
                        <button type="button" class="down-btn"><i class="fa fa-download mr5"></i>下载</button>
                    </td>
                </tr>
                <tr class="lower">
                    <td colspan="8">
                        <table border="0" cellspacing="0" cellpadding="0" class="lower-table">
                            <tr>
                                <td class="tc" width="100">
                                    <i class="fa fa-plus-square-o ver-mid spread"></i>
                                    <span class="ver-mid w50">1</span>
                                </td>
                                <td width="100">00001</td>
                                <td width="195">总承包招标</td>
                                <td width="140">2.1.1-001</td>
                                <td width="110">2016.09.09</td>
                                <td width="100">已完成</td>
                                <td width="150">已发送至业主</td>
                                <td>
                                    <button type="button" class="down-btn"><i class="fa fa-download mr5"></i>下载</button>
                                </td>
                            </tr>
                            <tr>
                                <td class="tc" width="100">
                                    <i class="fa fa-plus-square-o ver-mid spread"></i>
                                    <span class="ver-mid w50">2</span>
                                </td>
                                <td width="100">00001</td>
                                <td width="195">总承包招标</td>
                                <td width="140">2.1.1-001</td>
                                <td width="110">2016.09.09</td>
                                <td width="100">已完成</td>
                                <td width="150">已发送至业主</td>
                                <td>
                                    <button type="button" class="down-btn"><i class="fa fa-download mr5"></i>下载</button>
                                </td>
                            </tr>
                            <tr class="lower">
                                <td colspan="8">
                                    <table border="0" cellspacing="0" cellpadding="0" class="lower-table">
                                        <tr>
                                            <td class="tc" width="100">
                                                <i class="fa fa-plus-square-o ver-mid spread"></i>
                                                <span class="ver-mid w40">1</span>
                                            </td>
                                            <td width="100">00001</td>
                                            <td width="195">总承包招标</td>
                                            <td width="140">2.1.1-001</td>
                                            <td width="110">2016.09.09</td>
                                            <td width="100">已完成</td>
                                            <td width="150">已发送至业主</td>
                                            <td>
                                                <button type="button" class="down-btn"><i class="fa fa-download mr5"></i>下载</button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="tc" width="100">
                                                <i class="fa fa-plus-square-o ver-mid spread"></i>
                                                <span class="ver-mid w40">2</span>
                                            </td>
                                            <td width="100">00001</td>
                                            <td width="195">总承包招标</td>
                                            <td width="140">2.1.1-001</td>
                                            <td width="110">2016.09.09</td>
                                            <td width="100">已完成</td>
                                            <td width="150">已发送至业主</td>
                                            <td>
                                                <button type="button" class="down-btn"><i class="fa fa-download mr5"></i>下载</button>
                                            </td>
                                        </tr>
                                        <tr class="lower">
                                            <td colspan="8">
                                                <table border="0" cellspacing="0" cellpadding="0" class="lower-table">
                                                    <tr>
                                                        <td class="tc" width="100">
                                                            <i class="fa fa-plus-square-o ver-mid spread"></i>
                                                            <span class="ver-mid w30">1</span>
                                                        </td>
                                                        <td width="100">00001</td>
                                                        <td width="195">总承包招标</td>
                                                        <td width="140">2.1.1-001</td>
                                                        <td width="110">2016.09.09</td>
                                                        <td width="100">已完成</td>
                                                        <td width="150">已发送至业主</td>
                                                        <td>
                                                            <button type="button" class="down-btn"><i class="fa fa-download mr5"></i>下载</button>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="tc" width="100">
                                                            <i class="fa fa-plus-square-o ver-mid spread"></i>
                                                            <span class="ver-mid w30">2</span>
                                                        </td>
                                                        <td width="100">00001</td>
                                                        <td width="195">总承包招标</td>
                                                        <td width="140">2.1.1-001</td>
                                                        <td width="110">2016.09.09</td>
                                                        <td width="100">已完成</td>
                                                        <td width="150">已发送至业主</td>
                                                        <td>
                                                            <button type="button" class="down-btn"><i class="fa fa-download mr5"></i>下载</button>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td class="tc">
                        <i class="fa fa-plus-square-o ver-mid spread"></i>
                        <span class="ver-mid w60">一</span>
                    </td>
                    <td>00001</td>
                    <td>总承包招标</td>
                    <td>2.1.1-001</td>
                    <td>2016.09.09</td>
                    <td>已完成</td>
                    <td>已发送至业主</td>
                    <td>
                        <button type="button" class="down-btn"><i class="fa fa-download mr5"></i>下载</button>
                    </td>
                </tr>
                <tr class="lower">
                    <td colspan="8">
                        <table border="0" cellspacing="0" cellpadding="0" class="lower-table">
                            <tr>
                                <td class="tc" width="100">
                                    <i class="fa fa-plus-square-o ver-mid spread"></i>
                                    <span class="ver-mid w50">1</span>
                                </td>
                                <td width="100">00001</td>
                                <td width="195">总承包招标</td>
                                <td width="140">2.1.1-001</td>
                                <td width="110">2016.09.09</td>
                                <td width="100">已完成</td>
                                <td width="150">已发送至业主</td>
                                <td>
                                    <button type="button" class="down-btn"><i class="fa fa-download mr5"></i>下载</button>
                                </td>
                            </tr>
                            <tr>
                                <td class="tc" width="100">
                                    <i class="fa fa-plus-square-o ver-mid spread"></i>
                                    <span class="ver-mid w50">2</span>
                                </td>
                                <td width="100">00001</td>
                                <td width="195">总承包招标</td>
                                <td width="140">2.1.1-001</td>
                                <td width="110">2016.09.09</td>
                                <td width="100">已完成</td>
                                <td width="150">已发送至业主</td>
                                <td>
                                    <button type="button" class="down-btn"><i class="fa fa-download mr5"></i>下载</button>
                                </td>
                            </tr>
                            <tr class="lower">
                                <td colspan="8">
                                    <table border="0" cellspacing="0" cellpadding="0" class="lower-table">
                                        <tr>
                                            <td class="tc" width="100">
                                                <i class="fa fa-plus-square-o ver-mid spread"></i>
                                                <span class="ver-mid w40">1</span>
                                            </td>
                                            <td width="100">00001</td>
                                            <td width="195">总承包招标</td>
                                            <td width="140">2.1.1-001</td>
                                            <td width="110">2016.09.09</td>
                                            <td width="100">已完成</td>
                                            <td width="150">已发送至业主</td>
                                            <td>
                                                <button type="button" class="down-btn"><i class="fa fa-download mr5"></i>下载</button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="tc" width="100">
                                                <i class="fa fa-plus-square-o ver-mid spread"></i>
                                                <span class="ver-mid w40">2</span>
                                            </td>
                                            <td width="100">00001</td>
                                            <td width="195">总承包招标</td>
                                            <td width="140">2.1.1-001</td>
                                            <td width="110">2016.09.09</td>
                                            <td width="100">已完成</td>
                                            <td width="150">已发送至业主</td>
                                            <td>
                                                <button type="button" class="down-btn"><i class="fa fa-download mr5"></i>下载</button>
                                            </td>
                                        </tr>
                                        <tr class="lower">
                                            <td colspan="8">
                                                <table border="0" cellspacing="0" cellpadding="0" class="lower-table">
                                                    <tr>
                                                        <td class="tc" width="100">
                                                            <i class="fa fa-plus-square-o ver-mid spread"></i>
                                                            <span class="ver-mid w30">1</span>
                                                        </td>
                                                        <td width="100">00001</td>
                                                        <td width="195">总承包招标</td>
                                                        <td width="140">2.1.1-001</td>
                                                        <td width="110">2016.09.09</td>
                                                        <td width="100">已完成</td>
                                                        <td width="150">已发送至业主</td>
                                                        <td>
                                                            <button type="button" class="down-btn"><i class="fa fa-download mr5"></i>下载</button>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="tc" width="100">
                                                            <i class="fa fa-plus-square-o ver-mid spread"></i>
                                                            <span class="ver-mid w30">2</span>
                                                        </td>
                                                        <td width="100">00001</td>
                                                        <td width="195">总承包招标</td>
                                                        <td width="140">2.1.1-001</td>
                                                        <td width="110">2016.09.09</td>
                                                        <td width="100">已完成</td>
                                                        <td width="150">已发送至业主</td>
                                                        <td>
                                                            <button type="button" class="down-btn"><i class="fa fa-download mr5"></i>下载</button>
                                                        </td>
                                                    </tr>
                                                </table><!--./lower-table-->
                                            </td>
                                        </tr><!--./lower-->
                                    </table><!--./lower-table-->
                                </td>
                            </tr><!--./lower-->
                        </table><!--./lower-table-->
                    </td>
                </tr><!--./lower-->
            </table><!--./page5-table-->
            <div class="paging-wrap mt50">上一页.1.2.3.4.5.6.7.下一页</div>
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
@stop