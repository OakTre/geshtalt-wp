<?php
get_header();

$page_id = get_the_ID();

$intro_img_id = carbon_get_post_meta($page_id, 'event_img');
$intro_img_src = wp_get_attachment_image_url($intro_img_id, 'full');
$img = get_template_directory_uri() . '/assets/images/page-intro/img3.jpg';

$error_img = carbon_get_post_meta($page_id, 'event_img') ? $intro_img_src : $img;
?>

<section class="page-intro" style="background-image:url(<?php echo $error_img; ?>);"></section>

<section class="detail-section">
    <img class="detail-section__bg-img" src="<?php echo get_template_directory_uri(); ?>/assets/images/detail-bg.svg" alt="">
    <div class="site-container">
        <div class="detail-section__grid-container">
            <div class="detail-section__block">
                <span class="detail-section__section-name section-name">Мероприятия</span>
            </div>
            <div class="detail-section__block">
                <h1 class="detail-section__heading"><?php the_title(); ?></h1>
                <div class="detail-section__info">
                    <button class="button detail-section__btn">Записаться</button>
                    <div class="detail-section__date">
                        <span class="detail-section__date-legend">Дата проведения</span>
                        <span class="detail-section__date-num"><?php echo carbon_get_post_meta($page_id, 'event-dates'); ?></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="detail-section__content">
            <div class="_block"></div>
            <div class="_block">
                <?php the_content(); ?>
            </div>
        </div>
        <div class="detail-section__content-imgs js-parent-page-slider" data-slides-number="1" data-slides-number-mobile="1">
            <div class="_block">
                <div class="slider-nav detail-section__slider-nav">
                    <button class="slider-nav__btn js-slider-btn-prev">
                        <svg class="icon icon-shevron-left slider-nav__icon" width="7" height="14">
                            <use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprites/sprite-mono.svg#shevron-left"></use>
                        </svg>
                    </button>
                    <button class="slider-nav__btn js-slider-btn-next">
                        <svg class="icon icon-shevron-left slider-nav__icon" width="7" height="14">
                            <use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprites/sprite-mono.svg#shevron-left"></use>
                        </svg>
                    </button>
                </div>
            </div>
            <div class="_block">
                <div class="detail-section__content-slider swiper js-page-slider">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide detail-section__content-slide">
                            <img class="lazyload" data-src="<?php echo get_template_directory_uri(); ?>/assets/images/slider/img1.jpg" src="#" alt="">
                        </div>
                        <div class="swiper-slide detail-section__content-slide">
                            <img class="lazyload" data-src="<?php echo get_template_directory_uri(); ?>/assets/images/slider/img1.jpg" src="#" alt="">
                        </div>
                        <div class="swiper-slide detail-section__content-slide">
                            <img class="lazyload" data-src="<?php echo get_template_directory_uri(); ?>/assets/images/slider/img1.jpg" src="#" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="more-events">
    <div class="site-container more-events__container">
        <h2 class="more-events__heading site-second-heading">Другие события</h2>
        <ul class="events__list">
            <?php
            $events = carbon_get_post_meta($page_id, 'event_items');
            $events_ids = wp_list_pluck($events, 'id');

            $events_args = [
                'post_type' => 'event',
                'post__in' => $events_ids
            ];
            $events_query = new WP_Query($events_args);
            ?>
            <?php while ($events_query->have_posts()) : $events_query->the_post(); ?>
                <?php
                $events_id = get_the_ID();
                ?>
                <li class="events__item">
                    <?php echo get_template_part('event-cart'); ?>
                </li>
            <?php endwhile; ?>
        </ul>
        <div class="events__grid-container">
            <div class="events__block"></div>
            <div class="events__block">
                <button class="events__more-btn more-events__btn">Показать еще</button>
            </div>
        </div>
    </div>
</section>

<?php echo get_template_part('contact-us-block'); ?>


<?php get_footer(); ?>