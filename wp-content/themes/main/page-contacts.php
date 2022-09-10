<?php 
/*
Template Name: Контакты
*/
?>
<?php get_header()?>
<?php $post = get_post(11); setup_postdata($post); ?>


  <div class="offer-bottom container doc-offer">
    <h1>Как нас найти</h1>
    <p>
    </p>
  </div>
  <section class="contacts container">
    <div class="contacts-wrap">
      <div class="contacts-wrap-item">
        <div>
          <img src="<?php echo get_template_directory_uri(); ?>/img/contacts/1.png" alt="">
        </div>
        <div>
          <p><?php the_field('i-cont-adress') ?></p>
          <span><?php the_field('i-cont-adress2') ?></span>
        </div>
      </div>
      <div class="contacts-wrap-item">
        <div>
          <img src="<?php echo get_template_directory_uri(); ?>/img/contacts/2.png" alt="">
        </div>
        <div>
          <b>Ближайшее метро</b>
          <span>
					<?php the_field('i-cont-metro') ?>
          </span>
        </div>
      </div>
      <div class="contacts-wrap-item">
        <div>
          <img src="<?php echo get_template_directory_uri(); ?>/img/contacts/3.png" alt="">
        </div>
        <div>
          <a href="tel:<?php the_field('i-phone') ?>" target="blank"><?php the_field('i-phone') ?></a>
          <span><?php the_field('i-cont-name') ?></span>
        </div>
      </div>
    </div>
    <div class="contacts-map">
      <h2>Схема проезда</h2>
      <div class="contacts-map-wrap">
        <?php the_field('i-map') ?>
      </div>
    </div>
  </section>
  <?php  wp_reset_postdata(); ?>
  <div class="pattern2 container" style="margin-top: 20px; margin-bottom: 70px"></div>

  <?php get_footer() ?>