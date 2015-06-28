
jQuery(document).ready(function() {
	initialize_ace();
	initialize_lang_select();
	
});
function initialize_lang_select() {
	jQuery('.language-select').on('change', function() {
		var x = jQuery(this).find('+.code-snippet div.editor');
		x[0].env.editor.session.setMode("ace/mode/" + jQuery(this).val())
	});
}
function initialize_ace() {
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
		console.log(editor);
		editor.setTheme("ace/theme/monokai");
		editor.getSession().setValue(textarea.html());
		editor.getSession().setMode("ace/mode/" + mode);

		jQuery('form#post').submit(function(event) {
			textarea.html(editor.getSession().getValue());
		});
	});
}