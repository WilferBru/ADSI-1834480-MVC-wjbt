<form action="index.php?c=<?=Database::encryptor('encrypt','user')?>&a=<?=Database::encryptor('encrypt','uploadFile')?>" method="POST" enctype="multipart/form-data">
	<div class="form-group">
		<div class="form-group">
			<label class="exampleFormControlFile">Seleccione el documento a subir</label>
			<input type="file" name="file" id="file">
			<input type="hidden" name="id" value="<?=$id?>">
			<br>
			<button type="submit" class="btn btn-success">
				Subir
			</button>
		</div>
	</div>
</form>