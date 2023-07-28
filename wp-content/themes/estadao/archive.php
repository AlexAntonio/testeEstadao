<?php

get_header(); ?>

<div id="app" class="container pt-3 pb-3">
	<div class="row">
		<div class="col-12">
				<?php if ( have_posts() ) : ?>

				<header class="page-header">
					<?php
						the_archive_title( '<h2 class="page-title">', '</h2><br>' );
						the_archive_description( '<div class="taxonomy-description">', '</div>' );
					?>
				</header>

				<?php

				while ( have_posts() ) :
					the_post();
					get_template_part( 'template-parts/content', 'all-posts');
				endwhile;

				else: ?>

				<p>Não há resultados a serem exibidos.</p>

				<?php endif;
				?>
			</div>
		</div>
	</div>
<?php get_footer(); ?>