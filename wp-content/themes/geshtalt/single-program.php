<?php
get_header();

$page_id = get_the_ID();
?>

<section class="top-offset detailed-page-intro detailed-page-intro--education">
    <div class="site-container">
        <div class="detailed-page-intro__container">
            <div class="_block">
                <a class="detailed-page-intro__tag section-name" href="<?php echo get_site_url() . '/programmy/' ?>">Образование</a>
                <img class="detailed-page-intro__image" src="<?php echo get_the_post_thumbnail_url($page_id, 'carts'); ?>" alt="">
            </div>
            <div class="_block"></div>
            <div class="_block">
                <h1 class="detailed-page-intro__heading"><?php the_title(); ?></h1>
                <div class="detailed-page-intro__tag section-name"><?php echo carbon_get_post_meta($page_id, 'program_caption'); ?></div>
                <div class="detailed-page-intro__content">
                    <?php the_content(); ?>
                </div>
            </div>
        </div>

        <div class="form__inner">
            <div class="form__block">
                <div class="form__legend">Оставьте заявку</div>
            </div>
            <div class="form__block">
                <p class="form__legend-text">Для регистрации в программе нужно пройти собеседование</p>
                <form class="modal-form js-program-form" data-need-validation>
                    <label class="modal-form__label">
                        <input class="modal-form__input" type="text" name="name" data-parsley-required placeholder="Имя">
                    </label>
                    <label class="modal-form__label">
                        <input class="modal-form__input js-phone-mask" type="text" name="tel" data-parsley-required placeholder="Телефон">
                    </label>
                    <label class="modal-form__label">
                        <input class="modal-form__input" type="email" name="email" data-parsley-required placeholder="Почта">
                    </label>
                    <button class="button mod-white modal-form__btn">хочу Учиться</button>
                    <p class="modal-form__agree">Нажимая кнопку “хочу учиться” вы подтверждаете согласие на использование<a href="">политики конфиденциальности</a>
                    </p>
                </form>
            </div>
        </div>

    </div>
</section>

<section class="detailed-page detailed-page--education">
    <div class="site-container">
        <h2 class="detailed-page__heading site-second-heading">Основные темы</h2>
        <div class="detailed-page__container">
            <div class="_block"></div>
            <div class="_block">
                <div class="detailed-page__list">
                    <?php echo carbon_get_post_meta($page_id, 'program_themes'); ?>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="detailed-page detailed-page--blue detailed-page--education">
    <div class="site-container">
        <h2 class="detailed-page__heading site-second-heading">Чему вы научитесь</h2>
        <div class="detailed-page__container">
            <div class="_block"></div>
            <div class="_block">
                <?php
                $program_feautures = carbon_get_post_meta($page_id, 'program_feautures');
                foreach ($program_feautures as $item) : ?>
                    <div class="detailed-page__shiled">
                        <p class="detailed-page__shiled-text">В процессе прохождения экспериентального уровня обучающиеся <span><?php echo $item['title'] ?></span>
                        </p>
                        <img class="detailed-page__img" src="<?php echo get_template_directory_uri(); ?>/assets/images/bird.svg" alt="">
                    </div>
                    <div class="detailed-page__list">
                        <?php echo $item['text'] ?>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>

<section class="detailed-page detailed-page--education">
    <div class="site-container">
        <h2 class="detailed-page__heading site-second-heading">Преподаватели</h2>
        <div class="detailed-page__container">
            <div class="_block"></div>
            <div class="_block">
                <ul class="detailed-page__cards-list">
                    <?php
                    $teachers = carbon_get_post_meta($page_id, 'program_items');
                    $teachers_ids = wp_list_pluck($teachers, 'id');

                    $teachers_args = [
                        'post_type' => 'teacher',
                        'post__in' => $teachers_ids
                    ];
                    $teachers_query = new WP_Query($teachers_args);
                    ?>
                    <?php while ($teachers_query->have_posts()) : $teachers_query->the_post(); ?>
                        <?php
                        $teachers_id = get_the_ID();
                        ?>
                        <li class="detailed-page__cards-item">
                            <?php echo get_template_part('teacher-card'); ?>
                        </li>
                    <?php endwhile; ?>
                </ul>
            </div>
        </div>
    </div>
</section>

<?php
$gallery_imgs = carbon_get_post_meta($page_id, 'program_gallery');
?>
<?php if (count($gallery_imgs) !== 0) { ?>

    <section class="detailed-page detailed-page--education">
        <img class="detail-section__bg-img" src="<?php echo get_template_directory_uri(); ?>/assets/images/detail-bg.svg" alt="">
        <div class="site-container">
            <h2 class="detailed-page__heading site-second-heading">Фотографии с программы</h2>
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
            <div class="form__inner">
                <div class="form__block">
                    <div class="form__legend">Оставьте заявку</div>
                </div>
                <div class="form__block">
                    <p class="form__legend-text">Для регистрации в программе нужно пройти собеседование</p>
                    <form class="modal-form js-program-form" data-need-validation>
                        <label class="modal-form__label">
                            <input class="modal-form__input" type="text" name="name" data-parsley-required placeholder="Имя">
                        </label>
                        <label class="modal-form__label">
                            <input class="modal-form__input js-phone-mask" type="text" name="tel" data-parsley-required placeholder="Телефон">
                        </label>
                        <label class="modal-form__label">
                            <input class="modal-form__input" type="email" name="email" data-parsley-required placeholder="Почта">
                        </label>
                        <button class="button mod-white modal-form__btn">хочу Учиться</button>
                        <p class="modal-form__agree">Нажимая кнопку “хочу учиться” вы подтверждаете согласие на использование<a href="">политики конфиденциальности</a>
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </section>
<?php } ?>

<?php echo get_template_part('contact-us-block'); ?>


<?php get_footer(); ?>