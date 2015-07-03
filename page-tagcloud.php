<?php
get_header();
?>
<main>
	<section class="breadcrumb-wrap">
		<div class="container">
			<ol class="breadcrumb" itemscope itemtype="http://schema.org/BreadcrumbList">
				<li	itemprop="itemListElement" 
					itemscope 
					itemtype="http://schema.org/ListItem">
						<a itemprop="item" href="<?php get_home_url(); ?>">
							<span itemprop="name">Home</span>
						</a>
						<meta itemprop="position" content="0" />
				</li>
				<li	itemprop="itemListElement" 
					itemscope 
					itemtype="http://schema.org/ListItem">
						<a itemprop="item" href="<?php echo '//'.$_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"]; ?>">
							<span itemprop="name">TagCloud</span>
						</a>
						<meta itemprop="position" content="1" />
				</li>
			</ol>
		</div>
	</section>
	<div class="background-grey">
		<div class="container">
			<section class="row offset-small">
				<div class="col-sm-12">
					<?php wp_tag_cloud(); ?>
				</div>
			</section>
		</div>
	</div>
</main>
<?php
get_footer();
?>