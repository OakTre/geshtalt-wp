<?php
/*
    Template Name: Архив программ
*/

get_header();

$page_id = get_the_ID();

$catalog_cat_items = get_terms([
    'taxonomy' => 'program-categories',
    'parent' => 0,
]);
?>

<section class="page-intro" style="background-image:url(<?php echo get_template_directory_uri(); ?>/assets/images/page-intro/img1.jpg);"></section>

<section class="catalog catalog--page">
    <div class="site-container">
        <h2 class="site-heading catalog__heading">Образова<br>ние</h2>
        <p class="catalog__text">Институт современной гештальт-терапии предлагает программы базового и специализированного обучения</p>
        <div class="catalog__container grid-container">
            <div class="catalog__block"></div>
            <div class="catalog__block">
                <?php foreach ($catalog_cat_items as $item) : ?>
                    <h3 class="catalog__legend"><?php echo $item->name ?></h3>

                    <?php
                    $catSlug = $item->slug;
                    $slug_posts = array(
                        'post_type' => 'program',
                        'tax_query' => [
                            [
                                'taxonomy' => 'program-categories',
                                'field' => 'slug',
                                'terms' => $catSlug
                            ],
                        ]
                    );
                    $loop = new WP_Query($slug_posts);
                    ?>
                    <ul class="catalog__list">
                        <?php while ($loop->have_posts()) : $loop->the_post(); ?>
                            <?php
                            $programs_id = get_the_ID();
                            ?>
                            <li class="catalog__item">
                                <?php echo get_template_part('program-card'); ?>
                            </li>
                        <?php endwhile; ?>
                    </ul>
                <?php
                endforeach;
                ?>
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
                <p><?php echo carbon_get_post_meta($page_id, 'catalog_events_text'); ?></p>
                <a href="<?php echo get_site_url() . '/event/' ?>" class="button events__btn mod-transparent">Подробнее</a>
            </div>
        </div>
        <ul class="events__list">
            <?php
            $events = carbon_get_post_meta($page_id, 'catalog_event_items');
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


<?php echo get_template_part('contact-us-block'); ?>


<?php get_footer(); ?>