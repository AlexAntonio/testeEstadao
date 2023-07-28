<?php get_header(); ?>

<div id="app" class="container pt-3">

    <h2><?php the_title();?></h2>
    <br />

	<div class="row">
        <div class="col-12">
            <?php

                $the_page = get_query_var('paged');

                $argsAllPosts = array(
                    'post_type' => 'post',
                    'posts_per_page' => '10',
                    'orderby' => 'date',
                    'order' => 'DESC',
                    'paged'=> $the_page
                );

                $posts = new WP_Query($argsAllPosts);
                
                if($wp_query->have_posts()):

                    while ($posts->have_posts()): $posts->the_post();
                        get_template_part('template-parts/content', 'all-posts');
                    endwhile; 
                    wp_reset_postdata(); ?>

                    <div class="row">
						<div class="col-md-6 text-left"><h5><?php previous_posts_link('<< Página anterior');?></h5></div>
						<div class="col-md-6 text-right"><h5><?php next_posts_link('Próxima página >>');?></h5></div>
					</div>
					<br />

                    <?php wp_reset_query();

                    else:
                        ?>

                        <p>Não há notícias a serem exibidas.</p>

                <?php endif;
            ?>
		</div>
	</div>
</div>

<?php get_footer();?>