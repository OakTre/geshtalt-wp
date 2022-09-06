<?php
get_header();

$page_id = get_the_ID();
?>

<section class="page-intro" style="background-image:url(<?php echo get_template_directory_uri(); ?>/assets/images/page-intro/img2.jpg);"></section>
<section class="events events--page">
    <div class="site-container events__container">
        <div class="events__heading-wrapper">
            <h2 class="site-heading events__heaing">Мероприя<br>тия</h2>
            <div class="events__heading-info">
                <p>Мы постоянно проводим образовательные мероприятия, приглашаем опытных специалистов на лекции</p>
            </div>
        </div>
        <div class="filter events__filter">
            <label class="filter__item">
                <input class="visually-hidden" type="radio" name="filter" value="Актуальные"><span class="filter__name">Актуальные</span>
            </label>
            <label class="filter__item">
                <input class="visually-hidden" type="radio" name="filter" value="Прошедшие"><span class="filter__name">Прошедшие</span>
            </label>
        </div>
        <ul class="events__list">
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