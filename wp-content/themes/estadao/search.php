<?php get_header(); ?>

<div class="container pt-3 pb-3">
	<div class="row">
		<div class="col-12">

			<h2>Resultado(s) encontrado(s)</h2>
			<br />

	      	<?php 

			if(have_posts()):
				while (have_posts()): the_post(); 
			?>
			
			<?php get_template_part('template-parts/content','search');?>	

			<?php 
				endwhile;?>

				<div class="row">
					<div class="col-md-6 text-left"><h5><?php previous_posts_link('<< Página anterior');?></h5></div>
					<div class="col-md-12 text-right"><h5><?php next_posts_link('Próxima página >>');?></h5></div>
				</div>
				<br />

			<?php else:
			?>

			<p>No results found.</p>

			<?php endif; ?>

		</div>
    </div>
</div>

<?php get_footer();?>