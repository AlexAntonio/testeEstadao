<?php
    $categories= get_the_category($post->ID);
?>

<div class="col-md-4 col-12 pb-3">
    <div class="card card-home">
    <span class="badge text-bg-dark" style="position:absolute;">Destaque</span>
        <?php if(has_post_thumbnail()): ?>
            <?php the_post_thumbnail('large', array('class' => 'card-img-top img-fluid', 'style' => ''));?>
        <?php else: ?>
            <img src="<?=site_url()?>/wp-content/themes/estadao/images/default.jpg" class="card-img-top img-fluid" alt="description"/>
        <?php endif; ?>
        <p class="text-center alert alert-secondary p-0 m-0">
            <small><?php echo get_the_date();?></small>
        </p>
        <div class="card-body">
            <?php  foreach($categories as $cat){ ?>
                <span class="badge text-bg-secondary"><?=$cat->name?></span>
            <?php } ?>
            <a href="<?=get_post_permalink()?>" rel="canonical">
                <h6 class="card-title pt-2"><b><?=the_title();?></b></h6>
            </a>    
            <hr />
            <p class="card-text"><?=get_excerpt(100);?>[...]</p>
        </div>
        <div class="card-footer">
            <a href="<?=get_post_permalink()?>" class="btn btn-primary float-end" rel="canonical">Leia mais</a>
        </div>    
    </div>
</div>