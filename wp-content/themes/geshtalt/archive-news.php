<?php
/*
    Template Name: Архив Новостей
*/

get_header();

$page_id = get_the_ID();

$catalog_cat_items = get_terms([
    'taxonomy' => 'news-categories',
    'parent' => 0,
]);
?>

<div class="page-preloader">
    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo-small.svg" alt="">
</div>

<section class="top-offset news-page-intro">
    <div class="site-container">
        <h1 class="news-page-intro__heading site-heading page-intro-heading">Пресс-центр</h1>
    </div>
</section>

<section class="news-page-content">
    <div class="site-container">
        <form class="filter events__filter js-filter-form">
            <input type="hidden" name="action" value="myfilter">
            <input type="hidden" name="taxonomy" value="news">

            <?php foreach ($catalog_cat_items as $item) : ?>
                <label class="filter__item">
                    <input class="visually-hidden js-filter-item" type="radio" name="filter" value="<?php echo $item->slug ?>">
                    <span class="filter__name"><?php echo $item->name ?></span>
                </label>
            <?php endforeach; ?>
        </form>
        <?php
        $news = carbon_get_post_meta($page_id, 'news_main_items');
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
            if (carbon_get_post_meta($news_id, 'news_item_main')) {
            ?>

                <div class="news-cart news-cart--big">
                    <div class="_block">
                        <img class="news-cart__img" src="<?php echo get_the_post_thumbnail_url($news_id, 'carts'); ?>" alt="<?php the_title(); ?>">
                    </div>
                    <div class="_block"><span class="news-cart__legend"><?php the_date('j M Y'); ?></span>
                        <a class="news-cart__heading" href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a>
                    </div>
                </div>
            <? break;
            } ?>

        <?php endwhile; ?>

        <div class="news-page-content__grid-container">
            <div class="_grid-block"></div>
            <div class="_grid-block">
                <ul class="news-page-content__list js-filter-list">
                    <?php if (have_posts()) : ?>

                        <?php while (have_posts()) : the_post(); ?>
                            <?php
                            $news_id2 = get_the_ID();
                            if (!carbon_get_post_meta($news_id2, 'news_item_main')) {
                            ?>
                                <li class="news-page-content__item">
                                    <?php echo get_template_part('news-card'); ?>
                                </li>
                            <? break;
                            } ?>
                        <?php endwhile; ?>

                    <?php endif; ?>
                </ul>
                <!-- <button class="news-page-content__show-more">ПОказать еще</button> -->
            </div>
        </div>
    </div>
</section>



<?php echo get_template_part('contact-us-block'); ?>


<?php get_footer(); ?>