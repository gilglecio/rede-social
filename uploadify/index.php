<link href="uploadify/uploadify.css" type="text/css" rel="stylesheet" />
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="uploadify/swfobject.js"></script>
<script type="text/javascript" src="uploadify/jquery.uploadify.v2.1.4.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	$('#file_upload').uploadify({
		'uploader'    : 'uploadify/uploadify.swf',
		'script'      : 'uploadify/uploadify.php',
		'cancelImg'   : 'uploadify/cancel.png',
		'folder'      : 'uploads',
		'fileDataName': 'fotos',
		'multi'       : true,
		'fileExt'     : '*.jpg;*.gif;*.png',
		'buttonText'  : 'BUSCAR FOTOS',
		'width'       : 500,
		'onAllComplete' : function(event,data){
			alert(data.filesUploaded + ' fotos adicionadas com sucesso!');
		}
	});
});
</script>

<form action="" method="post">
  	<input id="file_upload" name="file_upload" type="file" />
  	<p><a href="javascript:$('#file_upload').uploadifyUpload();">adicionar</a></p>
</form>