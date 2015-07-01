<?php
get_header();
?>
<main>
	<div class="mega">
		<div class="container">
			<div class="col-md-6">
				<div class="mega-text">
					<h1><?php bloginfo('name')?> je...</h1>
					<p>
						<strong>Útočisko IT nadšencov</strong> a online <a href="">univerzita</a> ktorá ponúka bezplatné<br>online kurzy <a href>programovania</a> a hobby <a href>elektroniky</a>. Pozrite sa čo vám môžme ponúknuť...
					<p>
					<div class="btn-group">
						<a href="#" class="btn btn-transparent">
							OBJAV NÁŠ SVET <span class="caret"></span>
						</a>
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="comb">
					<div class="comb-row">
						<div class="hexagon">
							<a class="hexagon-content" href="<?php echo get_category_link(get_cat_ID('html5'));?>">
								<img class="icon" src="<?php bloginfo('template_url'); ?>/img/HTML5_Logo.svg" alt>
								<h3>HTML<span class="detail orange">5</span></h3>
							</a>
						</div>
						<div class="hexagon">
							<a class="hexagon-content" href="<?php echo get_category_link(get_cat_ID('css3'));?>">
								<img class="icon" src="<?php bloginfo('template_url'); ?>/img/CSS3_Logo.svg" alt>
								<h3>CSS<span class="detail blue">3</span></h3>
							</a>
						</div>
					</div>
					<div class="comb-row">
						<div class="hexagon">
							<a class="hexagon-content" href="<?php echo get_category_link(get_cat_ID('javascript'));?>">
								<img class="icon" src="<?php bloginfo('template_url'); ?>/img/JS_Logo.svg" alt>
								<h3><span class="detail orange">J</span>avaScript</h3>
							</a>
						</div>
						<div class="hexagon">
							<a class="hexagon-content" href="<?php echo get_category_link(get_cat_ID('wordpress'));?>">
								<img class="icon" src="<?php bloginfo('template_url'); ?>/img/WP_Logo.svg" alt>
								<h3><span class="detail blue">W</span>ordPress</h3>
							</a>
						</div>
					</div>
					<div class="comb-row">
						<div class="hexagon">
							<a class="hexagon-content" href="<?php echo get_category_link(get_cat_ID('php'));?>">
								<img class="icon" src="<?php bloginfo('template_url'); ?>/img/PHP_Logo.svg" alt style="width: 120px; margin-top: 15px;">
								<h3><span class="detail blue">P</span>HP</h3>
							</a>
						</div>
						<div class="hexagon">
							<a class="hexagon-content">
								<img class="icon" src="<?php bloginfo('template_url'); ?>/img/CW_Logo.svg" alt style="width: 90px;margin-top: 5px;">
								<h3>c<span class="detail green">IT</span>ron</h3>
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="background-grey">
		<div class="container">
			<section class="row">
				<?php
				dynamic_sidebar('home_articles');
				dynamic_sidebar('home_links');
				?>
			</section>
		</div>
		<div class="strip background-white">
			<div class="container">
				<section class="row offset elegant">
					<div class="triangle visible-lg"></div>
					<div class="col-sm-7">
						<h3>Prestaňte investovať do vzdelania, vzdelávajte sa !</h3>
						<p>V každom z nás drieme túžba po tom, vytvoriť niečo na čo môžete byť hrdý a čo vám prinesie uznanie. Vzdelanie a múdrosť nikomu nepatrí a pritom väčšina ludí berie edukačný trh ako veľmi dobrý biznis. CitronLab je portál vytvorený ajťákmi, pre ajťákov. Či už snívate o vlastnom projekte, chcete poradiť, alebo sa len zaujímate o novinky vo svete IT, ste tu správne.</p>
						<ul class="list-inline list-checkmark">
							<li>
								<i class="fa fa-angle-double-right orange fa-fw"></i>
								<a href="<?php $post = get_page_by_path('welcome-home', OBJECT, 'post');echo get_post_permalink($post->ID); ?>">Celý článok</a>
							</li>
						</ul>
					</div>
					<div class="col-sm-5">
						<div class="text-center">
							<img src="<?php bloginfo('template_url'); ?>/img/doc.png" alt>
						</div>
					</div>
				</section>
			</div>
		</div>
		<div class="strip background-charcoal">
			<div class="container">
				<section class="row offset elegant">
					<div class="triangle triangle-white visible-lg"></div>
					<div class="col-sm-5">
						<div class="text-center">
							<img src="<?php bloginfo('template_url'); ?>/img/chip.svg" alt style="width: 50%;">
						</div>
					</div>
					<div class="col-sm-7">
						<h3>Skroťte IT</h3>
						<p>Chcete sa naučiť postaviť robota ? Naprogramovať hodiny ? Vytvárať weby ? Programovať hry ? Chcete sa živiť tvorením a spoznávať reklamy na svoje produkty po celom slovensku ? Alebo po celom svete ? <strong>Naučíme vás to.</strong></p>
						<ul class="list-inline list-checkmark">
							<li>
								<i class="fa fa-angle-double-right orange fa-fw"></i>
								<a href="#">Online kurzy zadarmo</a>
							</li>
							<li>
								<i class="fa fa-angle-double-right orange fa-fw"></i>
								<a href="#">Stretnutia programátorov</a>
							</li>
						</ul>
					</div>
				</section>
			</div>
		</div>
		<div class="strip background-white">
			<div class="container">
				<section class="row offset elegant">
					<div class="triangle triangle-charcoal visible-lg"></div>
					<div class="col-md-7">
						<h3>Sponzor</h3>
							<!-- Sponsor -->
							<ins class="adsbygoogle"
							     style="display:block"
							     data-ad-client="ca-pub-2771839646741592"
							     data-ad-slot="5711419865"
							     data-ad-format="auto"></ins>
							<script>
							(adsbygoogle = window.adsbygoogle || []).push({});
							</script>
					</div>
				</section>
			</div>
		</div>
	</div>
</main>
<?php
get_footer();
?>