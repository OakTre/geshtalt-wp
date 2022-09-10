<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package main
 */

get_header();
?>
<div class="offer-bottom container">
<?php $post = get_post(11); setup_postdata($post); ?>
		<h1><?php the_field('i-title')?></h1>
<?php  wp_reset_postdata(); ?>
		
    <p>
      Передовая организация, объединяющая профессионалов
    </p>
  </div>
  <section class="about container">
    <div class="about-wrap">
      <div class="about-wrap-left">
        <p>
          В 2019 институт заключил аффилированный договор с Французским институтом гештальт-терапии и в настоящий момент является филиалом IFGT.
        </p>
        <p>
          Это сотрудничество — важный шаг на пути к повышению качества профессиональной работы.
        </p>
        <img src="<?php echo get_template_directory_uri(); ?>/img/banners.png" alt="IFGT">
			</div>
			<?php $post = get_post(11); setup_postdata($post); ?>
      <div class="about-wrap-right" data-src="<?php the_field('i-video') ?>">
        <div class="video video-toggle"></div>
			</div>
			<?php  wp_reset_postdata(); ?>
    </div>
    <div class="about-menu ">
    <?php wp_nav_menu( array(
			'menu_class' => '',
			'theme_location' => 'menu-2',
			'container' => null
		)); ?>
    </div>
    <div class="about-text">
      <p>
        Мы продвигаем философию и методологию современной гештальт-терапии, стараемся соответствовать высоким стандартам европейского образования в этой области.
      </p>
      <p>
        Мы заботимся о том, что бы профессионал, обучающийся в нашем институте, умел увидеть и мог оказать качественную, квалифицированную помощь.
      </p>
      <p>
        Студенты, успешно закончившие Поволожский институт гештальт-терапии, получают двойной диплом (сертификаты двух образцов Франции и России).
      </p>
      <p>
        В рамках нашего института, продолжает свою работу "Центр трапии и исследования человеческих отношений "<b>Ступени</b>", задача которого - оказание психологической помощи людям.
      </p>
    </div>
    <div class="pattern"></div>
    <div class="about-services">
      <h2>Образовательные программы</h2>
      <div class="about-services-wrap">

			<a href="<?php echo get_post_permalink( 93 ) ?>" class="about-services-wrap-item">
          <img src="http://rugestalt.ru/wp-content/uploads/2020/06/1.png" alt="">
          <p>Лекции и однодневные семинары</p>
        </a>
        <a href="<?php echo get_post_permalink( 95 ) ?>" class="about-services-wrap-item">
          <img src="http://rugestalt.ru/wp-content/uploads/2020/06/2.png" alt="">
          <p>Краткосрочные циклы по психологическому консультированию</p>
        </a>
        <a href="<?php echo get_post_permalink( 97 ) ?>" class="about-services-wrap-item">
          <img src="http://rugestalt.ru/wp-content/uploads/2020/06/3.png" alt="">
          <p>Длительные программы, обучающие гештальт-терапии</p>
        </a>
        <a href="<?php echo get_post_permalink( 100 ) ?>" class="about-services-wrap-item">
          <img src="http://rugestalt.ru/wp-content/uploads/2020/06/4.png" alt="">
          <p>Выездные обучающие курсы, конференции и круглые столы</p>
        </a>

      </div>
    </div>
    <div class="pattern2"></div>
  </section>
<?php
get_footer();
