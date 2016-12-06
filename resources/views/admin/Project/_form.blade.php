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
    <label for="tag" class="col-md-3 control-label">工程介绍</label>
    <div class="col-md-6">
        <input type="text" class="form-control" name="project_exp" id="tag" value="{{ $project_exp }}" autofocus>
    </div>
</div>
<div class="form-group">
    <label for="tag" class="col-md-3 control-label">工程开始时间</label>
    <div class="col-md-6">
        <input type="text" class="form-control" name="project_start_time" id="tag" value="{{ $project_start_time }}" autofocus>
    </div>
</div>
<div class="form-group">
    <label for="tag" class="col-md-3 control-label">工程竣工时间</label>
    <div class="col-md-6">
        <input type="text" class="form-control" name="project_end_time" id="tag" value="{{ $project_end_time }}" autofocus>
    </div>
</div>
<div class="form-group">
    <label for="tag" class="col-md-3 control-label">工程小图</label>
    <div class="col-md-6">
         <input type="file" name="files[]" id="demo-fileInput-7" multiple="multiple">
    </div>
</div>
<script type="text/javascript">
    $('#filer_input').filer({
        limit: 3,
        maxSize: 5,
        extensions: ['jpg', 'jpeg', 'png', 'gif', 'xlsx'],
        changeInput: true,
        showThumbs: true
    });
</script>