<div class="row">
	<div class="col-md-12">
		<h3 class="text-center"><?php if($_GET['acao']=='atualizar-categoria') echo 'Atualizar Categoria'; else echo 'Cadastrar Categoria'; ?>
		</h3><hr>
		<form method="POST" action="views.php">
			<input type="hidden" name="acao" value="<?php if($_GET['acao']=='atualizar-categoria') echo 'up-categoria'; else echo 'add-categoria'; ?>">
			<input type="hidden" name="id_categoria" value="<?php if(isset($row['idcategoria'])) echo $row['idcategoria']; ?>">
			<div class="form-group">
				<label for="inputEmail3" class="col-sm-1 control-label">
					Nome:
				</label>
				<div class="col-sm-11">
					<input class="form-control" type="text" name="nome" value="<?php if(isset($row['nome'])) echo $row['nome']; ?>" required><br>
				</div>
			</div>
            <div class="form-group">
				<label for="inputEmail3" class="col-sm-1 control-label">
					Descrição:
				</label>
				<div class="col-sm-11">
					<input class="form-control" type="text" name="descricao" value="<?php if(isset($row['descricao_categoria'])) echo $row['descricao_categoria']; ?>" required><br>
				</div>
			</div>
			<div class="text-center">
				<input class="btn btn-primary" type="submit" value="<?php if($_GET['acao']=="atualizar-categoria") echo 'Atualizar'; else echo 'Cadastrar' ?>">
			</div>
		</form>
	</div>
</div>
<br><br>