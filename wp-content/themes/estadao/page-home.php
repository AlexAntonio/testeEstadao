<?php get_header(); 

$has_hero= esc_html(get_theme_mod('set_hero_bg'));

?>

<div id="app" class="container-fluid pt-3">

	<?php if($has_hero){

		$img= wp_get_attachment_url(get_theme_mod('set_hero_bg'));
		$height= get_theme_mod('set_hero_height', 500); ?>

		<div class="hero pb-5" style="background-image: url('<?php echo esc_url($img); ?>')">
			<div class="overlay" style="min-height:<?php echo esc_html($height); ?>px">
				<div class="container">
					<div class="hero-itens">
						<h1><?=esc_html(get_theme_mod('set_hero_title'))?></h1>
						<p><?=nl2br(esc_textarea(get_theme_mod('set_hero_subtitle')))?></p>
						<a class="btn btn-primary" href="<?=esc_html(get_theme_mod('set_hero_button_link'))?>" rel="canonical"><?=esc_html(get_theme_mod('set_hero_button'))?></a>
					</div>
				</div>
			</div>
		</div>
		<br />
	<?php } ?>

	<!-- CONSUMINDO API COM VUE.JS -->
	<div class="row text-center">
		<div class="col-md-3 col-6" v-for="acao, key in acoes">
			<div class="acoes">
				<p class="pt-2"><img :src="acao.logourl" width="30px" alt="description"/> <b>{{ acao.symbol }}</b></p>
				<p>R$ {{ formatNumber(acao.regularMarketPrice) }} ({{ formatNumber(acao.regularMarketChange) }}%)</p>
			</div>
		</div>
	</div>

	<div class="row pt-3">
		<div class="col-md-9 col-12">

			<div class="row">

					<?php 

						if(isset($_GET['category'])){
							$categorySlug= esc_html($_GET['category']);
						}else{
							$categorySlug= '';
						}

						$argsProminence = array(
							'post_type' => 'post',
							'category_name' => $categorySlug,
							'meta_key' => 'destaque',
							'meta_value' => 'Sim',
							'orderby' => 'date',
							'order' => 'DESC'
						);

						$posts = new WP_Query($argsProminence); 
						
						if($wp_query->have_posts()):

							while ($posts->have_posts()): $posts->the_post();
								get_template_part('template-parts/content', 'prominence-posts');
							endwhile;
							wp_reset_postdata();

						endif;
					?>

			</div>
		</div>

		<div class="col-md-3 col-12">
			<div class="card">
				<p class="text-center alert alert-secondary p-0 m-0">
					<small>Categorias</small>
				</p>
				<div class="card-body">
					<?php 
						$cat_args=array(
							'hierarchical' => 0,
							'orderby' => 'name',
							'order' => 'ASC'
						);

						$categories = get_categories($cat_args);
							foreach($categories as $category) {
							echo '<a class="btn btn-sm btn-success col-12" href="home?category='.$category->slug.'" style="margin:2px;" rel="canonical">' . $category->name . '</a>';
						}
					?>
				</div>
			</div>
			<br />

			<?php
				//CONSUMINDO API METODO NATIVO DO WORDPRESS
				$url = 'https://economia.awesomeapi.com.br/last/USD-BRL,EUR-BRL,BTC-BRL';
				$response = wp_remote_get($url);

				if (is_wp_error($response)) {
					error_log("Error: ". $response->get_error_message());
					return false;
				}

				$body = wp_remote_retrieve_body($response);

				$cotacoes = json_decode($body);
			?>

			<div class="card">
				<p class="text-center alert alert-secondary p-0 m-0">
					<small>Cotações</small>
				</p>
				<div class="card-body">
					<?php foreach ($cotacoes as $c) { ?>
						<div class="row pb-3">
							<div class="col-12 badge text-bg-warning"><?=$c->code?> => R$ <?=formatar($c->bid)?></div>
						</div>
					<?php } ?>	
				</div>
			</div>
			<br />

			<?php get_sidebar(); ?>
		</div>
		
	</div>
</div>

<script>

	options= {
		el: '#app',
		data: {
			acoes: {},
			cotacoes: {}
		},
		methods: {
			//CONSUMINDO API COM VUE.JS
			getAcoes(){
				fetch('https://brapi.dev/api/quote/PETR4%2CFNAM11%2CHAPV3%2CITUB4?fundamental=false&dividends=false')
					.then(response => response.json())
					.then(data => {
						if(data){
							this.acoes= data.results
						}
					})
			},
			getCotacoes(){
				fetch('https://economia.awesomeapi.com.br/last/USD-BRL,EUR-BRL,BTC-BRL')
					.then(response => response.json())
					.then(data => {
						if(data){
							this.cotacoes= data
						}
					})
			},
			formatNumber (num) {
				return parseFloat(num).toFixed(2)
			},
			formatDate(value){
				let date = value.split(" ")
				let newDate = date[0].split("-")
				let diaCotacao= newDate[2]+'/'+newDate[1]+'/'+newDate[0]
				return diaCotacao
			}
		},
		mounted() {
            this.getAcoes(),
			this.getCotacoes()
        }
	}

	const vm= new Vue(options);
</script>

<?php get_footer();?>