<?php
class CL_Widget_Related_Posts extends WP_Widget {

	public function __construct() {
		$widget_ops = array('classname' => 'citronlab_widget_related', 'description' => __( "Related posts.") );
		parent::__construct('citronlab-related-posts', 'CitronRelated', $widget_ops);
		$this->alt_option_name = 'citronlab_widget_related';
	}

	public function widget( $args, $instance ) {
		if(!is_single())
			return;

		global $post;
	    $tags = wp_get_post_tags($post->ID);
	    $cats = get_the_category($post->ID);
	    if(count($tags) > 0 || count($cats) > 0) {
		?>
		
		<div class="widget similar-articles">
			<div class="widget-head">
				<?php echo $instance['title'] ?>
			</div>
			<div class="widget-body">
				<div class="list-group">
		<?php
		    $tag_ids = array();
		    $cat_ids = array();
		    foreach($tags as $individual_tag) 
		    	$tag_ids[] = $individual_tag->term_id;
		    foreach($cats as $cat) 
		    	$cat_ids[] = $cat->term_id;

		    $args_tags = array(
			    'tag__in' => $tag_ids,
			    'post__not_in' => array($post->ID),
			    'posts_per_page'=> $instance['posts_per_page'],
			    'ignore_sticky_posts'=> 1
	    	);
	    	$args_cats = array(
			    'category__in' => $cat_ids,
			    'post__not_in' => array($post->ID),
			    'posts_per_page'=> $instance['posts_per_page'],
			    'ignore_sticky_posts'=> 1
	    	);

	    	if(count($tags) > 0) {
			    $tags_query = new WP_query($args_tags);

			    while($tags_query->have_posts()) {
			    $tags_query->the_post();
			    ?>
		    			<a href="<?php the_permalink(); ?>" class="list-group-item">
							<h4 class="list-group-item-heading"><?php the_title(); ?></h4>
						</a>
						<?php foreach(wp_get_post_tags(get_the_ID()) as $tags): ?>
						<span class="label label-primary"><?php echo $tags->name; ?></span>
						<?php endforeach; ?>
		    	<?php
		   		}
		   		wp_reset_query();
		   	}
	   		if(count($cats) > 0) {
		   		$cats_query = new WP_query($args_cats);

		   		while($cats_query->have_posts()) {
			    $cats_query->the_post();
			    ?>
		    			<a href="<?php the_permalink(); ?>" class="list-group-item">
							<h4 class="list-group-item-heading"><?php the_title(); ?></h4>
						</a>
						<?php foreach(get_the_category(get_the_ID()) as $cat): ?>
						<span class="label"
							style="background-color: <?php echo get_tax_meta($cat->term_id, 'category-color');?>">
							<?php echo $cat->name;?>
						</span>
						<?php endforeach; ?>
		    	<?php
		   		}
		   		wp_reset_query();
		   	}
?>
				</div>
			</div>
		</div>
<?php
		}
	}

	public function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = esc_html($new_instance['title']);
		$instance['posts_per_page'] = (int) $new_instance['posts_per_page'];
		return $instance;
	}

	public function form($instance) {
		$title = isset($instance['title']) ? esc_html($instance['title']) : 'Podobné články';
		$posts_per_page = isset($instance['posts_per_page']) ? (int) $instance['posts_per_page'] : 5;
		?>
		<p>
			<label for="<?php echo $this->get_field_name('title'); ?>"><?php _e('Nadpis:'); ?></label>
			<input class="widefat" 
				id="<?php echo $this->get_field_id('title'); ?>" 
				name="<?php echo $this->get_field_name('title'); ?>"
				type="text" value="<?php echo $title;?>">
			<label for="<?php echo $this->get_field_name('posts_per_page'); ?>"><?php _e('Počet článkov:'); ?></label>
			<input class="widefat" 
				id="<?php echo $this->get_field_id('posts_per_page'); ?>" 
				name="<?php echo $this->get_field_name('posts_per_page'); ?>"
				type="number" value="<?php echo $posts_per_page;?>">
		</p>
		<?php
	}
}