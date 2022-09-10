<?php
/*
    Template Name: Главная
*/

get_header();

$page_id = get_the_ID();

$intro_img_id = carbon_get_post_meta($page_id, 'intro_img');
$intro_img_src = wp_get_attachment_image_url($intro_img_id, 'full');

$intro_logo_id = carbon_get_post_meta($page_id, 'intro_logo');
$intro_logo_src = wp_get_attachment_image_url($intro_logo_id, 'full');
?>


<section class="intro" style="background-image:url(<?php echo $intro_img_src; ?>">
    <div class="site-container intro__container">
        <div class="grid-container">
            <div class="intro__heading-block">
                <img class="intro__logo" src="<?php echo $intro_logo_src; ?>" alt="Логотип компании">
            </div>
            <div class="intro__heading-block">
                <h1 class="visually-hidden"><?php echo carbon_get_post_meta($page_id, 'intro_heading'); ?></h1>
                <div class="intro__heading"><?php echo carbon_get_post_meta($page_id, 'intro_heading'); ?></div>
                <div class="intro__heading-text">
                    <div class="intro__company-logo">
                        <img class="intro__company-logo-wrapper" src="<?php echo get_template_directory_uri(); ?>/assets/images/geshtalt-logo-wrapper.svg" alt="">
                        <img class="intro__company-logo-inner" src="<?php echo get_template_directory_uri(); ?>/assets/images/geshtalt-logo.svg" alt="">
                    </div>
                    <p><?php echo carbon_get_post_meta($page_id, 'intro_text'); ?></p>
                </div>
            </div>
        </div>
        <div class="grid-container intro__bottom">
            <div class="intro__bottom-block">
                <ul class="intro__cat">
                    <!-- <li class="intro__cat-item _big">
                        <a class="intro__cat-link _big" href="">Образование</a>
                    </li> -->
                    <li class="intro__cat-item _big">
                        <a class="intro__cat-link _big" href="<?php echo get_site_url() . '/event/' ?>">Мероприятия</a>
                    </li>
                </ul>
                <ul class="intro__cat">
                    <!-- <li class="intro__cat-item">
                        <a class="intro__cat-link" href="/">Список литературы</a>
                    </li>
                    <li class="intro__cat-item">
                        <a class="intro__cat-link" href="/">Об институте</a>
                    </li>
                    <li class="intro__cat-item">
                        <a class="intro__cat-link" href="/">Преподаватели</a>
                    </li>
                    <li class="intro__cat-item">
                        <a class="intro__cat-link" href="/">Пресс-центр</a>
                    </li> -->
                    <li class="intro__cat-item">
                        <a class="intro__cat-link" href="/">Контакты</a>
                    </li>
                </ul>
            </div>
            <div class="intro__bottom-block">
                <div class="intro__slider js-parent-page-slider" data-slides-number="1" data-slides-number-mobile="1">
                    <div class="intro__slider-nav-container"><span class="intro__slider-legend">Мероприятие</span>
                        <div class="intro__slider-nav">
                            <button class="intro__slider-btn js-slider-btn-prev">
                                <svg class="icon icon-shevron-left intro__slider-btn-icon" width="7" height="14">
                                    <use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprites/sprite-mono.svg#shevron-left"></use>
                                </svg>
                            </button>
                            <button class="intro__slider-btn js-slider-btn-next">
                                <svg class="icon icon-shevron-left intro__slider-btn-icon" width="7" height="14">
                                    <use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprites/sprite-mono.svg#shevron-left"></use>
                                </svg>
                            </button>
                        </div>
                    </div>
                    <div class="intro__news swiper js-page-slider">
                        <div class="swiper-wrapper">
                            <?php
                            $intro_events = carbon_get_post_meta($page_id, 'intro_event_items');
                            $intro_events_ids = wp_list_pluck($intro_events, 'id');

                            $intro_events_args = [
                                'post_type' => 'event',
                                'post__in' => $intro_events_ids
                            ];
                            $intro_events_query = new WP_Query($intro_events_args);
                            ?>
                            <?php while ($intro_events_query->have_posts()) : $intro_events_query->the_post(); ?>
                                <?php
                                $intro_events_id = get_the_ID();
                                ?>
                                <div class="intro__news-item swiper-slide">
                                    <div class="intro__news-date">
                                        <div class="intro__news-month"><?php echo carbon_get_post_meta($intro_events_id, 'event-date-start'); ?></div>
                                        <div class="intro__news-year">2022</div>
                                    </div>
                                    <div class="intro__news-heading"><?php the_title(); ?></div>
                                    <div class="intro__news-text"><?php the_excerpt(); ?></div>
                                    <div class="intro__news-btns">
                                        <button class="button intro__news-btn mod-white" data-path="event">ЗАписаться</button>
                                        <a href="<?php echo get_permalink(); ?>" class="button intro__news-btn mod-transparent">Подробнее</a>
                                    </div>
                                </div>
                            <?php endwhile; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<?php
