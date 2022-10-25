<?php
get_header();

$page_id = get_the_ID();
$test;

$intro_img_id = carbon_get_post_meta($page_id, 'event_img');
$intro_img_src = wp_get_attachment_image_url($intro_img_id, 'full');
$img = get_template_directory_uri() . '/assets/images/page-intro/img3.jpg';

$error_img = carbon_get_post_meta($page_id, 'event_img') ? $intro_img_src : $img;
$link = carbon_get_post_meta($page_id, 'event_link');
?>

<section class="page-intro" style="background-image:url(<?php echo $error_img; ?>);">
    <?php if ($link) { ?>
        <div class="site-container">
            <div class="page-intro__link">
                <svg class="icon icon-arrow-top-big page-intro__link-icon" width="36" height="36">
                    <use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprites/sprite-mono.svg#arrow-top-big"></use>
                </svg>
                <div class="page-intro__link-info">
                    <a href="<?php echo $link; ?>" target="_blanc"><?php echo carbon_get_post_meta($page_id, 'event_link_name'); ?></a>
                    <span>Сайт мероприятия</span>
                </div>
            </div>
        </div>
    <?php } ?>
</section>

<section class="detail-section">
    <img class="detail-section__bg-img" src="<?php echo get_template_directory_uri(); ?>/assets/images/detail-bg.svg" alt="">
    <div class="site-container">
        <div class="detail-section__grid-container">
            <div class="detail-section__block">
                <a href="<?php echo get_site_url() . '/event/' ?>" class="detail-section__section-name section-name">
                    Мероприятия
                    <svg class="icon icon-arrow-long detail-section__section-name-arrow" width="45" height="8">
                        <use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprites/sprite-mono.svg#arrow-long"></use>
                    </svg>
                </a>
            </div>
            <div class="detail-section__block">
                <h1 class="detail-section__heading"><?php the_title(); ?></h1>
                <div class="detail-section__info">
                    <button class="button detail-section__btn" data-path="event">Записаться</button>
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
        <?php
        $gallery_imgs = carbon_get_post_meta($page_id, 'event-gallery');
        ?>
        <?php if (count($gallery_imgs) !== 0) { ?>
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
                            <?
                            foreach ($gallery_imgs as $img_id) :
                                $gallery_img_src = wp_get_attachment_image_url($img_id, 'full');
                            ?>
                                <div class="swiper-slide detail-section__content-slide">
                                    <img class="lazyload" data-src="<?php echo $gallery_img_src; ?>" src="#" alt="">
                                </div>
                            <? endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
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
                <a href="<?php echo get_site_url() . '/event/' ?>" class="events__more-btn more-events__btn">Показать еще</a>
            </div>
        </div>
    </div>
</section>

<?php echo get_template_part('contact-us-block'); ?>


<?php get_footer(); ?>