<?php 
/*
Template Name: Документы
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
<div class="offer-bottom container doc-offer">
    <h1>Сведения об организации</h1>
    <p>
    </p>
  </div>
  <section class="doc container">
	<?php
$my_posts = get_posts('numberposts=50&post_type=doc');
foreach ($my_posts as $post) :
setup_postdata($post);
?>
    <div class="doc-item">
			<div class="doc-href" style="display: none" src="<?php the_field('download')?>"></div>
      <img src="<?php echo get_template_directory_uri(); ?>/img/icons/doc.png" alt="">
      <h2><?php the_title() ?></h2>
		</div>
		<?php endforeach; ?>
    
  </section>
  <div class="pattern2 container" style="margin-top: 20px; margin-bottom: 70px;"></div>

<?php
get_footer();
