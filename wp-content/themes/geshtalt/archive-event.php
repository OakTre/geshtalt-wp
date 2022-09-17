<?php
get_header();

$page_id = get_the_ID();

$catalog_cat_items = get_terms([
    'taxonomy' => 'event-categories',
    'parent' => 0,
]);
?>

<div class="page-preloader">
    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo-small.svg" alt="">
</div>

<section class="page-intro" style="background-image:url(<?php echo get_template_directory_uri(); ?>/assets/images/page-intro/img2.jpg);"></section>
<section class="events events--page">
    <div class="site-container events__container">
        <div class="events__heading-wrapper">
            <h2 class="site-heading events__heaing">Мероприя<br>тия</h2>
            <div class="events__heading-info">
                <p>Мы постоянно проводим образовательные мероприятия, приглашаем опытных специалистов на лекции</p>
            </div>
        </div>
        <form class="filter events__filter js-filter-form">
            <input type="hidden" name="action" value="myfilter">
            <input type="hidden" name="taxonomy" value="event">

            <?php foreach ($catalog_cat_items as $item) : ?>
                <label class="filter__item">
                    <input class="visually-hidden js-filter-item" type="radio" name="filter" value="<?php echo $item->slug ?>">
                    <span class="filter__name"><?php echo $item->name ?></span>
                </label>
            <?php endforeach; ?>
        </form>
        <ul class="events__list js-filter-list">
            <?php if (have_posts()) : ?>

                <?php while (have_posts()) : the_post(); ?>
                    <li class="events__item">
                        <?php echo get_template_part('event-cart'); ?>
                    </li>
                <?php endwhile; ?>

            <?php endif; ?>
        </ul>
        <!-- <div class="events__grid-container">
            <div class="events__block"></div>
            <div class="events__block">
                <button class="events__more-btn">Показать еще</button>
            </div>
        </div> -->
    </div>
</section>

<?php echo get_template_part('contact-us-block'); ?>

<?php get_footer(); ?>