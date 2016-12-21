{{--@extends('admin.layouts.base')--}}
<link rel="stylesheet" href="/plugins/control/css/zyUpload.css">
<script src="/plugins/control/js/jquery-1.7.2.js"></script>
<script src="/plugins/control/js/zyFile.js" type="text/javascript"></script>
{{--<script src="/plugins/control/js/demo.js" type="text/javascript"></script>--}}
{{--@section('title','后台管理系统')--}}

{{--@section('pageHeader','后台管理系统')--}}

{{--@section('pageDesc','DashBoard')--}}

@section('content')
    <div id="demo" class="demo"></div>
    <script>
        $(function(){
            var html="";
            var src="control/images/";
            var img=new Array("add_img.png","delete_blue.png");
            for(var i=0;i<img.length;i++)
            {
                html += '<div id="uploadList_z'+i+'" class="upload_append_list">';
                html += '	<div class="file_bar">';
                html += '		<div style="padding:5px;">';
                html += '			<p class="file_name">'+img[i]+'</p>';
                html += '			<span class="file_del file_delz" data-index="z'+i+'" title="删除"></span>';
                html += '		</div>';
                html += '	</div>';
                html += '	<a  href="#" class="imgBox">';
                html += '	<div class="uploadImg">';
                html += '	<img id="uploadImage" class="upload_image" src="'+src+img[i]+'" />';
                html += '	</div>';
                html += '	</a>';
                html += '	<p id="uploadProgress" class="file_progress"></p>';
                html += '	<p id="uploadFailure" class="file_failure">上传失败，请重试</p>';
                html += '	<p id="uploadSuccess" class="file_success"></p>';
                html += '</div>';
            }
            $("#preview").append(html);
            $(".file_delz").click(function(){
                $(this).parents(".upload_append_list").fadeOut();
            });
            // 初始化插件
            $("#demo").zyUpload({
                width            :   "650px",                 // 宽度
                height           :   "400px",                 // 宽度
                itemWidth        :   "120px",                 // 文件项的宽度
                itemHeight       :   "100px",                 // 文件项的高度
                url              :   "/admin/homeimage/update",      // 上传文件的路径
                token            :   "{{csrf_token()}}",      // 上传文件的路径
                multiple         :   true,                    // 是否可以多个文件上传
                dragDrop         :   true,                    // 是否可以拖动上传文件
                del              :   true,                    // 是否可以删除文件
                finishDel        :   false,  				  // 是否在上传文件完成后删除预览
                /* 外部获得的回调接口 */
                onSelect: function(files, allFiles){                    // 选择文件的回调方法
                    console.info("当前选择了以下文件：");
                    console.info(files);
                    console.info("之前没上传的文件：");
                    console.info(allFiles);
                },
                onDelete: function(file, surplusFiles){                     // 删除一个文件的回调方法
                    console.info("当前删除了此文件：");
                    console.info(file);
                    console.info("当前剩余的文件：");
                    console.info(surplusFiles);
                },
                onSuccess: function(file){                    // 文件上传成功的回调方法
                    console.info("此文件上传成功：");
                    console.info(file);
                },
                onFailure: function(file){                    // 文件上传失败的回调方法
                    console.info("此文件上传失败：");
                    console.info(file);
                },
                onComplete: function(responseInfo){           // 上传完成的回调方法
                    console.info("文件上传完成");
                    console.info(responseInfo);
                }
            });
        });
    </script>
@stop
