<script type="text/javascript" src="js/jcrop.js"></script>

<script type="text/javascript">
$(function(){
	$('#cropbox').Jcrop({
		aspectRatio: 0,
		onSelect: updateCoords
	});
	
	function updateCoords(c){
		$('#x').val(c.x);
		$('#y').val(c.y);
		$('#w').val(c.w);
		$('#h').val(c.h);
	};
});
</script>
<div id="content-crop">
<img src="uploads/usuarios/<?php echo $user_imagem ?>"  id="cropbox" />
<form name="crop" method="post" enctype="multipart/form-data" action="php/crop.php">
	<input type="hidden" name="imagem" value="<?php echo $user_imagem ?>" />
    <input type="hidden" name="x" id="x" />
    <input type="hidden" name="y" id="y" />
    <input type="hidden" name="w" id="w" />
    <input type="hidden" name="h" id="h" />
    <input type="submit" value="salvar" name="salvar" />
</form>
</div><!--content-crop-->