<!DOCTYPE html>
<html lang="ru">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <meta name="description" content="Передовая организация, объединяющая профессионалов">
  <link rel="apple-touch-icon" sizes="180x180" href="<?php echo get_template_directory_uri(); ?>/assets/favicon/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="<?php echo get_template_directory_uri(); ?>/assets/favicon/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="<?php echo get_template_directory_uri(); ?>/assets/favicon/favicon-16x16.png">
  <link rel="manifest" href="<?php echo get_template_directory_uri(); ?>/assets/favicon/site.webmanifest">
  <link rel="mask-icon" href="<?php echo get_template_directory_uri(); ?>/assets/favicon/safari-pinned-tab.svg" color="#5bbad5">
  <meta name="msapplication-TileColor" content="#da532c">
  <meta name="theme-color" content="#ffffff">
  <title><? wp_title(); ?></title>
  <?php wp_head(); ?>
</head>

<body class="page-home">
  <div class="preloader">
    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo-small.svg" alt="">
  </div>
  <div class="page-wrapper">
    <?php
    $header_class = is_front_page() ? "is-hidden" : "";
    $current_url = get_permalink(get_the_ID());
    $derectory = explode('/', $current_url);
    $last = $derectory[count($derectory) - 2];
    $prelast = $derectory[count($derectory) - 3];
    ?>

    <header class="header <?php echo $header_class; ?> <?php if ($last === 'event' || $prelast === 'event' ) echo "header--white"; ?>">
      <div class="site-container header__container grid-container">
        <div class="header__block">
          <a class="header__logo" href="<?php echo get_home_url(); ?>">
            <img class="logo-black" src="<?php echo get_template_directory_uri(); ?>/assets/images/logo.svg" alt="Логотип компании">
            <img class="logo-white" src="<?php echo get_template_directory_uri(); ?>/assets/images/logo-white.svg" alt="Логотип компании">
          </a>
        </div>
        <div class="header__block">
          <a class="header__legend-link" href="<?php echo get_site_url() . '/programmy/' ?>">Образование</a>
          <a class="header__legend-link" href="<?php echo get_site_url() . '/event/' ?>">Мероприятия</a>
          <nav class="header__nav nav">
            <?php
            wp_nav_menu([
              'theme_location'  => 'main_menu',
              'container'       => null,
              'menu_class' => 'menu-list'
            ]);
            ?>
          </nav>
          <button class="button header__btn" data-path="program">Учиться</button>
          <button class="header__burger-btn" aria-label="Открыть меню"><span></span><span></span><span></span>
          </button>
        </div>
      </div>
    </header>

    <div class="menu js-menu">
      <div class="site-container menu__container">
        <button class="menu__close" aria-label="Закрыть меню"><span></span><span></span>
        </button>
        <ul class="menu__list">
          <li class="menu__item">
            <a class="menu__legend-link" href="<?php echo get_site_url() . '/event/' ?>">Мероприятия</a>
          </li>
        </ul>
        <div class="menu__nav">
          <?php
          wp_nav_menu([
            'theme_location'  => 'main_menu',
            'container'       => null,
            'menu_class' => 'menu-list'
          ]);
          ?>
        </div>
        <ul class="socials menu__socials">
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
        <div class="menu__tel-wrapper">
          <a class="menu__tel" href="tel:<?php echo $GLOBALS['geshtalt']['phone_digits']; ?>"><?php echo $GLOBALS['geshtalt']['phone']; ?></a>
          <button class="button menu__btn">оставить заявку</button>
        </div>
      </div>
    </div>

    <main class="page-main main">