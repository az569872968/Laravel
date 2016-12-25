$(document).ready(function(){
    $('#demo-fileInput-2').filer({
        limit: 3,
        maxSize: 3,
        extensions: ['jpg', 'jpeg', 'png'],
        changeInput: true,
        showThumbs: true
    });
    $('#demo-fileInput-1').filer({
        limit: 3,
        maxSize: 3,
        extensions: ['xlsx', 'xls'],
        changeInput: true,
        showThumbs: true
    });
});
