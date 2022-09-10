<?php 
/*
Template Name: Тренера
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
<div class="offer-bottom container doc-offer people-offer">
    <h1>Кто мы</h1>
    <p>
    преподаватели и сотрудники института
    </p>
  </div>
  <section class="people container">
    <a href="<?php echo get_page_link( 61 ); ?>" class="people-item">
    <img src="http://rugestalt.ru/wp-content/uploads/2020/07/111.png" alt="">
      <h2>Тренера</h2>
    </a>
    <a href="<?php echo get_page_link( 63 ); ?>" class="people-item">
    <img src="http://rugestalt.ru/wp-content/uploads/2020/07/222.png" alt="">
      <h2>Супервизоры</h2>
    </a>
    <a href="<?php echo get_page_link( 65 ); ?>" class="people-item">
    <img src="http://rugestalt.ru/wp-content/uploads/2020/07/333.png" alt="">
      <h2>Терапевты</h2>
    </a>
    
  </section>
  <div class="pattern2 container" style="margin-top: 20px; margin-bottom: 70px;"></div>

<?php
get_footer();
