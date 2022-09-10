<?php $post = get_post(11); setup_postdata($post); ?>


  <div class="callback container">
    <div class="callback-left">
      <h2>
        Присоеденяйтесь к нам!
      </h2>
      <div class="callback-left-text">
        <p>
          Остались вопросы? Хотите получать новости обо всех наших мероприятиях?
        </p>
        <p>
          Внесите ваши контакты в форме справа или позвоните нам в рабочее время:
        </p>
        <b>пн-пт с 10:00 до 18:00.</b>
        <a href="tel:<?php the_field('i-phone')?>" target="blank"><?php the_field('i-phone')?></a>
      </div>
    </div>
    <div class="callback-right">
      <?php echo do_shortcode('[mailerlite_form form_id=1]') ?>
    </div>
  </div>
  <footer class="footer">
    <div class="footer-wrap container">
      <div class="footer-wrap-left">
        <a href="/"><img src="<?php echo get_template_directory_uri(); ?>/img/logo-white.png" alt=""></a>
      </div>
      <div class="footer-wrap-right">
        <p>
          <?php the_field('i-footer-adress') ?>
          <a href="tel:<?php the_field('i-phone')?>"><?php the_field('i-phone')?></a>
        </p>
        <p>
          <?php the_field('i-lic') ?>
        </p>
      </div>
    </div>
	</footer>
	

	<?php  wp_reset_postdata(); ?>


	<div class="popup">
		<div class="close">&times;</div>
		<iframe width="560" height="315" src="" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
	</div>
	<div class="overlay"></div>
	<div id="thx">
		<p>
			Спасибо! Ваша заявка принята!
		</p>
	</div>
<?php wp_footer() ?>
<script>
	
	let formOne = document.querySelector('#mailerlite-form_1 div form');
	console.log(formOne);
	formOne.addEventListener('submit', () => {
		ym(65202115,'reachGoal','footer');
			console.log('send');
	});
	
	
	
</script>
</body>
</html>