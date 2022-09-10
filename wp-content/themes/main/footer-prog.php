<?php $post = get_post(11); setup_postdata($post); ?>


  
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