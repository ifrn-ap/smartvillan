<div class="row">
	<div class="col-md-12">
		<h3 class="text-center"><?php if($_GET['acao']=='atualizar-vacina') echo 'Atualizar Vacina'; else echo 'Cadastrar Vacina'; ?>
		</h3><hr>
		<form method="POST" action="views.php">
			<input type="hidden" name="acao" value="<?php if($_GET['acao']=='atualizar-vacina') echo 'up-vacina'; else echo 'add-vacina'; ?>">
			<input type="hidden" name="id_vacina" value="<?php if(isset($row['idvacina'])) echo $row['idvacina']; ?>">
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
					<input class="form-control" type="text" name="descricao" value="<?php if(isset($row['descricao'])) echo $row['descricao']; ?>" required><br>
				</div>
			</div>
			<div class="form-group">
				<label for="inputEmail3" class="col-sm-1 control-label">
					Destinação:
				</label>
				<div class="col-sm-11">
					<input class="form-control" type="text" name="destinacao" value="<?php if(isset($row['destinacao'])) echo $row['destinacao']; ?>" required><br>
				</div>
			</div>
			<div class="text-center">
				<input class="btn btn-primary" type="submit" value="<?php if($_GET['acao']=="atualizar-vacina") echo 'Atualizar'; else echo 'Cadastrar' ?>">
			</div>
		</form>
	</div>
</div>
