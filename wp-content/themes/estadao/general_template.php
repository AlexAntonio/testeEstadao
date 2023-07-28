<?php
/*
	Template name: General Template
*/
?>

<?php get_header();?>

<div id="app" class="container pt-3 pb-3">
	<div class="row">
		<div class="col-12">

	      	<?php 
			
			if(have_posts()):
				
				while (have_posts()): the_post();
					get_template_part('template-parts/content');
				endwhile;

			else: ?>

				<p>Mais informações em breve!</p>
				
			<?php endif; ?>

		</div>
    </div>
</div>

<?php get_footer();?>