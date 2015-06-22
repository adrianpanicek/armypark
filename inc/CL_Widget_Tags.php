<?php
class CL_Widget_Tags extends WP_Widget {

	public function __construct() {
		$widget_ops = array('classname' => 'citronlab_widget_tags', 'description' => __( "Zobrazí tagy.") );
		parent::__construct('citronlab-tags', 'CitronTags', $widget_ops);
		$this->alt_option_name = 'citronlab_widget_tags';
	}

	protected $colors = array(
		'dark' => 'Tmavá',
		'light' => 'Svetlá'
	);

	public function widget($args, $instance) {
		if(!is_single())
			return;
?>
		<div class="widget <?php echo $instance['color']; ?> tags">
			<div class="widget-head">
				<?php echo $instance['title'];?>
			</div>
			<div class="widget-body">
				<ul class="list-group">
					<?php foreach(wp_get_post_tags(get_the_ID()) as $tag): ?>
					<li class="list-group-item"><span class="badge"><?php echo $tag->count;?></span>
						<a href="<?php echo get_tag_link($tag->term_id); ?>"><?php echo $tag->name;?></a>
					</li>
					<?php endforeach;?>
				</ul>
			</div>
		</div>
<?php
	}

	public function update($new_instance, $old_instance) {
		$instance = $old_instance;
		$instance['title'] = esc_html($new_instance['title']);
		$instance['color'] = esc_html($new_instance['color']);
		return $instance;
	}

	public function form($instance) {
		$title = isset($instance['title']) ? esc_html($instance['title']) : 'Tagy';
		$color = isset($instance['color']) ? esc_html($instance['color']) : '';
		?>
		<p>
			<label for="<?php echo $this->get_field_name('title'); ?>"><?php _e('Nadpis:'); ?></label>
			<input class="widefat" 
				id="<?php echo $this->get_field_id('title'); ?>" 
				name="<?php echo $this->get_field_name('title'); ?>"
				type="text" value="<?php echo $title;?>">
		</p>
		<p>
			<label for="<?php echo $this->get_field_name('color'); ?>"><?php _e('Farebná schéma'); ?>:</label>
			<select class="widefat" id="<?php echo $this->get_field_id('color'); ?>" name="<?php echo $this->get_field_name('color');?>">
			<?php foreach($this->colors as $key=>$col):?>
				<option 
					value="<?php echo $key; ?>"
					<?php selected($instance['color'], $key);?>>
					<?php echo $col; ?>
				</option>
			<?php endforeach;?>
			</select>
		</p>
		<?php
	}
}