<?php
/*
    Template Name: Список Литературы
*/

get_header();

$page_id = get_the_ID();
?>
<section class="contacts-intro top-offset">
    <div class="site-container">
        <h1 class="contacts-intro__heading site-heading page-intro-heading">Список литературы</h1>
    </div>
</section>


<section class="detailed-page bibliography__docs">
    <div class="site-container">
        <div class="detailed-page__container">
            <div class="_block"></div>
            <div class="_block">
                <div class="detailed-page__doc-list">
                    <?php
                    $bibliography_parts = carbon_get_post_meta($page_id, 'bibliography_parts');
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

                    foreach ($bibliography_parts as $part) :

                    ?>
                        <h2 class="bibliography__docs-heading"><?php echo $part["heading"]; ?></h2>
                        <ul>

                            <?php
                            $bibliography_docs = $part['bibliography_docs'];

                            foreach ($bibliography_docs as $item) :
                                $derectory = explode('.', $item["doc"]);
                                $last = $derectory[count($derectory) - 1];
                                $size = formatSize2(filesize(get_attached_file($item["doc"])));
                                $attachment = $item["doc_link"] ? $item["doc_link"] : wp_get_attachment_url($item["doc"]);
                                $class = $item["doc_link"] ? "mod-left-auto" : "";
                            ?>
                                <li>
                                    <svg class="icon icon-arrow-top-big detailed-page__doc-icon _mobile" width="25" height="25">
                                        <use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprites/sprite-mono.svg#arrow-top-big"></use>
                                    </svg>
                                    <a href="<?php echo $attachment; ?>" target="_blank">
                                        <div>
                                            <?php echo $item["doc_name"]; ?>
                                            <?php if ($item["doc_descr"]) { ?>
                                                <div class="bibliography__docs-caption"><?php echo $item["doc_descr"]; ?></div>
                                            <?php } ?>
                                        </div>
                                        <?php if (!$item["doc_link"]) { ?>
                                            <div class="detailed-page__doc-size">(<?php echo $last; ?>, <?php echo $size; ?>)</div>
                                        <?php } ?>
                                        <svg class="icon icon-arrow-top-big detailed-page__doc-icon <? echo $class; ?>" width="25" height="25">
                                            <use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprites/sprite-mono.svg#arrow-top-big"></use>
                                        </svg>
                                    </a>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</section>

<?php echo get_template_part('contact-us-block'); ?>

<?php get_footer(); ?>