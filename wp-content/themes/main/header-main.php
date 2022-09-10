<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=578, maximum-scale=1.0, user-scalable=no">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="format-detection" content="telephone=no">
  <link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/img/favicon/favicon.ico" type="image/x-icon">
  <meta property="og:title" content="" />
  <meta name="keywords" content=""/>
  
	<?php wp_head() ?>
	<!-- Yandex.Metrika counter -->
<script type="text/javascript" >
   (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
   m[i].l=1*new Date();k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
   (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

   ym(65202115, "init", {
        clickmap:true,
        trackLinks:true,
        accurateTrackBounce:true,
        webvisor:true
   });
</script>

<noscript><div><img src="https://mc.yandex.ru/watch/65202115" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->
</head>
<body>
  <div class="burger">
    <span></span>
    <span></span>
    <span></span>
  </div>
  <header class="header container">
    <div class="header-logo">
      <a href="/">
        <img src="<?php echo get_template_directory_uri(); ?>/img/logo.png" alt="Институт гештальт терапии">
        <p>Поволжский институт <br>
          <b>гештальт</b>-терапии
        </p>
      </a>
    </div>
    <div class="header-menu">
		<?php wp_nav_menu( array(
			'menu_class' => '',
			'theme_location' => 'menu-1',
			'container' => null
		)); ?>
    </div>
  </header>
  <?php $post = get_post(11); setup_postdata($post); ?>
  <section class="offer container">
  <?php the_field('i-slider') ?>
  </section>
  <?php  wp_reset_postdata(); ?>