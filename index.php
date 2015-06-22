<?php
get_header();
?>
<main>
<?php dynamic_sidebar('breadcrumb'); ?>
	<div class="container">
		<section class="row">
<?php 
	if(have_posts()) {
		while(have_posts()) {
			the_post();
			$category = get_the_category();
?>
			<div class="col-xs-6 col-md-3">
				<div class="thumbnails-container">
					<div class="thumbnail">
						<div class="image">
<?php
						if ( has_post_thumbnail() ) {
							the_post_thumbnail();
						} else {
							$img = get_the_category_thumbnail($category[0]->term_id);
?>							
							<img src="<?php echo $img['url']; ?>" alt="<?php echo $category[0]->name; ?>">
<?php
						}
?>
						</div>
						<div class="caption">
							<div class="meta">
								<div class="category">
									<a href="<?php echo get_category_link($category[0]);?>"
										style="color:<?php echo get_tax_meta($category[0]->term_id, 'category-color');?> !important;">
										<?php echo $category[0]->name;?>
									</a>
								</div>
								<div class="date" 
									itemprop="datePublished" 
									content="<?php the_modified_date('Y-m-d');?>">
										<?php the_modified_date('d.m.Y G:i'); ?>
								</div>
							</div>
							<a href="<?php the_permalink();?>" class="title">
								<h3><?php the_title(); ?></h3>
							</a>
						</div>
					</div>
				</div>
			</div>
<?php
		}
	}
?>
		</section>
	</div>
</main>
<?php
get_footer();
?>