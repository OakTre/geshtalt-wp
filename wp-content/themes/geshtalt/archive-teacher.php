<?php
get_header();

$page_id = get_the_ID();
$catalog_cat_items = get_terms([
    'taxonomy' => 'teacher-categories',
    'parent' => 0,
]);
?>

<div class="page-preloader">
    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo-small.svg" alt="">
</div>

<section class="page-intro" style="background-image:url(<?php echo get_template_directory_uri(); ?>/assets/images/page-intro/img4.jpg);">
    <div class="site-container">
        <div class="page-intro__link">
            <svg class="icon icon-arrow-top-big page-intro__link-icon" width="36" height="36">
                <use xlink:href="assets/images/sprites/sprite-mono.svg#arrow-top-big"></use>
            </svg>
            <div class="page-intro__link-info">
                <a href="/">intensive.rugestalt.ru</a><span>Сайт мероприятия</span>
            </div>
        </div>
    </div>
</section>

<section>
    <div class="site-container">
        <h1 class="site-heading page-intro-heading teachers__heading">Преподава<br>тели</h1>
        <form class="filter events__filter js-filter-form">
            <input type="hidden" name="action" value="myfilter">
            <input type="hidden" name="taxonomy" value="teacher">

            <?php foreach ($catalog_cat_items as $item) : ?>
                <label class="filter__item">
                    <input class="visually-hidden js-filter-item" type="radio" name="filter" value="<?php echo $item->slug ?>">
                    <span class="filter__name"><?php echo $item->name ?></span>
                </label>
            <?php endforeach; ?>
        </form>
    </div>
</section>

<section class="teachers-list">
    <div class="site-container">
        <ul class="teachers-list__container js-filter-list">
            <?php if (have_posts()) : ?>

                <?php while (have_posts()) : the_post(); ?>
                    <li class="teachers-list__item">
                        <?php echo get_template_part('teacher-card'); ?>
                    </li>
                <?php endwhile; ?>

            <?php endif; ?>
        </ul>
    </div>
</section>

<?php echo get_template_part('contact-us-block'); ?>


<?php get_footer(); ?>