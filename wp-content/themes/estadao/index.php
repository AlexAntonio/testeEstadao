<?php 

get_header();?>

<div class="container pt-3">
	<div class="row text-center">
		<div class="col-12">
			<h1>404</h1>
			<p>Não foi possível encontrar essa página!</p><br />
			<a class="text-info" href="<?php echo home_url();?>" rel="canonical">Voltar à página inicial</a>
			<br/><br/>
		</div>
	</div>	
</div>

<?php get_footer();?>