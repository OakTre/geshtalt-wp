<?php
/*
    Template Name: О компании
*/

get_header();

$page_id = get_the_ID();

$intro_img_id = carbon_get_post_meta($page_id, 'about_intro_img');
$intro_img_src = wp_get_attachment_image_url($intro_img_id, 'full');

?>

<section class="page-intro" style="background-image:url(<?php echo $intro_img_src; ?>);"></section>
<section class="events events--page about-intro">
    <img class="detail-section__bg-img" src="<?php echo get_template_directory_uri(); ?>/assets/images/detail-bg.svg" alt="">
    <div class="site-container events__container">
        <div class="events__heading-wrapper">
            <h2 class="site-heading events__heaing"><?php echo carbon_get_post_meta($page_id, 'about_heading'); ?></h2>
            <div class="events__heading-info">
                <?php echo carbon_get_post_meta($page_id, 'about_heading_text'); ?>
            </div>
        </div>
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
                        $gallery_imgs = carbon_get_post_meta($page_id, 'about_gallery');
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
    </div>
</section>
<section class="about-intro">
    <div class="site-container">
        <div class="detail-section__content-imgs">
            <div class="_block"></div>
            <div class="_block">
                <div class="about-intro__text-container">
                    <div class="about-intro__text-container-block">
                        <?php echo carbon_get_post_meta($page_id, 'about_descr'); ?>
                    </div>
                    <div class="about-intro__text-container-block">
                        <?php echo carbon_get_post_meta($page_id, 'about_descr_small'); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
$mission_img_id = carbon_get_post_meta($page_id, 'about_mission_img');
$mission_img_src = wp_get_attachment_image_url($mission_img_id, 'full');
?>
<section class="about-mission">
    <div class="site-container">
        <div class="about-mission__container">
            <div class="about-mission__container-inner">
                <div class="_block">
                    <img src="<?php echo $mission_img_src; ?>" alt="">
                </div>
                <div class="_block">
                    <div class="about-mission__content"><span class="about-mission__label">Наша миссия</span>
                        <h2><?php echo carbon_get_post_meta($page_id, 'about_mission_heading'); ?></h2>
                    </div>
                </div>
            </div>
            <div class="about-mission__container-inner">
                <div class="_block"></div>
                <div class="_block">
                    <div class="about-mission__content">
                        <?php echo carbon_get_post_meta($page_id, 'about_mission_content'); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="about-advantages">
    <div class="site-container">
        <h2 class="detailed-page__heading site-second-heading">Наши преимущества</h2>
        <div class="about-advantages__container">
            <div class="_block"></div>
            <div class="_block">
                <ul class="about-advantages__list">
                    <?php
                    $about_feautures = carbon_get_post_meta($page_id, 'about_feautures');
                    foreach ($about_feautures as $item) :
                        $image = wp_get_attachment_image_url($item["image"], 'full');
                    ?>
                        <li class="about-advantages__item">
                            <img src="<?php echo $image; ?>" alt="Преимущество">
                            <?php echo $item["text"]; ?>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </div>
</section>
<?php
$qoute_img_id = carbon_get_post_meta($page_id, 'about_qoute_img');
$qoute_img_src = wp_get_attachment_image_url($qoute_img_id, 'full');
?>
<section class="about-qoute">
    <div class="site-container">
        <div class="about-qoute__block">
            <div class="about-qoute__part">
                <img src="<?php echo $qoute_img_src; ?>" alt="Тренеры нашего центра уделяют большое внимание развитию своего профессионального уровня, постоянно повышают квалификацию в международных программах, регулярно проходят аттестацию и супервизию.">
            </div>
            <div class="about-qoute__part">
                <div class="about-qoute__text">
                    <?php echo carbon_get_post_meta($page_id, 'about_qoute_text'); ?>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="detailed-page">
    <div class="site-container">
        <h2 class="detailed-page__heading site-second-heading">Документы</h2>
        <div class="detailed-page__container">
            <div class="_block"></div>
            <div class="_block">
                <div class="detailed-page__doc-list">
                    <ul>
                        <?php

                        function formatSize($bytes)
                        {

                            if ($bytes >= 1073741824) {
                                $bytes = number_format($bytes / 1073741824, 2) . ' Гб';
                            } elseif ($bytes >= 1048576) {
                                $bytes = number_format($bytes / 1048576, 2) . ' Мб';
                            } elseif ($bytes >= 1024) {
                                $bytes = number_format($bytes / 1024, 2) . ' Кб';
                            } elseif ($bytes > 1) {
                                $bytes = $bytes . ' байты';
                            } elseif ($bytes == 1) {
                                $bytes = $bytes . ' байт';
                            } else {
                                $bytes = '0 байтов';
                            }

                            return $bytes;
                        }
                        $about_docs = carbon_get_post_meta($page_id, 'about_docs');
                        foreach ($about_docs as $item) :
                            $derectory = explode('.', $item["doc"]);
                            $last = $derectory[count($derectory) - 1];
                            $size = formatSize(filesize(get_attached_file($item["doc"])));
                        ?>
                            <li>
                                <a href="<?php echo wp_get_attachment_url($item["doc"]); ?>" target="_blank">
                                    <span><?php echo $item["doc_name"]; ?></span>
                                    <div class="detailed-page__doc-size">(<?php echo $last; ?>, <?php echo $size;?>)</div>
                                    <svg class="icon icon-arrow-top-big detailed-page__doc-icon" width="25" height="25">
                                        <use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprites/sprite-mono.svg#arrow-top-big"></use>
                                    </svg>
                                </a>
                            </li>
                        <?php endforeach; ?>

                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>



<?php echo get_template_part('contact-us-block'); ?>

<?php get_footer(); ?>