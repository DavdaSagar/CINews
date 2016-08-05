
$(".view-artical").on('click',function(){
    var data_id = $(this).attr('data-id');
    var id = $(this).attr('data-target');    
    $.post('news/news_ajax','data_id='+data_id,function(html){
        $(''+id).find('.modal-content').html(html);
    });    
});

