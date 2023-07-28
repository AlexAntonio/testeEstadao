<?php
    $categories= get_the_category($post->ID);
?>

<div class="card">
  <div class="card-body">
    <?php  foreach($categories as $cat){ ?>
        <p class="float-end"><span class="badge text-bg-secondary m-1"><?=$cat->name?></span></p>
    <?php } ?>
    <h5 class="card-title py-2"><a href="<?php the_permalink();?>" style="text-decoration:none;" rel="canonical"><?php the_title();?></a></h5>
	    <div class="row">
	    	<div class="col-md-4">
				<?php if(has_post_thumbnail()): ?>
					<?php the_post_thumbnail('large', array('class' => 'card-img-top img-fluid', 'style' => 'height:150px;'));?>
				<?php else: ?>
					<img src="<?=site_url()?>/wp-content/themes/estadao/images/default.jpg" class="card-img-top img-fluid" alt="description"/>
				<?php endif; ?>
		    </div>
		    <div class="col-md-8">
                <?php the_excerpt();?>
		    	<p><a class="btn btn-sm btn-primary" href="<?php the_permalink();?>" rel="canonical">Veja mais</a></p>
		    </div>
	    </div>
  </div>
</div>
<br />