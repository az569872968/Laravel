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
    <input id="file_upload" name="file_upload" type="file" multiple="true">
    <script src="/plugins/uploadify/jquery.uploadify.min.js" type="text/javascript"></script>
    <link rel="stylesheet" type="text/css" href="/plugins/uploadify/uploadify.css">
</div>
<script type="text/javascript">
    <?php $timestamp = time();?>
    $(function() {
        $('#file_upload').uploadify({
            'formData'     : {
                'timestamp' : '<?php echo $timestamp;?>',
                'token'     : '<?php echo md5('unique_salt' . $timestamp);?>'
            },
            'swf'      : '/plugins/uploadify/uploadify.swf',
            'uploader' : '/plugins/uploadify/uploadify.php'
        });
    });
</script>