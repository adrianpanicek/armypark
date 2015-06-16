<?php
add_filter( 'pre_option_link_manager_enabled', '__return_true' );
function cl_scripts() {
	//wp_enqueue_script( '$handle', '$src', array( 'jquery' ), false, false);
}

add_action('wp_enqueue_scripts', 'cl_scripts');

function cl_styles() {
	wp_register_style('bootstrap.min', get_template_directory_uri() . '/css/bootstrap.min.css' );
	wp_register_style('font-awesome.min', get_template_directory_uri() . '/css/font-awesome.min.css' );
	wp_register_style('bootstrap-theme.min', get_template_directory_uri() . '/css/bootstrap-theme.min.css' );

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
			'footer' => __( 'Footer Menu' )
		)
	);
}
add_action( 'init', 'cl_register_menus' );

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