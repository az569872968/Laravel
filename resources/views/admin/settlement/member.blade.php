@extends('admin.layouts.base')

@section('title','后台管理系统')

@section('pageHeader','后台管理系统')

@section('pageDesc','DashBoard')

@section('content')

    <div class="row page-title-row" style="margin:5px;">
        <div class="col-md-6">
            <a style="margin:3px;"  href="/admin/settlement/index?project_id={{$project_id}}&fid={{$fid}}"
               class="btn btn-warning btn-md animation-shake reloadBtn"><i class="fa fa-mail-reply-all"></i> 返回项目列表
            </a>
        </div>
        <div class="col-md-6 text-right">
            {{--<a href="/admin/project/user" class="btn btn-success btn-md">--}}
                {{--<i class="fa fa-plus-circle"></i> 添加会员--}}
            {{--</a>--}}
        </div>
    </div>
    <div class="row page-title-row" style="margin:5px;">
        <div class="col-md-6">
        </div>
        <div class="col-md-6 text-right">
            <form action="" method="get">
                会员账号/昵称:<input type="text" name="search" value="{{ Request::get('search') }}">
                <input type="submit" value="搜索">
            </form>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                @include('admin.partials.errors')
                @include('admin.partials.success')
                <div class="box-body">
                    <table id="tags-table" class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th data-sortable="false" class="hidden-sm"></th>
                            <th class="hidden-sm">会员账号</th>
                            <th class="hidden-sm">会员昵称</th>
                            <th class="hidden-sm">手机号码</th>
                            <th class="hidden-sm">会员类型</th>
                            <th class="hidden-md">注册时间</th>
                            <th data-sortable="false">操作</th>
                        </tr>
                        @foreach($list as $item=>$value)
                            <tr>
                                <th data-sortable="false" class="hidden-sm">{{$item+1}}</th>
                                <th class="hidden-sm">{{$value['user_name']}}</th>
                                <th class="hidden-sm">{{$value['user_nickname']}}</th>
                                <th class="hidden-sm">{{$value['user_phone']}}</th>
                                <th class="hidden-md">{{$value['user_role']}}</th>
                                <th class="hidden-md">{{$value['created_at']}}</th>
                                <th class="hidden-md">
                                @if( !in_array($value['id'], $mapuser) )
                                    <li class="fa fa-plus-circle" onclick=""><a href="/admin/settlement/{{$id}}/user_add?user_id={{$value['id']}}">添加 </a></li>
                                @endif
                                    <li class="fa fa-times-circle-o"><a href="/admin/settlement/{{$id}}/user_del?user_id={{$value['id']}}" style="color: red"> 删除</a></li>
                                </th>
                            </tr>
                        @endforeach
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-5">
            {{--<div class="dataTables_info" id="tags-table_info" role="status" aria-live="polite">显示第 1 至 2 项结果，共 2 项</div>--}}
        </div>
        <div class="col-sm-7">
            <div class="dataTables_paginate paging_simple_numbers">
                <ul class="pagination">
                    {{ $list->render() }}
                </ul>
            </div>
        </div>
    </div>
    </div>
    </div>
    <div class="modal fade" id="modal-delete" tabIndex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">
                        ×
                    </button>
                    <h4 class="modal-title">提示</h4>
                </div>
                <div class="modal-body">
                    <p class="lead">
                        <i class="fa fa-question-circle fa-lg"></i>
                        确认要删除这个工程吗?
                    </p>
                </div>
                <div class="modal-footer">
                    <form class="deleteForm" method="POST" action="/admin/contract">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="_method" value="DELETE">
                        <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
                        <button type="submit" class="btn btn-danger">
                            <i class="fa fa-times-circle"></i>确认
                        </button>
                    </form>
                </div>
            </div>
            <script type="text/javascript">
                function check_del(id) {
                    $('.deleteForm').attr('action', '/admin/contract/' + id);
                    $("#modal-delete").modal();
                    return false;
                }
            </script>
@stop