$about_logo_id = carbon_get_post_meta($page_id, 'about_img');
$about_logo_src = wp_get_attachment_image_url($about_logo_id, 'full');
?>
<section class="about">
    <img class="about__bg-top" src="<?php echo get_template_directory_uri(); ?>/assets/images/about-top-bg.svg" alt="">
    <div class="site-container">
        <div class="grid-container">
            <div class="about__block"><span class="section-name">При поддержке</span>
                <img class="about__section-image" src="<?php echo get_template_directory_uri(); ?>/assets/images/somatic.svg" alt="Center for Somatic Studies">
            </div>
            <div class="about__block">
                <h2 class="visually-hidden">О нас</h2>
                <div class="about__mobile-text-wrapper">
                    <div class="about__mobile-logo">
                        <img class="about__mobile-logo-wrapper" src="<?php echo get_template_directory_uri(); ?>/assets/images/geshtalt-logo-wrapper-black.svg" alt="">
                        <img class="about__mobile-logo-inner" src="<?php echo get_template_directory_uri(); ?>/assets/images/geshtalt-logo-black.svg" alt="">
                    </div>
                    <p class="about__mobile-text"><?php echo carbon_get_post_meta($page_id, 'intro_text'); ?></p>
                </div>
                <div class="about__content-img-wrapper _mobile" style="background-image:url(<?php echo get_template_directory_uri(); ?>/assets/images/about-img.jpg);"></div>
                <p class="about__heading"><?php echo carbon_get_post_meta($page_id, 'about_heading'); ?></p>
                <div class="about__content">
                    <div class="about__content-block">
                        <p><?php echo carbon_get_post_meta($page_id, 'about_text'); ?></p>
                        <!-- <a href="/" class="button about__btn mod-transparent mod-black">Подробнее об институте</a> -->
                    </div>
                    <div class="about__content-block">
                        <div class="about__content-img-wrapper" style="background-image:url(<?php echo $about_logo_src; ?>);"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="catalog">
    <div class="site-container">
        <h2 class="site-heading catalog__heading js-fade-in"><?php echo carbon_get_post_meta($page_id, 'index_catalog_heading'); ?></h2>
        <div class="catalog__container grid-container">
            <div class="catalog__block">
                <a href="/">
                    <svg class="icon icon-arrow-bottom catalog__icon" width="24" heihgt="24">
                        <use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprites/sprite-mono.svg#arrow-bottom"></use>
                    </svg>
                </a><span class="catalog__section-name"><?php echo carbon_get_post_meta($page_id, 'index_catalog_text'); ?></span>
                <!-- <a href="/" class="button catalog__btn mod-transparent mod-black">Подробнее</a> -->
            </div>
            <div class="catalog__block">
                <h3 class="catalog__legend"><span>Подготовительные курсы</span>
                </h3>
                <ul class="catalog__list js-fade-in" data-intersection-ratio="0.5">
                    <?php
                    $programs = carbon_get_post_meta($page_id, 'index_program_items1');
                    $programs_ids = wp_list_pluck($programs, 'id');

                    $programs_args = [
                        'post_type' => 'program',
                        'post__in' => $programs_ids,
                        'orderby' => 'text_field',
                        'order' => 'asc',
                        'meta_query' => array(
                            'text_field' => array(
                                'key' => 'program_caption',
                                'compare' => 'EXISTS',
                            ),
                        ),
                    ];
                    $programs_query = new WP_Query($programs_args);
                    ?>
                    <?php while ($programs_query->have_posts()) : $programs_query->the_post(); ?>
                        <?php
                        $programs_id = get_the_ID();
                        ?>
                        <li class="catalog__item">
                            <?php echo get_template_part('program-card'); ?>
                        </li>
                    <?php endwhile; ?>
                </ul>
                <h3 class="catalog__legend"><span>Основные направления</span>
                </h3>
                <ul class="catalog__list js-fade-in" data-intersection-ratio="0.5">
                    <?php
                    $programs1 = carbon_get_post_meta($page_id, 'index_program_items2');
                    $programs1_ids = wp_list_pluck($programs1, 'id');

                    $programs1_args = [
                        'post_type' => 'program',
                        'post__in' => $programs1_ids,
                        'orderby' => 'text_field',
                        'order' => 'asc',
                        'meta_query' => array(
                            'text_field' => array(
                                'key' => 'program_caption',
                                'compare' => 'EXISTS',
                            ),
                        ),
                    ];
                    $programs1_query = new WP_Query($programs1_args);
                    ?>
                    <?php while ($programs1_query->have_posts()) : $programs1_query->the_post(); ?>
                        <?php
                        $programs1_id = get_the_ID();
                        ?>
                        <li class="catalog__item">
                            <?php echo get_template_part('program-card'); ?>
                        </li>
                    <?php endwhile; ?>
                </ul>
                <h3 class="catalog__legend"><span>Специализации</span>
                </h3>
                <ul class="catalog__list js-fade-in" data-intersection-ratio="0.1">
                    <?php
                    $programs2 = carbon_get_post_meta($page_id, 'index_program_items3');
                    $programs2_ids = wp_list_pluck($programs2, 'id');

                    $programs2_args = [
                        'post_type' => 'program',
                        'post__in' => $programs2_ids,
                        'orderby' => 'text_field',
                        'order' => 'asc',
                        'meta_query' => array(
                            'text_field' => array(
                                'key' => 'program_caption',
                                'compare' => 'EXISTS',
                            ),
                        ),
                    ];
                    $programs2_query = new WP_Query($programs2_args);
                    ?>
                    <?php while ($programs2_query->have_posts()) : $programs2_query->the_post(); ?>
                        <?php
                        $programs2_id = get_the_ID();
                        ?>
                        <li class="catalog__item">
                            <?php echo get_template_part('program-card'); ?>
                        </li>
                    <?php endwhile; ?>
                </ul>
            </div>
        </div>
    </div>
