<?php
get_header();

$page_id = get_the_ID();
?>

<section class="detail-section top-offset">
    <div class="site-container">
        <div class="detail-section__grid-container">
            <div class="detail-section__block">
                <a href="<?php echo get_site_url() . '/news/' ?>" class="detail-section__section-name section-name">
                    Пресс-центр
                    <svg class="icon icon-arrow-long detail-section__section-name-arrow" width="45" height="8">
                        <use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprites/sprite-mono.svg#arrow-long"></use>
                    </svg>
                </a>
            </div>
            <div class="detail-section__block">
                <h1 class="detail-section__heading"><?php the_title(); ?></h1>
            </div>
        </div>
        <div class="detail-section__content">
            <div class="_block"></div>
            <div class="_block">
                <img src="<?php echo get_the_post_thumbnail_url($page_id, 'carts'); ?>" alt="<?php the_title(); ?>">
                <?php the_content(); ?>
            </div>
        </div>
    </div>
</section>

<section class="news js-parent-page-slider" data-slides-number="3">
    <div class="site-container news__container js-fade-in" data-intersection-ratio="0.1">
        <h2 class="site-second-heading news__heading">Пресс-центр</h2>
        <div class="grid-container news__container">
            <div class="news__block">
                <div class="slider-nav news__nav">
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
            <div class="news__block">
                <ul class="news__list swiper js-page-slider">
                    <div class="swiper-wrapper">
                        <?php
                        $news = carbon_get_post_meta($page_id, 'news_items');
                        $news_ids = wp_list_pluck($news, 'id');

                        $news_args = [
                            'post_type' => 'news',
                            'post__in' => $news_ids
                        ];
                        $news_query = new WP_Query($news_args);
                        ?>
                        <?php while ($news_query->have_posts()) : $news_query->the_post(); ?>
                            <?php
                            $news_id = get_the_ID();
                            ?>
                            <li class="news__item swiper-slide">
                                <div class="news-card">
                                    <div class="news-card__header">
                                        <span class="news-card__tag">12 ноя 2022</span>
                                        <img class="news-card__img" src="<?php echo get_the_post_thumbnail_url($news_id, 'carts'); ?>" alt="<?php the_title(); ?>">
                                    </div>
                                    <a class="news-card__link" href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a>
                                </div>
                            </li>
                        <?php endwhile; ?>
                    </div>
                </ul>
                <a href="<?php echo get_site_url() . '/news/' ?>" class="news__btn">Смотреть все</a>
            </div>
        </div>
    </div>
</section>


<?php echo get_template_part('contact-us-block'); ?>


<?php get_footer(); ?>