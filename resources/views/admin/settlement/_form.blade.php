<link rel="stylesheet" type="text/css" href="/plugins/upload-form/css/jquery.filer.css">
<div class="form-group">
    <label for="tag" class="col-md-3 control-label">编号</label>
    <div class="col-md-6">
        <input type="text" class="form-control" name="member" id="tag" value="{{ $member }}" autofocus>
    </div>
</div>
<div class="form-group">
    <label for="tag" class="col-md-3 control-label">招标名称</label>
    <div class="col-md-6">
        <input type="text" class="form-control" name="tender_name" id="tag" value="{{ $tender_name }}" autofocus>
    </div>
</div>
<div class="form-group">
    <label for="tag" class="col-md-3 control-label">文件编号</label>
    <div class="col-md-6">
        <input type="text" class="form-control" name="file_num" id="tag" value="{{ $file_num }}" autofocus>
    </div>
</div>
<div class="form-group">
    <label for="tag" class="col-md-3 control-label">备注</label>
    <div class="col-md-6">
        <textarea name="remark" class="form-control" rows="3">{{ $remark }}</textarea>
    </div>
</div>
<div class="form-group">
    <label for="tag" class="col-md-3 control-label">招标文件</label>
    <div class="col-md-6">
        <input type="file" name="files" id="demo-fileInput-7" multiple="multiple">
    </div>
</div>
<input type="hidden" name="project_id" value="{{ $project_id }}">
<input type="hidden" name="fid" value="{{ $fid }}">