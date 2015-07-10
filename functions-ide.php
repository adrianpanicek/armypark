<?php 
function cl_admin_head() {
	if(is_editor()) {?>
		<style>
			.editor-wrapper {
				position: relative;
				height: 120px;
			}
			.editor {
				height: 180px;
				width: 100%;
			}
			.editor .ace_print_margin {
				width: 0 !important;
			}
			.editor .ace_active_line {
				background: none !important;
			}
			#cl_code .inside {
				min-height: 200px;
			}
			.code-snippet {
				max-height: 200px;
			}
		</style>
<?php }
}
add_action('admin_head', 'cl_admin_head');

function cl_code_meta_box() {
	$screens = array( 'post', 'page' );
	$o = 0;
	foreach($screens as $screen) {
		add_meta_box(
			'cl_code',
			__('Code'),
			'cl_code_meta_box_callback',
			$screen,
			'normal',
			'high'
		);
		$o++;
	}
}
//add_action('add_meta_boxes', 'cl_code_meta_box');

function cl_code_meta_box_callback($post) {
	$snippets = get_post_meta($post->ID, 'cl_code_meta_box');
	$snippets = (isset($snippets[0]) && is_array($snippets[0]) &&count($snippets[0]) > 0)? $snippets[0] : false;
	$last_key = -1;
	if($snippets !== false) {
		foreach($snippets as $key => $snippet) {
			$last_key = $key;
			$lang = (isset($snippet['lang']))? $snippet['lang']: 'php';
			$text = (isset($snippet['text']))? $snippet['text']: '';
?>
		<h3>Snippet: ID <?php echo $key;?></h3>
		<?php echo the_language_select($key, $lang); ?>
		<div class="code-snippet">
			<textarea data-editor="<?php echo $lang ?>" name="cl_editor_<?php echo $key; ?>" cols="45" class="editor"><?php echo esc_textarea($text); ?></textarea>
		</div>	
<?php
		}
	}
	$key = $last_key+1;
	
?>
	<h3>Nový Snippet: ID <?php echo $key;?></h3>
	<?php echo the_language_select($key, 'php'); ?>
	<div class="code-snippet">
		<textarea data-editor="php" name="cl_editor_<?php echo $key; ?>" cols="45" class="editor"></textarea>
	</div>
	<input class="button-primary" type="submit" name="add-snippet" value="Ulož a pridaj snippet">
<?php
}

function cl_code_meta_box_save($post_id) {
	if(defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
		return;
	}
	if(isset($_POST['post_type']) && 'page' == $_POST['post_type']) {
		if(!current_user_can('edit_page', $post_id)) {
			return;
		}
	} else {
		if(!current_user_can('edit_post', $post_id)) {
			return;
		}
	}
	$snippets = array();
	foreach($_POST as $key => $value) {
		if(strpos($key, 'cl_editor_language_') !== false) {
			$akey = str_replace('cl_editor_language_', '', $key);
			$snippets[$akey]['lang'] = $value;
		} elseif(strpos($key, 'cl_editor_') !== false) {
			$akey = str_replace('cl_editor_', '', $key);

			if(strlen(trim($value)) == 0) {
				continue;
			}

			$snippets[$akey]['text'] = $value;
		}
	}
	foreach($snippets as $k=>$v) {
		if(!isset($v['text']))
			unset($snippets[$k]);
	}
	delete_post_meta($post_id, 'cl_code_meta_box');
	update_post_meta($post_id, 'cl_code_meta_box', $snippets);
}
add_action('save_post', 'cl_code_meta_box_save');

function is_editor() {
	if(isset($_GET['action']) && $_GET['action'] == 'edit')
		return true;
	return false;
}

function cl_hljs_footer() {
?>
	<script type="text/javascript">
		hljs.initHighlightingOnLoad();
		jQuery(document).ready(function() {
			
		});
	</script>
<?php
}
add_action('wp_footer', 'cl_hljs_footer');

$hljs_iterator = 0;
function cl_register_code_shortcode($atts, $content = null) {
	global $post;
	global $hljs_iterator;
	$res = '';
	if($content == null || strlen(trim($content)) <= 0) {
		if(isset($atts['id'])) {
			$res = get_post_meta($post->ID, 'cl_code_meta_box');
			$res = $res[0][$atts['id']];
			$text = $res['text'];
			$lang = $res['lang'];
		} else {
			$snippets = get_post_meta($post->ID, 'cl_code_meta_box');
			$snippets = $snippets[0];
			$l_iterator = 0;
			foreach($snippets as $key => $snippet) {
				if($hljs_iterator == $l_iterator) {
					$text = $snippet['text'];
					$lang = $snippet['lang'];
					$hljs_iterator++;
					break;
				}
				$l_iterator++;
			}
		}
	} else {
		$text = trim($content);
		$lang = (isset($atts['lang']))? $atts['lang'] : 'php';
		$text = preg_replace('/^(?:<br\s*\/?>\s*)+/', '', $text);
	}
	$lang = cl_translate_ace2hljs_lang($lang);
	ob_start();?>
		<pre><code class="<?php echo $lang; ?>"><?php echo esc_html($text); ?></code></pre>
<?php $res = ob_get_clean();
	return $res;
	return $content;
}
add_shortcode('code', 'cl_register_code_shortcode');

function cl_register_c_shortcode($atts, $content = null) {
	$lang = (isset($atts['lang']))? $atts['lang'] : 'php';
	$lang = cl_translate_ace2hljs_lang($lang);
	ob_start();
		?><pre><code class="<?php echo $lang; ?>"><?php echo esc_html($content); ?></code></pre><?php
	$res = ob_get_clean();
	return $res;
}
add_shortcode('c', 'cl_register_c_shortcode');

function cl_translate_ace2hljs_lang($lang) {
	switch($lang) {
		case 'c_cpp':
			return 'objectivec';
		case 'csharp':
			return 'cs';
		default:
			return $lang;
	}
}

function the_language_select($id, $selected) {?>
	<select class="language-select" name='cl_editor_language_<?php echo $id; ?>'>
<?php
	$options = array(
		'css' => 'CSS',
		'html' => 'HTML',
		'javascript' => 'JavaScript',
		'php' => 'PHP',
		'sql' => 'SQL',
		'c_cpp' => 'C/C++',
		'csharp' => 'C#',
		'java' => 'Java'
	);
	foreach($options as $key => $option) {
?>	
		<option value="<?php echo $key; ?>" <?php echo ($key==$selected)? 'selected':'';?>><?php echo $option;?></option>
<?php
	}
?>
	</select>
<?php
}