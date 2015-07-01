<?php
class CL_Widget_User_Widget extends WP_Widget {

	public function __construct() {
		$widget_ops = array('classname' => 'citronlab_widget_user', 'description' => __( "User widget.") );
		parent::__construct('citronlab-user', 'CitronUser', $widget_ops);
		$this->alt_option_name = 'citronlab_widget_user';
	}

	protected $colors = array(
		'dark' => 'Tmavá',
		'light' => 'Svetlá'
	);

	public function widget( $args, $instance ) {
		$user = null;
		if(is_single()) {
			$user = get_userdata(get_the_author_meta('ID'));
		} elseif(is_author()) {
			$user = get_queried_object();
		}
?>
		<div class="widget <?php echo $instance['color']; ?> meta">
			<div class="widget-head">
				<?php echo $instance['title']; ?>
			</div>
			<div class="widget-body">
				<div class="col-xs-6 col-sm-8 col-md-12">
					<div class="row">
						<div class="col-xs-12 col-sm-6 col-md-8">
							<div class="nick">
								<a href="<?php echo get_author_posts_url($user->ID);?>"><?php echo $user->display_name;?></a>
							</div>
							<div class="role">
								<?php
									echo implode(', ', translate_roles($user->roles)); 
								?>
							</div>
						</div>
						<hr class="visible-xs">
						<?php if($instance['show_level']): ?>
						<div class="col-xs-6 col-sm-6 col-md-4">
							<?php ob_start();?>
								<b>Level:</b> Admin 
								<div class='progress'>
									<div class='progress-bar' role='progressbar' aria-valuenow='60' aria-valuemin='0' aria-valuemax='100' style='width: 89%;'>89%</div>
								</div>
								<b>Exp:</b> 1800/2020
							<?php $level =  @ob_get_clean(); ?>
							<div class="rank lvl-admin"
								data-toggle="popover" 
								data-placement="top"
								data-html="true"
								data-trigger="hover"
								data-content="<?php echo $level; ?>"></div>
						</div>
						<div class="col-xs-6 col-sm-12 visible-xs visible-sm">
							<?php echo $level; ?>
						</div>
						<?php endif; ?>
					</div>
				</div>

				<hr class="visible-lg visible-md">

				<div class="col-xs-6 col-sm-4 col-md-12 text-center">
					<?php echo get_avatar($user->ID, 192); ?>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
<?php
	}

	public function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = esc_html($new_instance['title']);
		$instance['show_level'] = (bool) $new_instance['show_level'];
		$instance['color'] = esc_html($new_instance['color']);
		return $instance;
	}

	public function form($instance) {
		$show_level = isset($instance['show_level']) ? (bool) $instance['show_level'] : false;
		$title = isset($instance['title']) ? esc_html($instance['title']) : '';
		$color = isset($instance['color']) ? esc_html($instance['color']) : '';
		?>
		<p>
			<label for="<?php echo $this->get_field_name('title'); ?>"><?php _e( 'Nadpis:' ); ?></label>
			<input class="widefat" 
				id="<?php echo $this->get_field_id('title'); ?>" 
				name="<?php echo $this->get_field_name('title'); ?>"
				type="text" value="<?php echo $title;?>">
		</p>
		<p>
			<input class="checkbox" 
				type="checkbox" <?php checked($show_level); ?> 
				id="<?php echo $this->get_field_id('show_level'); ?>" 
				name="<?php echo $this->get_field_name('show_level'); ?>" />
			<label for="<?php echo $this->get_field_name('show_level'); ?>"><?php _e( 'Ukázať level?' ); ?></label>
		</p>
		<p>
			<label for="<?php echo $this->get_field_name('color'); ?>"><?php _e('Farebná schéma'); ?>:</label>
			<select class="widefat" id="<?php echo $this->get_field_id('color'); ?>" name="<?php echo $this->get_field_name('color');?>">
			<?php foreach($this->colors as $key=>$col):?>
				<option 
					value="<?php echo $key; ?>"
					<?php selected($color, $key);?>>
					<?php echo $col; ?>
				</option>
			<?php endforeach;?>
			</select>
		</p>
		<?php
	}
}