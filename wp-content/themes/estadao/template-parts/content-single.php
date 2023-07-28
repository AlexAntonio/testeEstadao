<h2><?php the_title();?></h2>
<br />

<div class="text-center">
	<?php if(has_post_thumbnail()): ?>
		<img src="<?=get_the_post_thumbnail_url()?>" width="100% !important" alt="description"/>
	<?php endif; ?>
</div>

<div class="pt-3" style="text-align: justify !important;">
	<div class="row">
		<div class="col">
			<b><?php echo get_the_date();?></b><br />
			Por: <a href="<?=site_url()?>/user/<?php echo get_the_author_meta('nickname');?>/?profiletab=main" rel="canonical"><?php echo get_the_author();?></a>
		</div>
		<div class="col">

		</div>
	</div>
	<hr />

	<div class="row">
		<div class="col">
		<?php the_content();?>
		</div>
	</div>
</div>
<br />