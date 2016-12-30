$(document).ready(function(){
    $('#demo-fileInput-2').filer({
        limit: 3,
        maxSize: 3,
        extensions: ['jpg', 'jpeg', 'png'],
        changeInput: true,
        showThumbs: true,
        files:[{name:"sdfsdf.jgp",size:6542,type:"image/jpg",file:"http://img1.gtimg.com/news/pics/hv1/70/12/2174/141367480.png"}]
    });
    $('#demo-fileInput-1').filer({
        limit: 3,
        maxSize: 3,
        extensions: ['xlsx', 'xls'],
        changeInput: true,
        showThumbs: true,
        files:[{name:"sdfsdf.jgp",size:6542,type:"image/jpg",file:"http://img1.gtimg.com/news/pics/hv1/70/12/2174/141367480.png"}]
    });
});
