<?php
class CL_Widget_Breadcrumbs extends WP_Widget {
	public function __construct() {
		$widget_ops = array('description' => __( "CitronCrumb" ) );
		parent::__construct('cl-breadcrumbs', __('CitronCrumb'), $widget_ops);
	}

	protected $iterator = 0;

	public function the_breadcrumb($name, $link = false) {
?>
		<li <?php echo (!$link)?'class="active"':''; ?>
			itemprop="itemListElement" 
			itemscope 
			itemtype="http://schema.org/ListItem">
				<?php if($link) {?>
				<a itemprop="item" href="<?php echo $link; ?>">
				<?php } ?>
					<span itemprop="name"><?php echo $name ?></span>
				<?php if($link) {?>
				</a>
				<?php } ?>
				<meta itemprop="position" content="<?php echo ++$this->iterator;?>" />
		</li>
<?php
	}

	public function widget( $args, $instance ) {
		$id = '';
		$class = 'breadcrumbs';
		global $post, $wp_query;

		if(is_single() || is_category()) {
			$category_tree = array();
			$category = get_the_category();

			if(is_single()) {
				$category = $category[0];
			} else {
				$category = get_queried_object();
			}

			$iter = $category;
			do {
				$category_tree[] = $iter;
				$pid = $iter->category_parent;
				$iter = get_category($pid);
			} while($pid > 0);
			$category_tree = array_reverse($category_tree);
		} 

		if(is_front_page() || is_page())
			return;
		$i = 1;
?>
	<section class="breadcrumb-wrap">
		<div class="container">
			<ol class="breadcrumb" itemscope itemtype="http://schema.org/BreadcrumbList">
<?php
				$this->the_breadcrumb('Home', get_home_url());

				if(is_single()) {
					foreach($category_tree as $cat) {
						$this->the_breadcrumb($cat->cat_name, get_category_link($cat->term_id));
	 				}
	 				$this->the_breadcrumb(get_the_title());
				} else if(is_category()) {
					foreach($category_tree as $cat) {
						$this->the_breadcrumb($cat->cat_name, get_category_link($cat->term_id));
	 				}
				} else if(is_tag()) {
					$tag = get_queried_object();
					$this->the_breadcrumb("#".$cat->tag_name);
				} else if(is_day()) {
					$date = explode(".", get_the_modified_date("d.m.Y"));
					$this->the_breadcrumb($date[2], get_year_link($date[2]));
					$this->the_breadcrumb($date[1], get_month_link($date[2], $date[1]));
					$this->the_breadcrumb($date[0]);
				} else if(is_month()) {
					$date = explode(".", get_the_modified_date("d.m.Y"));
					$this->the_breadcrumb($date[2], get_year_link($date[2]));
					$this->the_breadcrumb($date[1]);
				} else if(is_year()) {
					$date = explode(".", get_the_modified_date("d.m.Y"));
					$this->the_breadcrumb($date[2]);
				} else if(is_author()) {
					$author = get_queried_object();
					$this->the_breadcrumb("@".$author->display_name);
				} else if(is_404()) {
					$this->the_breadcrumb(404);
				}

				if(is_search()) {
					$search = esc_attr(get_search_query());
					$widget = '';

					ob_start();
					the_widget('WP_Widget_Search');
					$widget = ob_get_clean();

					$this->the_breadcrumb($widget);
				} 

				if(get_query_var('paged')) {
					$page = get_query_var('paged');
					$this->the_breadcrumb($page);
				}
?>			
			</ol>
		</div>
	</section>
<?php
	}

}