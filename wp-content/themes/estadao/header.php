<!DOCTYPE html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Teste - Estadão</title>
    <meta name="description" content="Descrição do site para fins de SEO">
    <meta name="og:title" property="og:title" content="Open Graph Title do site para fins de SEO">
    <meta name="robots" content="index, follow">

    <link rel="shortcut icon" type="image/png" href="<?php echo site_url(); ?>/wp-content/themes/estadao/screenshot.png" />

	<?php wp_head();?>

</head>

<body <?php body_class();?>>

<nav class="navbar navbar-expand-lg pt-2">
    <div class="container-fluid">
        <a class="navbar-brand" href="<?=site_url()?>/" rel="canonical">
            <?php if(has_custom_logo()){ the_custom_logo(); }else{ echo 'Logo'; } ?>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>

        <?php wp_nav_menu( array(
                'theme_location'    => 'my_main_menu',
                'depth'             => 	2,
                'container'         => 'div',
                'container_class'   => 'collapse navbar-collapse',
                'container_id'      => 'navbarSupportedContent',
                'menu_class'        => 'navbar-nav me-auto mb-lg-0',
                'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
                'walker'            => new WP_Bootstrap_Navwalker()
            ) );
        ?>

      <form class="d-flex" role="search" method="get" class="search-form" action="home?s=<?=$_GET['s']?>">
        <input class="form-control" type="search" placeholder="Pesquise por algo.." aria-label="Search" value="" name="s" autocomplete="off" required>
        <button class="btn btn-dark" type="submit"><i class="fas fa-search"></i></button>
      </form>

    </div>
</nav>

<div class="container-fluid bg-social">
    <div class="row p-1">
        <div class="col">
            <div class="float-end">
                <?php

                    $argsSocial = array(
                        'post_type' => 'Social',
                        'orderby' => 'title',
                        'order' => 'ASC'
                    );

                    $social = new WP_Query($argsSocial);

                    if($social->have_posts()):
                        while ($social->have_posts()): $social->the_post(); 
                        
                        $icone= get_field("icone"); 
                        $link= get_field("link"); 
                        
                        if($link!=''){ ?>
                            <div class="d-inline p-1">
                                <a href="<?=$link?>" target="_blank" rel="canonical">
                                    <span class="text-white"><?=$icone?></span>
                                </a>
                            </div>
                        <?php }else{ ?>		
                            <div class="d-inline p-1">
                                <span class="text-white"><?=$icone?></span>
                            </div>
                        <?php } ?>			

                        <?php endwhile;
                        wp_reset_postdata();				
                    
                    endif;
                ?>
            </div>    
        </div>
    </div>
</div>