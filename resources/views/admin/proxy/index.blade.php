@extends('admin.layouts.base')

@section('title','后台管理系统')

@section('pageHeader','后台管理系统')

@section('pageDesc','DashBoard')

@section('content')

    <div class="row page-title-row" style="margin:5px;">
        <div class="col-md-6">
        </div>
        <div class="col-md-6 text-right">
            <a href="/admin/project/create" class="btn btn-success btn-md">
                <i class="fa fa-plus-circle"></i> 添加工程
            </a>
        </div>
    </div>
    <div class="row page-title-row" style="margin:5px;">
        <div class="col-md-6">
            查询数量<select>
                <option>10</option>
                <option>20</option>
                <option>30</option>
            </select>
        </div>
        <div class="col-md-6 text-right">
            <form action="" method="get">
                工程名称<input type="text">
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
                            <th class="hidden-sm">拼音码</th>
                            <th class="hidden-sm">工程名称</th>
                            <th class="hidden-md">创建时间</th>
                            <th data-sortable="false">操作</th>
                        </tr>
                        @foreach($data['list'] as $item=>$value)
                            <tr>
                                <th data-sortable="false" class="hidden-sm">{{$item+1}}</th>
                                <th class="hidden-sm">{{$value['project_pinyin']}}</th>
                                <th class="hidden-sm">{{$value['project_name']}}</th>
                                <th class="hidden-md">{{$value['created_at']}}</th>
                                <th data-sortable="false">操作</th>
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
                    <li class="paginate_button previous disabled">
                        <a href="#" aria-controls="tags-table" data-dt-idx="0" tabindex="0">上页</a>
                    </li>
                    <li class="paginate_button active">
                        <a href="#" aria-controls="tags-table" data-dt-idx="1" tabindex="0">1</a>
                    </li>
                    <li class="paginate_button next disabled">
                        <a href="#" aria-controls="tags-table" data-dt-idx="2" tabindex="0">下页</a>
                    </li>
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
                    <form class="deleteForm" method="POST" action="/admin/project">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="_method" value="DELETE">
                        <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
                        <button type="submit" class="btn btn-danger">
                            <i class="fa fa-times-circle"></i>确认
                        </button>
                    </form>
                </div>
            </div>
@stop