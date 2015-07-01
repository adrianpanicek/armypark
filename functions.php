<?php
require_once(__DIR__.'/inc/CL_Widget_Recent_Posts.php');
require_once(__DIR__.'/inc/CL_Widget_Links.php');
require_once(__DIR__.'/inc/CL_Widget_Breadcrumbs.php');
require_once(__DIR__.'/inc/CL_Widget_User_Widget.php');
require_once(__DIR__.'/inc/CL_Widget_Related_Posts.php');
require_once(__DIR__.'/inc/CL_Widget_Tags.php');
require_once(__DIR__.'/inc/tax-meta/tax-meta-class.php');

add_theme_support( 'post-thumbnails' );
add_filter( 'pre_option_link_manager_enabled', '__return_true' );

function cl_scripts() {
	wp_enqueue_script('jquery', get_stylesheet_directory_uri() . '/js/jquery.min.js');
	wp_enqueue_script('bootstrap', get_stylesheet_directory_uri() . '/js/bootstrap.min.js', array('jquery'));
	wp_enqueue_script('hljs', get_stylesheet_directory_uri() . '/js/highlight.pack.js', array('jquery'));
}
add_action('wp_enqueue_scripts', 'cl_scripts');

function cl_admin_scripts() {
	if(is_editor()) {
		wp_enqueue_script('jquery', get_stylesheet_directory_uri() . '/js/jquery.min.js');
		wp_enqueue_script('ace', get_stylesheet_directory_uri() . '/js/ace/ace.js', array('jquery'));
		wp_enqueue_script('main_admin', get_stylesheet_directory_uri() . '/js/main_admin.js', array('ace'));
	}
}
add_action('admin_enqueue_scripts', 'cl_admin_scripts');

function cl_styles() {
	wp_register_style('bootstrap.min', get_template_directory_uri() . '/css/bootstrap.min.css' );
	wp_register_style('font-awesome.min', get_template_directory_uri() . '/css/font-awesome.min.css' );
	wp_register_style('bootstrap-theme.min', get_template_directory_uri() . '/css/bootstrap-theme.min.css' );
	wp_register_style('monokai-sublime', get_template_directory_uri() . '/css/monokai_sublime.css' );

	wp_enqueue_style('monokai-sublime');
	wp_enqueue_style('bootstrap.min');
	wp_enqueue_style('bootstrap-theme.min');
	wp_enqueue_style('font-awesome.min');
	wp_enqueue_style('style', get_stylesheet_uri());
}
add_action('wp_enqueue_scripts', 'cl_styles');

function cl_register_menus() {
	register_nav_menus(
		array(
			'header' => __( 'Header Menu' ),
			'footer1' => __( 'Footer Menu1' ),
			'footer2' => __( 'Footer Menu2' ),
			'footer3' => __( 'Footer Menu3' ),
			'footer4' => __( 'Footer Menu4' ),
		)
	);
}
add_action( 'init', 'cl_register_menus' );

function cl_register_category_meta() {
	$config = array(
		'id' => 'citron-category', 
		'title' => 'CitronCategory',
		'pages' => array('category'),
		'fields' => array(),
		'context' => 'normal',
		'local_images' => false,
		'use_with_theme' => get_template_directory_uri() . '/inc/tax-meta'
	);
	$cl_meta = new Tax_Meta_Class($config);
	$cl_meta->addImage('category-default-image', array('name'=> 'Default Image'));
	$cl_meta->addColor('category-color',array('name'=> 'Category Color'));
	$cl_meta->Finish();
}
add_action( 'init', 'cl_register_category_meta' );

function cl_register_settings() {
	register_setting('cl_template', 'index_categories');
}
add_action('admin_init', 'cl_register_settings');

function cl_register_menu() {
	add_options_page('CitronLab', 'CitronLab settings', 'manage_options', 'cl-settings', 'cl_menu_template');
}
add_action('admin_menu', 'cl_register_menu');

function cl_menu_template() {
	?>
	<div class="wrap">
		<?php screen_icon(); ?>
		<h2>CitronLab Settings</h2>
		<form action="options.php" method="POST">
			<?php settings_fields('cl_template'); ?>
			<?php @do_settings_fields('cl_template'); ?>
			<?php print_r(get_option('index_categories', 'null'));?>
			<table class="form-table">
				<tr valign="top">
					<th scope="row"><label for="index_categories[]"><?php _e('Index Categories'); ?></label></th>
					<td>
						<select multiple='multiple' name='index_categories[]' style='width: 99%;'>
							<?php foreach(get_categories() as $cat) {?>
								<option value="<?php echo $cat->cat_ID; ?>"><?php echo $cat->name; ?></option>
							<?php } ?>
						</select>
					</td>
				</tr>
			</table>
			<?php submit_button(); ?>
		</form>
	</div>
	<?php
}

function cl_excerpt_length($length) {
	return 120;
}
add_filter( 'excerpt_length', 'cl_excerpt_length', 999 );

