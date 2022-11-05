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

<section class="detailed-page bibliography__docs bibliography__docs--page-teacher">
    <div class="site-container">
        <h2 class="detailed-page__heading site-second-heading">Документы</h2>
        <div class="detailed-page__container">
            <div class="_block"></div>
            <div class="_block">
                <div class="detailed-page__doc-list">
                    <ul>
                        <?php
                        function formatSize2($bytes)
                        {

                            if ($bytes >= 1073741824) {
                                $bytes = number_format($bytes / 1073741824, 2) . ' Гб';
                            } elseif ($bytes >= 1048576) {
                                $bytes = number_format($bytes / 1048576, 2) . ' Мб';
                            } elseif ($bytes >= 1024) {
                                $bytes = number_format($bytes / 1024, 2) . ' Кб';
                            } elseif ($bytes > 1) {
                                $bytes = $bytes . ' Б';
                            } elseif ($bytes == 1) {
                                $bytes = $bytes . ' Б';
                            } else {
                                $bytes = '0 Б';
                            }

                            return $bytes;
                        };
                        $teacher_docs = carbon_get_post_meta($page_id, 'teacher_docs');

                        foreach ($teacher_docs as $item) :
                            $derectory = explode('.', $item["doc"]);
                            $last = $derectory[count($derectory) - 1];
                            $size = formatSize2(filesize(get_attached_file($item["doc"])));
                            $attachment = $item["doc_link"] ? $item["doc_link"] : wp_get_attachment_url($item["doc"]);
                            $class = $item["doc_link"] ? "mod-left-auto" : "";
                        ?>
                            <li>
                                <?php if (empty(!$item["doc_link"])) { ?>
                                    <svg class="icon icon-arrow-top-big detailed-page__doc-icon _mobile" width="25" height="25">
                                        <use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprites/sprite-mono.svg#arrow-top-big"></use>
                                    </svg>
                                <?php } ?>
                                <a <?php if (empty(!$item["doc_link"])) { ?> href="<?php echo $attachment; ?>" <?php } ?> target="_blank">
                                    <div>
                                        <?php echo $item["doc_name"]; ?>
                                        <?php if ($item["doc_descr"]) { ?>
                                            <div class="bibliography__docs-caption"><?php echo $item["doc_descr"]; ?></div>
                                        <?php } ?>
                                    </div>
                                    <?php if (empty(!$item["doc"])) { ?>
                                        <div class="detailed-page__doc-size">(<?php echo $size; ?>)</div>
                                    <?php } ?>
                                    <?php if (empty(!$item["doc_link"])) { ?>
                                        <svg class="icon icon-arrow-top-big detailed-page__doc-icon" width="25" height="25">
                                            <use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprites/sprite-mono.svg#arrow-top-big"></use>
                                        </svg>
                                    <?php } ?>
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