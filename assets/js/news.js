
$(".view-artical").on('click',function(){
    var slug = $(this).attr('data-slug');
    var id = $(this).attr('data-target');    
    $.post('news/news_ajax','slug='+slug,function(html){
        $(''+id).find('.modal-content').html(html);
    });    
});

