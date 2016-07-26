<?php

echo '<h2>'.$news_item['title'].'</h2>';
echo $news_item['text'];
echo '<br>'.anchor(base_url().'news','Back');

