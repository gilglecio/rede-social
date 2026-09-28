<script type="text/javascript">
$(function(){
	$('#enviarfotos').click(function(){
		var arquivos = $('#file_upload')[0].files;
		var pendentes = arquivos.length;

		if(!pendentes) return false;

		$('#statusupload').html('Enviando ' + pendentes + ' foto(s)...');

		$.each(arquivos, function(i, arquivo){
			var dados = new FormData();
			dados.append('fotos', arquivo);
			dados.append('album', <?php echo (int)$_GET['aid']; ?>);
			dados.append('uid', <?php echo (int)$idDaSessao ?>);

			var xhr = new XMLHttpRequest();
			xhr.open('POST', 'php/uploadfotos.php');
			xhr.onloadend = function(){
				if(--pendentes == 0){
					window.location.href="albuns.php?uid=<?php echo $idExtrangeiro ?>&aid=<?php echo (int)$_GET['aid']; ?>";
				}
			};
			xhr.send(dados);
		});

		return false;
	});
});
</script>

<form action="" method="post">
  	<input id="file_upload" name="file_upload" type="file" accept=".jpg,.jpeg,.gif,.png" multiple />
  	<p><a id="enviarfotos" href="javascript:void(0);">Fazer Upload</a> <span id="statusupload"></span></p>
</form>
