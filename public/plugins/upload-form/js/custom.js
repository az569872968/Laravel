$(document).ready(function(){
    $('#demo-fileInput-2').filer({
        limit: 3,
        maxSize: 3,
        extensions: ['jpg', 'jpeg', 'png'],
        changeInput: true,
        showThumbs: true,
        files:[{name:'图片.jpg',size:'',type:"image/jpg",file:'/uploads/imges/20170106/20170106215649861.jpg'}]
    });
    $('#demo-fileInput-1').filer({
        limit: 3,
        maxSize: 3,
        changeInput: true,
        showThumbs: true,
        files:[{name:'Excel.xlsx',size:'',type:"xlsx",file:$('#file_excel').val()}]
    });
    $('#demo-fileInput-3').filer({
        limit: 3,
        maxSize: 3,
        changeInput: true,
        showThumbs: true,
        files:[{name:'Excel.xlsx',size:'',type:"xlsx",file:$('#file_excel').val()}]
    });
});
