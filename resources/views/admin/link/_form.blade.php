<link rel="stylesheet" type="text/css" href="/plugins/upload-form/css/jquery.filer.css">
<div class="form-group">
    <label for="tag" class="col-md-3 control-label">文章标题</label>
    <div class="col-md-6">
        <input type="text" class="form-control" name="title" id="tag" value="{{ $title }}" autofocus>
    </div>
</div>
<div class="form-group">
    <label for="tag" class="col-md-3 control-label">URL地址</label>
    <div class="col-md-6">
        <input type="text" class="form-control" name="url" id="tag" value="{{ $url }}" autofocus>
    </div>
</div>
<div class="form-group">
    <label for="tag" class="col-md-3 control-label">合同文件</label>
    <div class="col-md-6">
        <input type="file" name="files" id="demo-fileInput-2" multiple="multiple">
    </div>
</div>