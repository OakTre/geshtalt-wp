<?php
    $news_id = get_the_ID();
?>

<div class="news-cart">
    <div class="_block">
        <a href="<?php echo get_permalink(); ?>">
            <img class="news-cart__img lazyload" scr="#" 
            data-src="<?php echo get_the_post_thumbnail_url($news_id, 'carts'); ?>" alt="<?php the_title(); ?>">
        </a>
    </div>
    <div class="_block">
        <span class="news-cart__legend">12 ноя 2022</span>
        <a class="news-cart__heading" href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a>
    </div>
</div>