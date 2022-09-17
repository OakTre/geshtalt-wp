<?php
get_header();

$page_id = get_the_ID();
$intro_img_id = carbon_get_post_meta($page_id, 'event_img');
$intro_img_src = wp_get_attachment_image_url($intro_img_id, 'full');
?>

<section class="top-offset detailed-page-intro">
    <div class="site-container detailed-page-intro__container">
        <div class="_block">
            <img class="detailed-page-intro__image" src="<?php echo get_the_post_thumbnail_url($page_id, 'carts'); ?>" alt="<?php the_title(); ?>">
        </div>
        <div class="_block"></div>
        <div class="_block">
            <a class="detailed-page-intro__tag section-name" href="/">Преподаватели</a>
            <h1 class="detailed-page-intro__heading"><?php the_title(); ?></h1>
            <div class="detailed-page-intro__content">
                <?php the_content(); ?>
            </div>
        </div>
    </div>
</section>

<section class="detailed-page">
    <div class="site-container">
        <h2 class="detailed-page__heading site-second-heading">Специализации</h2>
        <div class="detailed-page__container">
            <div class="_block"></div>
            <div class="_block">
                <div class="detailed-page__list">
                    <?php echo carbon_get_post_meta($page_id, 'teacher_descr'); ?>
                </div>
            </div>
        </div>
    </div>
</section>


<?php echo get_template_part('contact-us-block'); ?>


<?php get_footer(); ?>