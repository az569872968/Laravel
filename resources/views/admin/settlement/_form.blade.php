<link rel="stylesheet" type="text/css" href="/plugins/upload-form/css/jquery.filer.css">
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
    <label for="tag" class="col-md-3 control-label">时间</label>
    <div class="col-md-6">
        <input type="date" class="form-control" name="date" id="tag" value="{{ $date }}" autofocus>
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
        <input type="file" name="excel" id="demo-fileInput-7" multiple="multiple">
    </div>
</div>
<div class="form-group">
    <label for="tag" class="col-md-3 control-label">上传CAD</label>
    <div class="col-md-6">
        <input type="file" name="cad" id="demo-fileInput-7" multiple="multiple">
    </div>
</div>
<input type="hidden" name="project_id" value="{{ $project_id }}">
<input type="hidden" name="fid" value="{{ $fid }}">