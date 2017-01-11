@extends('admin.layouts.base')

@section('title','后台管理系统')

@section('pageHeader','后台管理系统')

@section('pageDesc','DashBoard')

@section('content')

    <div class="row page-title-row" style="margin:5px;">
        <div class="col-md-6">
        </div>
        <div class="col-md-6 text-right">
            <a href="{{ URL("/admin/contract/create?project_id=$project_id&fid=$fid") }}" class="btn btn-success btn-md">
                <i class="fa fa-plus-circle"></i> 添加合同文件
            </a>
        </div>
    </div>
    <div class="row page-title-row" style="margin:5px;">
        <div class="col-md-6">
        </div>
        <div class="col-md-6 text-right">
            <form action="{{ URL("/admin/contract/index") }}" method="get">
                <input type="hidden" name="project_id" value="{{ $project_id }}">
                <input type="hidden" name="fid" value="{{ $fid }}">
                合同名称/合同编号<input type="text" name="search">
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
                            <th class="hidden-sm">合同编号</th>
                            <th class="hidden-sm">合同名称</th>
                            <th class="hidden-md">文件编号</th>
                            <th class="hidden-sm">日期</th>
                            <th class="hidden-sm">进度</th>
                            <th class="hidden-sm">文件下载</th>
                            <th data-sortable="false">操作</th>
                        </tr>
                        @foreach($list as $item=>$value)
                            <tr>
                                <th data-sortable="false" class="hidden-sm">{{$item+1}}</th>
                                <th class="hidden-sm">{{$value['numbering']}}</th>
                                <th class="hidden-sm">{{$value['name']}}</th>
                                <th class="hidden-md">{{$value['file_num']}}</th>
                                <th class="hidden-md">{{date('Y-m-d', strtotime($value['date_time']))}}</th>
                                <th class="hidden-md">{{$value['schedule']}}</th>
                                <th class="hidden-md"><a href="{{ asset($value['file_path']) }}" >下载文件</a>
                                <a href="{{ asset($value['file_annex']) }}" >下载附件</a></th>
                                <th class="hidden-md"><a href="/admin/contract/{{$value['id']}}/user">会员列表</a>  <a href="{{ URL("/admin/contract/index?project_id=$project_id&fid=".$value['id']) }}">查看下级文件</a>&nbsp;&nbsp;<a href="/admin/contract/{{$value['id']}}/edit?project_id={{ $value['project_id'] }}">编辑</a>&nbsp;&nbsp;<span style="cursor: pointer;" class="delBtn X-Small btn-xs text-danger "><li class="fa fa-times-circle-o" onclick="check_del({{$value['id']}})">删除</li></span> </th>
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
        </div>
        <div class="col-sm-7">
            <div class="dataTables_paginate paging_simple_numbers">
                <ul class="pagination">
                    {{ $list->appends(['project_id' => $project_id, 'fid'=>$fid])->render() }}
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