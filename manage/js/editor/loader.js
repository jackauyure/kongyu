var editorSets = [];
editorSets['default'] = [
		'source', '|', 'fullscreen', 'undo', 'redo', 'print', 'cut', 'copy', 'paste',
		'plainpaste', 'wordpaste', '|', 'justifyleft', 'justifycenter', 'justifyright',
		'justifyfull', 'insertorderedlist', 'insertunorderedlist', 'indent', 'outdent', 'subscript',
		'superscript', '|', 'selectall', '-',
		'title', 'fontname', 'fontsize', '|', 'textcolor', 'bgcolor', 'bold',
		'italic', 'underline', 'strikethrough', 'removeformat', '|', 'image',
		'flash', 'media', 'advtable', 'hr', 'emoticons', 'link', 'unlink'
	];

editorSets['basic'] = [
		'source', '|', 'fullscreen', 'undo', 'redo', 'cut', 'copy', 'paste',
		'plainpaste', 'wordpaste', '|', 'justifyleft', 'justifycenter', 'justifyright',
		'justifyfull', 'insertorderedlist', 'insertunorderedlist', '|', 'selectall', '-',
		'title', 'fontname', 'fontsize', '|', 'textcolor', 'bgcolor', 'bold',
		'italic', 'underline', 'strikethrough', '|', 'image',
		'advtable', 'hr',  'link', 'unlink'
	];

editorSets['mini'] = ['title','fontname', 'fontsize', '|', 'textcolor', 'bgcolor', 'bold', 'italic', 'underline',
					  '|','insertorderedlist', 'insertunorderedlist'];

editorSets['inline'] = ['source', '|','fontname', 'fontsize', '|', 'textcolor', 'bgcolor', 'bold', 'italic', 'underline','|', 'link', 'unlink'];

editorSets['title'] = ['textcolor'];

var loadEditor = function(container, type){
	switch(type){
		case 'title':
		KE.show({
			id : container,
			resizeMode : 0,
			allowPreviewEmoticons : false,
			allowUpload : false,
			filterMode: true,
			htmlTags:{
					font : ['color'],
					span : ['style']

			},
			items : editorSets[type]
		});
		break;

		case 'inline':
		KE.show({
			id : container,
			resizeMode : 0,
			allowPreviewEmoticons : false,
			allowUpload : false,
			filterMode: true,
			htmlTags:{
					font : ['color'],
					span : ['style'],
					a : ['href', 'target', 'name']
			},
			items : editorSets[type]
		});

		break;

		default:
		KE.show({
			id : container,
			resizeMode : 1,
			allowPreviewEmoticons : false,
			allowUpload : false,
			items : editorSets[type]
		});

	}

}