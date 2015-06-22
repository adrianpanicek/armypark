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
						<h3>Vysoký plat bez Ing.</h3>
						<p>IT je do budúcnosti najslubnejšie pracovné odvetie. Staňte sa programátorom alebo designerom bez hlbokej znalosti matematiky alebo zdĺhavým študovaním nepochopiteľných materiálov všade na internete. Nechápete ? My vám vysvetlíme ako to funguje.</p>
						<ul class="list-inline list-checkmark">
							<li>
								<i class="fa fa-angle-double-right orange fa-fw"></i>
								<a href="#">Pozrieť kurzy</a>
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
						<p>Chcete sa naučiť postavať robota ? Naprogramovať hodiny ? Vytvárať weby ? Programovať hry ? Chcete sa živiť tvorením a spoznávať reklamy na svoje reklamy po celom slovensku ? Alebo po celom svete ? <strong>Naučíme vás to.</strong></p>
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
						<h3>Projekty študentov</h3>
						<p>Chcete byť navždy zapísaný na stene slávy pokrokov na CitronLabe ? Pochváliť sa svojím kamarátom za projekt na ktorý ste hrdý ? Napíšte si o konzultáciu.</p>
						<ul class="list-inline list-checkmark">
							<li>
								<i class="fa fa-angle-double-right orange fa-fw"></i>
								<a href="#">Cesta k legende</a>
							</li>
						</ul>
					</div>
				</section>
			</div>
		</div>
	</div>
</main>
<?php
get_footer();
?>