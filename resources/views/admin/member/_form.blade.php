<div class="form-group">
    <label for="tag" class="col-md-3 control-label">用户名</label>
    <div class="col-md-6">
        <input type="text" class="form-control" name="user_name" id="tag" value="{{ $user_name }}" autofocus>
    </div>
</div>
<div class="form-group">
    <label for="tag" class="col-md-3 control-label">昵称</label>
    <div class="col-md-6">
        <input type="text" class="form-control" name="user_nickname" id="tag" value="{{ $user_nickname }}" autofocus>
    </div>
</div>
<div class="form-group">
    <label for="tag" class="col-md-3 control-label">密码</label>
    <div class="col-md-6">
        <input type="password" class="form-control" name="user_pass" id="tag" value="{{ $user_pass }}" autofocus>
    </div>
</div>
<div class="form-group">
    <label for="tag" class="col-md-3 control-label">手机</label>
    <div class="col-md-6">
        <input type="text" class="form-control" name="user_phone" id="tag" value="{{ $user_phone }}" autofocus>
    </div>
</div>
<div class="form-group">
    <label for="tag" class="col-md-3 control-label">邮箱</label>
    <div class="col-md-6">
        <input type="text" class="form-control" name="user_mail" id="tag" value="{{ $user_mail }}" autofocus>
    </div>
</div>
<div class="form-group">
    <label for="tag" class="col-md-3 control-label">会员类型</label>
    <div class="col-md-6">
        <select name="user_role" class="form-control">
            <option value="施工商" @if( $user_role == '施工商') checked="checked" @endif>施工商</option>
            <option value="承包商" @if( $user_role == '承包商') checked="checked" @endif>承包商</option>
            <option value="中间人" @if( $user_role == '中间人') checked="checked" @endif>中间人</option>
        </select>
    </div>
</div>
<div class="form-group">
    <label for="tag" class="col-md-3 control-label">简介</label>
    <div class="col-md-6">
        <textarea name="user_exp" class="form-control" rows="3">{{ $user_exp }}</textarea>
    </div>
</div>