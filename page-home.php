<?php
get_header();
?>
<div id="mega">
	<img src="<?php bloginfo('template_url'); ?>/img/background.jpg" class="filter-mayfair">
</div>
<main>
	<div class="background-grey" id="content">
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
					<div class="col-sm-6">
						<h3>Air Soft</h3>
						<p>Každý si chce aspoň raz za život vyskúšať, aký je to pocit byť vojakom. Airsoft vám ponúkne najvernejší pocit z boja, z akcie a adrenalínu ktorý z toho vyplýva. Zastrielajte si na kolegov realistickými replikami zbraní, vrieskajte pokyny do vysielačky alebo len zúfalo hladajte medika.</p>
					</div>
					<div class="col-sm-6">
						<h3>Laser Game</h3>
						<p>Necítite sa na štípajúce guľôčky, farbu po celom tele a nepriateľov ktorý nepriznajú zásah? Tak Laser Game je voľba pre vás. Vyskúšajte si rýchlu akciu v ktorej jeden zásah nemusí znamenať smrť. Zažite akciu strelby bez padajúcich projektilov, chráničov a fňukajúcich zasiahnutých žien.</p>
					</div>
				</section>
			</div>
		</div>
		<div class="strip background-modes" style="height: 655px">
			<div class="container">
				<section class="row offset elegant">
					<div class="col-sm-5">
						<h3>PRIEBEH HRY</h3>
						<p>Máme pre Vás pripravené množstvo scenárov, v ktorých má každý člen tímu svoju úlohu. Možnosti sú neobmedzené a pre to Vás táto hra neprestane baviť.<br>
							<strong>Teraz môže hrať 16 hráčov naraz!</strong><br>
							Pri počte hráčov do 10 vás môžeme spojiť s ďalšími záujemcami o hru, hra sa tak stane atraktívnejšia, predsa čím viac ľudí tým väčšia zábava.</p>
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