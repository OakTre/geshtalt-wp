<?php
    $events_id = get_the_ID();
?>

<article class="event">
    <div class="event__block">
        <span class="event__legend">2022</span>
        <div class="event__date">
            <span class="event__date-start"><?php echo carbon_get_post_meta($events_id, 'event-date-start'); ?></span>
            <span class="event__date-end"><?php echo carbon_get_post_meta($events_id, 'event-date-end'); ?></span>
        </div>
    </div>
    <div class="event__block">
        <header class="event__info"><span class="event__legend"><?php echo carbon_get_post_meta($events_id, 'event-type'); ?></span>
            <a class="event__link" href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a>
            <div class="event__text-wrapper">
                <svg class="icon icon-arrow-bottom events__icon" width="24" heihgt="24">
                    <use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprites/sprite-mono.svg#arrow-bottom"></use>
                </svg>
                <div class="event__text"> <?php the_excerpt(); ?></div>
            </div>
        </header>
        <div class="event__img-wrapper">
            <button class="button mod-white event__mobile-btn" data-path="event">ЗАписаться</button>
            <a href="<?php echo get_permalink(); ?>">
                <img class="lazyload event__img" src="#" data-src="<?php echo get_the_post_thumbnail_url($events_id, 'carts'); ?>" alt="<?php the_title(); ?>">
            </a>
        </div>
    </div>
</article>