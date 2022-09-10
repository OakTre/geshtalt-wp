<?php 
/*
Template Name: Кат. Лекции
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
    <h1><?php the_title()?></h1>
    <p>
      найди свою программу обучения
    </p>
  </div>
  <section class="prog container" id="prog-lect">
	<?php
$my_posts = get_posts('numberposts=50&post_type=obr&category=7');
foreach ($my_posts as $post) :
setup_postdata($post);
?>
    <a href="<?php echo get_post_permalink( ) ?>" class="prog-item">
    <img class="prog-item-icon" src="<?php the_field('prog-icon')?>" alt="">
      <div class="prog-item-date">
        <p><?php the_field('prog-date')?></p>
        <p><?php the_field('prog-time')?></p>
      </div>
      <div class="prog-item-overlay"></div>
      <img src="<?php echo the_field('prog-img') ?>" alt="<?php the_title() ?>">
      <h2><?php the_title() ?></h2>
      <?php the_excerpt() ?>
		</a>
		<?php endforeach; ?>
    
  </section>
  <div class="pattern2 container" style="margin-top: 20px; margin-bottom: 70px;"></div>

<?php
get_footer();
