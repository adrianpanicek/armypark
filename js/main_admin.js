jQuery(document).ready(function() {
	jQuery('textarea[data-editor]').each(function () {
		var textarea = jQuery(this);

		var mode = textarea.data('editor');

		var editDiv = jQuery('<div>', {
			position: 'absolute',
			'class': textarea.attr('class'),
		}).insertBefore(textarea);

		textarea.css('visibility', 'hidden');

		var editor = ace.edit(editDiv[0]);
		editor.renderer.setShowGutter(false);
		editor.setTheme("ace/theme/monokai");
		editor.getSession().setValue(textarea.html());
		editor.getSession().setMode("ace/mode/" + mode);

		jQuery('form#post').submit(function(event) {
			textarea.html(editor.getSession().getValue());
		});
	});
});