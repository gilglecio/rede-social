<link href="uploadify/uploadify.css" type="text/css" rel="stylesheet" />
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="uploadify/swfobject.js"></script>
<script type="text/javascript" src="uploadify/jquery.uploadify.v2.1.4.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	$('#file_upload').uploadify({
		'uploader'    : 'uploadify/uploadify.swf',
		'script'      : 'php/uploadfotos.php?album=',
		'cancelImg'   : 'uploadify/cancel.png',
		'folder'      : 'uploads/fotos',
		'fileDataName': 'fotos',
		'multi'       : true,
		'scriptData'  : {'album':<?php echo (int)$_GET['aid']; ?>, 'uid':<?php echo $idDaSessao ?>},
		'fileExt'     : '*.jpg;*.gif;*.png',
		'buttonText'  : 'Buscar fotos',
		'width'       : 250,
		'onAllComplete' : function(event,data){
			window.location.href="albuns.php?uid=<?php echo $idExtrangeiro ?>&aid=<?php echo (int)$_GET['aid']; ?>";
		}
	});
	
	
});
</script>

<form action="" method="post">
  	<input id="file_upload" name="file_upload" type="file" />
  	<p><a href="javascript:$('#file_upload').uploadifyUpload();">Fazer Upload</a></p>
</form>