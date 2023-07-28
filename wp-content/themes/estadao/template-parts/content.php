<?php if(!isset($_GET['profiletab'])){ ?>
	<h2><?php the_title();?></h2>
	<br />
<?php } ?>

<div class="text-center">
	<?php if(has_post_thumbnail()): ?>
		<img src="<?=get_the_post_thumbnail_url()?>" width="100% !important" alt="description"/>
	<?php endif; ?>
</div>

<div style="text-align: justify !important;">
	<?php the_content();?>
</div>
<br />