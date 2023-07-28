<?php if (get_post_type()=='post'): ?>
	<div class="card <?php post_class();?>">
	<div class="card-header bg-success text-white"><?php echo get_the_date();?></div>
	<div class="card-body">
		<h5 class="card-title"><a href="<?php the_permalink();?>" rel="canonical"><?php the_title();?></a></h5>
		<p class="card-text"><?php the_excerpt();?></p>
	</div>
	</div>
	<br />
<?php endif; ?>