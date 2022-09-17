<?php
    $page_id = get_the_ID();
?>


<article class="teacher-card">
    <div class="teacher-card__img-wrapper">
        <img class="lazyload teacher-card__img" src="#" data-src="<?php echo get_the_post_thumbnail_url($page_id, 'carts'); ?>" alt="<?php the_title(); ?>">
    </div>
    <h3 class="teacher-card__name">
        <a class="teacher-card__link" href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a>
    </h3>
    <div class="teacher-card__caption"><?php the_excerpt(); ?></div>
</article>