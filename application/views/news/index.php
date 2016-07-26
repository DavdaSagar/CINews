<a href="<?php echo site_url('news/add'); ?>" class="pull-right" >Add Breaking News</a>

<table class="table">
    <thead>
        <th width="20%">News</th>
        <th width="80%">Description</th>
    </thead>    
<?php
    foreach ($news as $news_item) {
        
        if(empty($news_item['image'])){
            $path = 'assets/images/no-image.png';
        }else{
            $path = 'uploads/'.$news_item['image'];
        }
        
        $image_properties = array(
            'src'   => $path,
            'alt'   => $news_item['title'],            
            'width' => '200',
            'height'=> '150',
            'title' => $news_item['title'],
            'class' => 'img-rounded img-responsive img-thumb'
        );
        ?>
        <tr>
            <td rowspan="2"><?php echo img($image_properties); ?></td>
            <td><h3><?php echo $news_item['title']; ?></h3></td>
        </tr>
        <tr>
            <td>
                <div class="main">
                        <?php echo character_limiter($news_item['text'],200); ?>
                </div>
                <p><a href="javascript:void(0);<?php //echo site_url('news/'.$news_item['slug']); ?>" data-toggle="modal" data-target="#news-popup" data-slug="<?php echo $news_item['slug']; ?>" class="view-artical" >View article</a></p>
            </td>
        </tr>
            
        <?php
    }
    ?>
</table>

<div id="news-popup" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
    </div>
  </div>
</div>
