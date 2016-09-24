<div class="form-group">
    <label for="tag" class="col-md-3 control-label">文章标题</label>
    <div class="col-md-6">
        <input type="text" class="form-control" name="title" id="tag" value="{{ $title }}" autofocus>
        <input type="hidden" class="form-control" name="scan_num" id="tag" value="{{ $scan_num }}" autofocus>
        <input type="hidden" class="form-control" name="user_id" id="tag" value="{{ $user_id }}" autofocus>
        <input type="hidden" class="form-control" name="sort" id="tag" value="{{ $sort }}" autofocus>
    </div>
</div>
<div class="form-group">
    <label for="tag" class="col-md-3 control-label">文章摘要</label>
    <div class="col-md-6">
        <input type="text" class="form-control" name="bewrite" id="tag" value="{{ $bewrite }}" autofocus>
    </div>
</div>
<div class="form-group">
    <label for="tag" class="col-md-3 control-label">作者</label>
    <div class="col-md-6">
        <input type="text" class="form-control" name="author" id="tag" value="{{ $author }}" autofocus>
    </div>
</div>
<div class="form-group">
    <label for="tag" class="col-md-3 control-label">文章内容</label>
    <div class="col-md-6">
        <textarea name="remark" class="form-control" rows="3">{{ $remark }}</textarea>
    </div>
</div>
@if (count($errors) > 0)
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br>
        <br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif