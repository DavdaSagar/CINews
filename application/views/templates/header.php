<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width">
        <title><?php echo $title; ?></title>
        <?php echo link_tag("assets/css/bootstrap.min.css"); ?>
        <?php echo link_tag("assets/css/news.css"); ?>
        <?php $logo_attribures = array(
            'src'   => 'assets/images/logo.png',
            'alt'   => 'logo',            
            'width' => '200',
            'height'=> '75',
            'title' => 'Home',
            'class' => 'img-rounded img-responsive'
            ); ?>
    </head>

    <body>        
        <div class="container">
            <h1><?php echo anchor(site_url(),img($logo_attribures)); ?></h1>