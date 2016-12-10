<link rel="stylesheet" type="text/css" href="/plugins/upload-form/css/jquery.filer.css">
<div class="form-group">
    <label for="tag" class="col-md-3 control-label">合同编号</label>
    <div class="col-md-6">
        <input type="text" class="form-control" name="numbering" id="tag" value="{{ $numbering }}" autofocus>
    </div>
</div>
<div class="form-group">
    <label for="tag" class="col-md-3 control-label">合同名称</label>
    <div class="col-md-6">
        <input type="text" class="form-control" name="name" id="tag" value="{{ $name }}" autofocus>
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
    <label for="tag" class="col-md-3 control-label">合同文件</label>
    <div class="col-md-6">
        <input type="file" name="files" id="demo-fileInput-7" multiple="multiple">
    </div>
</div>
<input type="hidden" name="project_id" value="{{ $project_id }}">
<input type="hidden" name="fid" value="{{ $fid }}">