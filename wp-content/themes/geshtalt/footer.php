</main>

<footer class="footer">
    <div class="site-container">
        <div class="grid-container">
            <div class="footer__block">
                <a class="footer__logo" href="/">
                    <img class="footer__logo-descktop" src="<?php echo get_template_directory_uri(); ?>/assets/images/logo-small.svg" alt="Логотип компании">
                    <img class="footer__logo-mobile" src="<?php echo get_template_directory_uri(); ?>/assets/images/logo.svg" alt="Логотип компании">
                </a>
            </div>
            <div class="footer__block">
                <!-- <a class="footer__legend-link" href="/">Образование</a> -->
                <a class="footer__legend-link" href="<?php echo get_site_url() . '/event/' ?>">Мероприятия</a>
                <nav class="footer__nav">
                    <?php
                    wp_nav_menu([
                        'theme_location'  => 'main_menu',
                        'container'       => null,
                        'menu_class' => 'menu-list'
                    ]);
                    ?>
                </nav>
            </div>
            <div class="footer__block">
                <ul class="socials footer__socials">
                    <li class="socials__item">
                        <a class="socials__link" href="<?php echo $GLOBALS['geshtalt']['wt']; ?>">
                            <svg class="icon icon-wt socials__icon" width="24" height="24">
                                <use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprites/sprite-mono.svg#wt"></use>
                            </svg>
                        </a>
                    </li>
                    <li class="socials__item">
                        <a class="socials__link" href="<?php echo $GLOBALS['geshtalt']['tg']; ?>">
                            <svg class="icon icon-tg socials__icon" width="24" height="24">
                                <use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprites/sprite-mono.svg#tg"></use>
                            </svg>
                        </a>
                    </li>
                </ul>
                <p class="footer__text"><?php echo $GLOBALS['geshtalt']['work_time']; ?></p>
                <p class="footer__text"><?php echo $GLOBALS['geshtalt']['address']; ?></p>
                <a class="footer__text _tel" href="tel:<?php echo $GLOBALS['geshtalt']['phone_digits']; ?>"><?php echo $GLOBALS['geshtalt']['phone']; ?></a>
            </div>
        </div>
        <div class="grid-container footer__copyright">
            <div class="footer__copyright-block"></div>
            <div class="footer__copyright-block">
                <a class="footer__copyright-text" href="/">Политика конфиденциальности</a>
            </div>
            <div class="footer__copyright-block">
                <p class="footer__copyright-text">© 2019 Поволжский институт гештальт-терапии</p>
            </div>
        </div>
    </div>
</footer>
</div>
<div class="modal">
    <div class="modal__container" data-target="modal">
        <div class="modal__content">
            <button class="button-reset modal__close-btn modal-close" type="button"><span></span><span></span>
            </button>
            <div class="modal__legend">Поздравляем вы открыли модалку!</div>
        </div>
    </div>
</div>

</body>
<?php wp_footer(); ?>

</html>