<?php 
/*
Template Name: Литература
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
    <h1><?php the_title() ?></h1>
    <p>
    
    </p>
  </div>
  <section class="catpeople container">
  <?php 
$my_posts = get_posts('numberposts=-1&post_type=post');
foreach ($my_posts as $post) :
setup_postdata($post);
?>
  <a href="<?php echo the_permalink() ?>" class="books-item">
      <h3><?php the_title() ?></h3>
      <?php the_excerpt() ?>
  </a>

<?php endforeach; ?>
    
  </section>
  <div class="pattern2 container" style="margin-top: 20px; margin-bottom: 70px;"></div>

<?php
get_footer();
