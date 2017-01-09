@extends('admin.layouts.base')

@section('title','后台管理系统')

@section('pageHeader','后台管理系统')

@section('pageDesc','DashBoard')

@section('content')
    <link rel="stylesheet" type="text/css" href="/plugins/upload-form/css/jquery.filer.css">
    <div class="main animsition">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">添加进度款统计</h3>
                        </div>
                        <div class="panel-body">
                            @include('admin.partials.errors')
                            @include('admin.partials.success')
                            <form class="form-horizontal" role="form" method="POST" enctype="multipart/form-data" action="/admin/homeimage/update">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="hidden" name="cove_image"/>
                                <div class="form-group">
                                    <label for="tag" class="col-md-3 control-label">图片1</label>
                                    <div class="col-md-6">
                                        <input type="file" name="image1" id="demo-fileInput-11" multiple="multiple">
                                        <span>建议尺寸500*550</span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="tag" class="col-md-3 control-label">图片2</label>
                                    <div class="col-md-6">
                                        <input type="file" name="image2" id="demo-fileInput-12" multiple="multiple">
                                        <span>155*170</span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="tag" class="col-md-3 control-label">图片3</label>
                                    <div class="col-md-6">
                                        <input type="file" name="image3" id="demo-fileInput-13" multiple="multiple">
                                        <span>155*170</span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="tag" class="col-md-3 control-label">图片4</label>
                                    <div class="col-md-6">
                                        <input type="file" name="image4" id="demo-fileInput-14" multiple="multiple">
                                        <span>155*170</span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="tag" class="col-md-3 control-label">图片5</label>
                                    <div class="col-md-6">
                                        <input type="file" name="image5" id="demo-fileInput-15" multiple="multiple">
                                        <span>325*360</span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="tag" class="col-md-3 control-label">图片6</label>
                                    <div class="col-md-6">
                                        <input type="file" name="image6" id="demo-fileInput-16" multiple="multiple">
                                        <span>325*170</span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-7 col-md-offset-3">
                                        <button type="submit" class="btn btn-primary btn-md">
                                            <i class="fa fa-plus-circle"></i>
                                            确认
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop