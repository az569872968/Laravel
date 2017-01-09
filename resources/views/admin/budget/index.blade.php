@extends('admin.layouts.base')

@section('title','后台管理系统')

@section('css')
    <link rel="stylesheet" href="/excel/css/handsontable.full.css">
@endsection

@section('js')
    <!--<script language="JavaScript" src="/excel/jquery-1.10.2.js"></script>-->
    <script language="JavaScript" src="/excel/handsontable.full.js"></script>
    <script language="JavaScript" src="/excel/lodash.js"></script>
    <script language="JavaScript" src="/excel/underscore.string.js"></script>
    <script language="JavaScript" src="/excel/moment.js"></script>
    <script language="JavaScript" src="/excel/numeral.js"></script>
    <script language="JavaScript" src="/excel/numeric.js"></script>
    <script language="JavaScript" src="/excel/md5.js"></script>
    <script language="JavaScript" src="/excel/jstat.js"></script>
    <script language="JavaScript" src="/excel/formula.js"></script>
    <script language="JavaScript" src="/excel/parser.js"></script>
    <script language="JavaScript" src="/excel/ruleJS.js"></script>
    <script language="JavaScript" src="/excel/handsontable.formula.js"></script>

    <script type="text/javascript">
        var sheets = [];
        function delSheet(){
            var sheet = null;
            var tmpSheets = [];
            var key = parseInt( $("#excel_tab li.active a").attr("key") ) ;
            var reset = function(){
                sheets = tmpSheets;
                $("#excel_tab li.active").remove();
                $("#sheet_"+ key).remove();
                $("#excel_tab li a").each(function(i,el){
                    $(this).attr("key" , i + 1);
                    $(this).attr("href" , "#sheet_" + (i + 1));
                    $(this).text("sheet_" + (i + 1) );
                });

                $(".tab-pane").each(function(i,el){
                    $(this).attr("id" , "sheet_" + (i + 1));
                });
                $('#excel_tab a:last').tab('show');
            }
            console.log( key );
            for(var i = 0 ; i < sheets.length ;i++){
                if(i == key - 1){
                    sheet = sheets[i];
                }else{
                    tmpSheets.push( sheets[i] );
                }
            }
            if( null != sheet){
                if( sheet.getId() > 0 ){
                    $.ajax({
                        type: "POST",
                        url: "{{ url('admin/budget/delete')}}",
                        dataType: 'json',
                        cache: false,
                        data: {id : sheet.getId() }
                    })
                        .done(function (data) {
                            reset();
                            /*
                             $(".alert-success").prop("hidden", false);
                             */
                        })
                        .fail(function (data) {
                            $.each(data.responseJSON, function (key, value) {
                                /*
                                 var input = '#formArticle input[name=' + key + ']';
                                 $(input + '+span>strong').text(value);
                                 $(input).parent().parent().addClass('has-error');
                                 */
                            });
                        });
                }else{
                    reset();
                }
            }
        }
        function getSheetData(){
            var sheetData = [];
            for(var i = 0 ; i < sheets.length ;i++){
                sheetData.push( sheets[i].getAll() );
            }
            $.ajax({
                type: "POST",
                url: "{{ url('admin/budget/save?project_id=') }}{{$project_id}}",
                dataType: 'json',
                processData: false,
                contentType: "application/json",
                cache: false,
                data: JSON.stringify(sheetData)
            })
                .done(function (data) {
                    /*
                     $(".alert-success").prop("hidden", false);
                     */
//                window.location.reload(true);
                })
                .fail(function (data) {
                    $.each(data.responseJSON, function (key, value) {
                        /*
                         var input = '#formArticle input[name=' + key + ']';
                         $(input + '+span>strong').text(value);
                         $(input).parent().parent().addClass('has-error');
                         */
                    });
                });
        }
        function addSheet(config){
            var i = $("#excel_tab li").size() + 1
            var height = $("#excel_content").height();
            $("#excel_tab").append( '<li><a href="#sheet_'+ i +'" data-toggle="tab" key="'+ i +'">sheet_'+ i +'</a></li>' );
            $("#excel_content").append('<div id="sheet_'+ i +'" class="tab-pane" style="overflow: hidden;"></div>');
            $('#excel_tab a:last').tab('show');
            var sheet = new Sheet(config ,{},document.getElementById("sheet_"+ i) ,height);
            sheets.push( sheet );
        }
        var Sheet = (function(config ,cfg ,el ,height){
            'use strict';
            var availableWidth;
            var availableHeight;
            var id = config.id;
            var actionRenderer = function (instance, td, row, col, prop, value, cellProperties) {
                Handsontable.renderers.TextRenderer.apply(this, arguments);
                td.style.verticalAlign = 'middle';
//
//                var v = instance.getDataAtCell(row, col);
//                if(undefined != v.value){
//                    $(td).empty().append(v.value);
//                    /*
//                    var $button = $('<button class="button">');
//                    $button.html( value.value );
//                    $(td).empty().append($button); //empty is needed because you are rendering to an existing cell
//                    */
//                }
            };
            var calculateSize = function() {
                var offset = Handsontable.Dom.offset(el);
                availableWidth = Handsontable.Dom.innerWidth(document.body) - offset.left + window.scrollX;
                availableHeight = Handsontable.Dom.innerHeight(document.body) - offset.top + window.scrollY;
                if(availableHeight > height){
                    availableHeight = height;
                }
                el.style.width = availableWidth + 'px';
                el.style.height = availableHeight + 'px';
            }
            var sheet_config = {
                data: config.rows,
                minSpareRows: 0,
                colHeaders: true,
                rowHeaders: true,
                contextMenu: true,
                manualColumnResize: true,
                formulas: true,
                mergeCells: config.mergeCells,
                fixedColumnsLeft: 1,
                manualColumnFreeze: true,
                columns : config.columns,
                cell: config.cell,
                cells: function(row, col, prop) {
                    var cellProperties = {};
                    switch(col){
                        case 0:
//                            cellProperties.renderer = actionRenderer
                            cellProperties.readOnly = true;
                            cellProperties.className = "htCenter";
                            break;
                    }
                    return cellProperties;
                },
                beforeOnCellMouseDown: function(event, coords, TD){
                    var data = this.getSourceDataAtRow(coords.row );
                    switch(coords.col){
                        case 0:
                            event.stopImmediatePropagation();
                            //提交数据
                            var id = data[0];
                            alert( id );
                            break;
                    }
                },/*
                afterOnCellMouseDown : function(event, coords, TD){
                    switch(coords.col){
                        case 0:
                            event.stopImmediatePropagation();
                            break;
                    }
                },*/
                afterRender:function(){
                    calculateSize();
                }
            };
            var      sheet = new Handsontable(el ,sheet_config);
            Handsontable.Dom.addEvent(window, 'resize', calculateSize);

            this.getId = function(){
                return id;
            }
            this.getAll = function(){
                var saveObject = {
                    id:id,
                    cell:[],//有其他属性的Cell
                    formulae:[],//对应的公式
                    mergeCells:[],//合并的Cell
                    rows : sheet.getData()
                };
                for(var i = 0 ; i < sheet.mergeCells.mergedCellInfoCollection.length ; i++){
                    saveObject.mergeCells.push( sheet.mergeCells.mergedCellInfoCollection[i] );
                }

                for(var i = 0 ; i < saveObject.rows.length;i++){
                    var row = saveObject.rows[i];
                    for(var j = 0 ; j < row.length; j ++){
                        var cell = sheet.getCell(i ,j);
                        var text = $(cell).text();
                        var cellMeta = sheet.getCellMeta(i ,j);
                        var settingCell = {};
                        var settingCount = 0;
                        for(var key in cellMeta){
                            if( !cellMeta.hasOwnProperty(key) ){
                                continue;
                            }
                            if(key != "instance" && key !="prop"){
                                settingCell[key] = cellMeta[key];
                                settingCount++;
                            }
                        }
                        if(settingCount > 2){
                            saveObject.cell.push(settingCell);
                        }
                        if(null == row[j]) continue;

                        if(row[j] == text) continue;
                        //判断text和row[j]的值是否相等，如果不相等那么说明是有公式的
                        saveObject.formulae.push({row:i,col:j,formulae:row[j],value:text});
                    }
                }
                console.log( saveObject );
                return saveObject;
            }
            return this;
        });

        $(document).ready(function () {
            $.ajaxSetup({
                headers: { 'X-CSRF-TOKEN' : '{{ csrf_token() }}' }
            });
            $("#button_add").bind("click",function(e){
                loadData(0);
            });

            function loadData(project_id) {
                $.ajax({
                    type: "GET",
                    url: "{{ url('admin/budget') }}",
                    dataType: 'json',
                    cache: false,
                    data:{id:project_id}
                })
                    .done(function (configs) {
                        for(var i = 0 ; i < configs.length ;i++){
                            addSheet(configs[i]);
                        }
                    })
                    .fail(function (data) {
                        $.each(data.responseJSON, function (key, value) {
                            /*
                             var input = '#formArticle input[name=' + key + ']';
                             $(input + '+span>strong').text(value);
                             $(input).parent().parent().addClass('has-error');
                             */
                        });
                    });
            }

            loadData({{$project_id}});

        });
    </script>

@endsection

@section('pageHeader','后台管理系统')

@section('pageDesc','DashBoard')

@section('content')
    <div style="padding: 5px;">
        <button id="button_add" class="btn btn-default">新增</button>
        <button onclick="getSheetData();" class="btn btn-default" style="margin-left: 5px">保存</button>
        <button onclick="delSheet();" class="btn btn-default" style="margin-left: 5px">删除当前选中Sheet</button>
    </div>
    <div class="tabbable excel">
        <ul id="excel_tab" class="nav nav-tabs"></ul>
        <div id="excel_content" class="tab-content" style="height: 200px">

        </div>
    </div>
@endsection

