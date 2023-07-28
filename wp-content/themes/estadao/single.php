<?php get_header(); ?>

<div class="container pt-3 pb-3">
	<div class="row">
		<div class="col-12">
	      	<?php 

			if(have_posts()):
				while (have_posts()): the_post(); 
			?>
			
			<?php get_template_part('template-parts/content','single');?>	

			<?php 

				if ( comments_open() || get_comments_number() ) {
					comments_template();
				}

				endwhile;
			else:
			?>

			<p>Mais informações em breve.</p>

			<?php endif; ?>

		</div>
    </div>
</div>

<?php get_footer(); ?>