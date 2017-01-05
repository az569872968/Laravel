<link rel="stylesheet" type="text/css" href="/plugins/upload-form/css/jquery.filer.css">
<script src="/plugins/upload-form/js/jquery.filer.min.js" type="text/javascript"></script>
<script src="/plugins/upload-form/js/prettify.js" type="text/javascript"></script>
<script src="/plugins/upload-form/js/custom.js" type="text/javascript"></script>
<script src="/plugins/control/js/zyUpload.js" type="text/javascript"></script>
@yield('js')
<div class="form-group">
    <label for="tag" class="col-md-3 control-label">编号</label>
    <div class="col-md-6">
        <input type="text" class="form-control" name="member" id="tag" value="{{ $member }}" autofocus>
    </div>
</div>
<div class="form-group">
    <label for="tag" class="col-md-3 control-label">名称</label>
    <div class="col-md-6">
        <input type="text" class="form-control" name="name" id="tag" value="{{ $name }}" autofocus>
    </div>
</div>
<div class="form-group">
    <label for="tag" class="col-md-3 control-label">文件编号</label>
    <div class="col-md-6">
        <input type="text" class="form-control" name="file_member" id="tag" value="{{ $file_member }}" autofocus>
    </div>
</div>
<div class="form-group">
    <label for="tag" class="col-md-3 control-label">日期</label>
    <div class="col-md-6">
        <input type="date" class="form-control" name="date" id="tag" value="{{ $date }}" autofocus>
    </div>
</div>
<div class="form-group">
    <label for="tag" class="col-md-3 control-label">进度</label>
    <div class="col-md-6">
        <input type="text" class="form-control" name="schedule" id="tag" value="{{ $schedule }}" autofocus>
    </div>
</div>
<div class="form-group">
    <label for="tag" class="col-md-3 control-label">备注</label>
    <div class="col-md-6">
        <textarea name="remark" class="form-control" rows="3">{{ $remark }}</textarea>
    </div>
</div>
<div class="form-group">
    <label for="tag" class="col-md-3 control-label">上传Excel</label>
    <div class="col-md-6">
        <input type="file" name="excel" id="demo-fileInput-1" multiple="multiple">
    </div>
</div>
<div class="form-group">
    <label for="tag" class="col-md-3 control-label">上传CAD</label>
    <div class="col-md-6">
        <input type="file" name="cad" id="demo-fileInput-2" multiple="multiple">
    </div>
</div>
<image height="" xlink:href="" width="" src="{{$excel}}"></image>
<input type="hidden" id="file_excel" value="{{ asset("$excel") }}">
<input type="hidden" id="file_img" value="{{ asset("$cad") }}">
<input type="hidden" name="project_id" value="{{ $project_id }}">
<input type="hidden" name="fid" value="{{ $fid }}">
