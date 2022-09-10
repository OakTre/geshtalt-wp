<?php 
/*
Template Name: Программы
*/
?>
<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package main
 */

get_header();
?>
<div class="offer-bottom container doc-offer prog-offer">
    <h1>Как стать гештальт-терапевтом</h1>
    <p>
      найди свою программу обучения
    </p>
  </div>
  <section class="prog container">
	<div class="about-services" style="margin-bottom: 70px;">
      <h2>Образовательные программы</h2>
      <div class="about-services-wrap">

			<a href="<?php echo get_post_permalink( 93 ) ?>" class="about-services-wrap-item">
          <img src="https://rugestalt.ru/wp-content/uploads/2020/06/1.png" alt="">
          <p>Лекции, однодневные семинары и краткосрочные циклы</p>
        </a>
        <a href="<?php echo get_post_permalink( 95 ) ?>" class="about-services-wrap-item">
          <img src="https://rugestalt.ru/wp-content/uploads/2020/06/2.png" alt="">
          <p>События и видеоархив</p>
        </a>
        <a href="<?php echo get_post_permalink( 97 ) ?>" class="about-services-wrap-item">
          <img src="https://rugestalt.ru/wp-content/uploads/2020/06/3.png" alt="">
          <p>Длительные программы, обучающие гештальт-терапии</p>
        </a>
        <a href="<?php echo get_post_permalink( 100 ) ?>" class="about-services-wrap-item">
          <img src="https://rugestalt.ru/wp-content/uploads/2020/06/4.png" alt="">
          <p>Выездные обучающие курсы, конференции и круглые столы</p>
        </a>

      </div>
    
  </section>
  <div class="pattern2 container" style="margin-top: 20px; margin-bottom: 70px;"></div>

<?php
get_footer();