</section>

<section class="events">
    <img class="events__bg-img" src="<?php echo get_template_directory_uri(); ?>/assets/images/events/bg.svg" alt="">
    <div class="site-container events__container">
        <div class="events__heading-wrapper js-fade-in">
            <h2 class="site-heading events__heaing">Мероприя<br>тия</h2>
            <div class="events__heading-info">
                <a href="/">
                    <svg class="icon icon-arrow-bottom events__icon" width="24" heihgt="24">
                        <use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprites/sprite-mono.svg#arrow-bottom"></use>
                    </svg>
                </a>
                <p><?php echo carbon_get_post_meta($page_id, 'index_events_text'); ?></p>
                <a href="/" class="button events__btn mod-transparent">Подробнее</a>
            </div>
        </div>
        <ul class="events__list">
            <?php
            $events = carbon_get_post_meta($page_id, 'index_event_items');
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
                <a class="events__more-btn" href="<?php echo get_site_url() . '/event/' ?>">Смотреть все</a>
            </div>
        </div>
    </div>
</section>

<!-- <section class="news js-parent-page-slider" data-slides-number="3">
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
                        <li class="news__item swiper-slide">
                            <div class="news-card">
                                <div class="news-card__header"><span class="news-card__tag">12 ноя 2022</span>
                                    <img class="news-card__img" src="<?php echo get_template_directory_uri(); ?>/assets/images/news-card.jpg" alt="«Как психолог помогает мне пережить происходящее вокруг?»">
                                </div>
                                <a class="news-card__link" href="/">«Как психолог помогает мне пережить происходящее вокруг?»</a>
                            </div>
                        </li>
                        <li class="news__item swiper-slide">
                            <div class="news-card">
                                <div class="news-card__header"><span class="news-card__tag">12 ноя 2022</span>
                                    <img class="news-card__img" src="<?php echo get_template_directory_uri(); ?>/assets/images/news-card.jpg" alt="«Как психолог помогает мне пережить происходящее вокруг?»">
                                </div>
                                <a class="news-card__link" href="/">«Как психолог помогает мне пережить происходящее вокруг?»</a>
                            </div>
                        </li>
                        <li class="news__item swiper-slide">
                            <div class="news-card">
                                <div class="news-card__header"><span class="news-card__tag">12 ноя 2022</span>
                                    <img class="news-card__img" src="<?php echo get_template_directory_uri(); ?>/assets/images/news-card.jpg" alt="«Как психолог помогает мне пережить происходящее вокруг?»">
                                </div>
                                <a class="news-card__link" href="/">«Как психолог помогает мне пережить происходящее вокруг?»</a>
                            </div>
                        </li>
                        <li class="news__item swiper-slide">
                            <div class="news-card">
                                <div class="news-card__header"><span class="news-card__tag">12 ноя 2022</span>
                                    <img class="news-card__img" src="<?php echo get_template_directory_uri(); ?>/assets/images/news-card.jpg" alt="«Как психолог помогает мне пережить происходящее вокруг?»">
                                </div>
                                <a class="news-card__link" href="/">«Как психолог помогает мне пережить происходящее вокруг?»</a>
                            </div>
                        </li>
                        <li class="news__item swiper-slide">
                            <div class="news-card">
                                <div class="news-card__header"><span class="news-card__tag">12 ноя 2022</span>
                                    <img class="news-card__img" src="<?php echo get_template_directory_uri(); ?>/assets/images/news-card.jpg" alt="«Как психолог помогает мне пережить происходящее вокруг?»">
                                </div>
                                <a class="news-card__link" href="/">«Как психолог помогает мне пережить происходящее вокруг?»</a>
                            </div>
                        </li>
                    </div>
                </ul>
                <button class="news__btn">Смотреть все</button>
            </div>
        </div>
    </div>
</section> -->

<?php echo get_template_part('contact-us-block'); ?>

<?php get_footer(); ?>