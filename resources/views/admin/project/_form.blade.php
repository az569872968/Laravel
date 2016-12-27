<link rel="stylesheet" type="text/css" href="/plugins/upload-form/css/jquery.filer.css">
<div class="form-group">
    <label for="tag" class="col-md-3 control-label">拼音码</label>
    <div class="col-md-6">
        <input type="text" class="form-control" name="project_pinyin" id="tag" value="{{ $project_pinyin }}" autofocus>
    </div>
</div>
<div class="form-group">
    <label for="tag" class="col-md-3 control-label">工程名称</label>
    <div class="col-md-6">
        <input type="text" class="form-control" name="project_name" id="tag" value="{{ $project_name }}" autofocus>
    </div>
</div>
<div class="form-group">
    <label for="tag" class="col-md-3 control-label">工程地址</label>
    <div class="col-md-6">
        <input type="text" class="form-control" name="project_address" id="tag" value="{{ $project_address }}" autofocus>
    </div>
</div>
<div class="form-group">
    <label for="tag" class="col-md-3 control-label">工程开始时间</label>
    <div class="col-md-6">
        <input type="date" class="form-control" name="project_start_time" id="tag" value="{{ $project_start_time }}" autofocus>
    </div>
</div>
<div class="form-group">
    <label for="tag" class="col-md-3 control-label">工程竣工时间</label>
    <div class="col-md-6">
        <input type="date" class="form-control" name="project_end_time" id="tag" value="{{ $project_end_time }}" autofocus>
    </div>
</div>
<div class="form-group">
    <label for="tag" class="col-md-3 control-label">工程介绍</label>
    <div class="col-md-6">
        <textarea name="project_exp" class="form-control" rows="3">{{ $project_exp }}</textarea>
    </div>
</div>
<div class="form-group">
    <label for="tag" class="col-md-3 control-label">合同文件</label>
    <div class="col-md-6">
        <input type="file" name="files" id="demo-fileInput-2" multiple="multiple">
    </div>
</div>