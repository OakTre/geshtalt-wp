<?php
/*
    Template Name: Контакты
*/

get_header();

$page_id = get_the_ID();
?>

<section class="contacts-intro top-offset">
    <div class="site-container">
        <h1 class="contacts-intro__heading site-heading page-intro-heading">Контакты</h1>
        <div class="contacts-intro__grid-container">
            <div class="_block"></div>
            <div class="_block">
                <a class="contacts-intro__tel" href="tel:<?php echo $GLOBALS['geshtalt']['phone_digits'];?>"><?php echo $GLOBALS['geshtalt']['phone'];?></a>
                <p class="contacts-intro__txt"><?php echo $GLOBALS['geshtalt']['address'];?></p>
                <p class="contacts-intro__txt"><?php echo $GLOBALS['geshtalt']['work_time'];?></p>
                <div class="contacts-intro__socials-wrapper">
                    <div class="contacts-intro__socials">
                        <ul class="socials">
                            <li class="socials__item">
                                <a class="socials__link" href="<?php echo $GLOBALS['geshtalt']['wt'];?>">
                                    <svg class="icon icon-wt socials__icon" width="24" height="24">
                                        <use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprites/sprite-mono.svg#wt"></use>
                                    </svg>
                                </a>
                            </li>
                            <li class="socials__item">
                                <a class="socials__link" href="<?php echo $GLOBALS['geshtalt']['tg'];?>/">
                                    <svg class="icon icon-tg socials__icon" width="24" height="24">
                                        <use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprites/sprite-mono.svg#tg"></use>
                                    </svg>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="contacts-intro__adress">
                        <p>Ближайшее метро</p>
                        <ul>
                            <li>Суконная Cлобода — 1,1 км</li>
                            <li>Площадь Тукая — 1,4 км</li>
                            <li>Кремлевская — 2,6 км</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="map js-map" data-coords="55.792392, 49.111480" data-center="55.792392, 49.111480">
    <div class="map__container js-map-element"></div>
</section>


<script src="https://api-maps.yandex.ru/2.1/?apikey=b0b15954-57af-4901-b78c-0ad5bd94cda8&amp;lang=ru_RU"></script>
<?php echo get_template_part('contact-us-block'); ?>

<?php get_footer(); ?>