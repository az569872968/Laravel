<link rel="stylesheet" type="text/css" href="/plugins/upload-form/css/jquery.filer.css">
<div class="form-group">
    <label for="tag" class="col-md-3 control-label">视频标题</label>
    <div class="col-md-6">
        <input type="text" class="form-control" name="title" id="tag" value="{{ $title }}" autofocus>
    </div>
</div>
<div class="form-group">
    <label for="tag" class="col-md-3 control-label">视频地址</label>
    <div class="col-md-6">
        <input type="text" class="form-control" name="video" id="tag" value="{{ $video }}" autofocus>
    </div>
</div>
<div class="form-group">
    <label for="tag" class="col-md-3 control-label">图片</label>
    <div class="col-md-6">
        <input type="file" name="files" id="demo-fileInput-1" multiple="multiple">
    </div>
</div>