function cl_widgets_init() {
	register_sidebar(array(
		'name'          => 'Home Articles sidebar',
		'id'            => 'home_articles',
		'before_widget' => '<div class="col-sm-5 news-list">',
		'after_widget'  => '</div>'
	));
	register_sidebar(array(
		'name'          => 'Home Links sidebar',
		'id'            => 'home_links',
		'before_widget' => '<div class="col-sm-2 news-list">',
		'after_widget'  => '</div>'
	));
	register_sidebar(array(
		'name'          => 'Footer Links sidebar',
		'id'            => 'footer-sidebar',
		'before_widget' => '<div class="widget %2$s col-xs-6 col-md-3">',
		'after_widget'  => '</div>'
	));
	register_sidebar(array(
		'name'          => 'Header Search Bar',
		'id'            => 'header-search-bar',
		'before_widget' => '<div class="widget %2$s">',
		'after_widget'  => '</div>'
	));
	register_sidebar(array(
		'name'          => 'BreadCrumb',
		'id'            => 'breadcrumb',
		'before_widget' => '',
		'after_widget'  => ''
	));
	register_sidebar(array(
		'name'          => 'Post Meta',
		'id'            => 'post-meta',
		'before_widget' => '',
		'after_widget'  => ''
	));
	register_widget('CL_Widget_Tags');
	register_widget('CL_Widget_Related_Posts');
	register_widget('CL_Widget_User_Widget');
	register_widget('CL_Widget_Breadcrumbs');
	register_widget('CL_Widget_Links');
	register_widget('CL_Widget_Recent_Posts');
}
add_action('widgets_init', 'cl_widgets_init');

function cl_strip_shortcode($args, $content="") {
?>
<div class="strip <?php echo (isset($args['background']))? $args['background']: 'background-white'; ?>">
	<div class="container">
		<section class="row offset elegant">
			<?php if(isset($args['triangle'])) { ?>
			<div class="triangle <?php echo $args['triangle']; ?> visible-lg"></div>
			<?php } ?>
			<div class="col-sm-7">
				<?php echo $content; ?>
				<?php if(isset($args['link1'])) { ?>
				<ul class="list-inline list-checkmark"><?php
					for($i = 1; isset($args['link'.$i]); $i++) { 
						$s = explode(' ', $args['link'.$i]);
					?>
					<li>
						<i class="fa fa-angle-double-right orange fa-fw"></i>
						<a href="<?php echo $s[1]; ?>"><?php echo $s[0];?></a>
					</li>
					<?php } ?>
				</ul>
				<?php } ?>
			</div>
			<div class="col-sm-5">
				<div class="text-center">
					<img src="<?php echo isset($args['image'])? $args['image']: '';?>" alt>
				</div>
			</div>
		</section>
	</div>
</div>
<?php
}
add_shortcode('cl_strip', 'cl_strip_shortcode');

function get_the_category_thumbnail($cat_id) {
	$cat = get_category($cat_id);
	$img = null;
	$c = $cat;
	while($img == null) {
		$i = get_tax_meta($c->term_id, 'category-default-image');
		if(isset($i['url'])) {
			$img = $i;
		} elseif($c->category_parent) {
			$c = get_category($c->category_parent);
		} else {
			$img = array('url' => false);
		}
	}
	return $img;
}

function cl_comment($comment, $args, $depth) {
	$GLOBALS['comment'] = $comment;
	global $post;
	extract($args, EXTR_SKIP);
?>
	<li class="media">
		<div class="media-left">
			<?php echo get_avatar($comment, 64);?>
		</div>
		<div class="media-body">
			<h4 class="media-heading">
				<a href="<?php echo get_comment_author_link(); ?>">
					<?php comment_author(); ?>
				</a>
			</h4>
			<p><?php echo preg_replace('/^(?:<br\s*\/?>\s*)+/', '', get_comment_text()); ?></p>
			<div class="media-meta clearfix">
				<span class="pull-left">
					<?php 
					$cid = get_comment_ID();
					if($post->post_author == get_comment($cid)->user_id) { ?>
						<small style="color: #a94442;" class="meta">Autor</small><small class="meta"> -</small>
					<?php } ?>
					<small class="meta"><?php comment_date('d.m.Y'); ?></small>
				</span>
				<span class="pull-right"><?php 
					comment_reply_link(
						array_merge($args, array(
							'reply_text' => '<i class="fa fa-reply"></i> Odpovedať',
							'depth' => $depth,
							'max_depth' => $args['max_depth'])
						)
					)?>
				</span>
			</div>
			<div class="clearfix"></div>
		</div>
	</li>
<?php
}

function cl_comment_form_fields($fields) {
	return array();
}
add_filter('comment_form_default_fields', 'cl_comment_form_fields');

function cl_archives_shortcode($atts) {
	$att = '';
	foreach($atts as $key => $at) {
		if($att != '')
			$att .= '&';
		$att .= $key.'='.$at;
	}
    return wp_get_archives($att);
}
add_shortcode( 'archives', 'cl_archives_shortcode' );

include(__DIR__.'/functions-ide.php');
include(__DIR__.'/functions-user.php');