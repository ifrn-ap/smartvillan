<div class="row">
	<div class="col-md-12">
		<h3 class="text-center"><?php if($_GET['acao']=='atualizar-material') echo 'Atualizar Material'; else echo 'Cadastrar Material'; ?>
		</h3><hr>		
		<form method="POST" action="views.php">
			<input type="hidden" name="acao" value="<?php if($_GET['acao']=='atualizar-material') echo 'up-material'; else echo 'add-material' ?>">
			<input type="hidden" name="idmaterial" value="<?php if(isset($row['idmaterial'])) echo $row['idmaterial']; ?>">
			<div class="form-group">
				<label for="inputEmail3" class="col-sm-1 control-label">
					Categoria:
				</label>
				<div class="col-sm-11">
					<select class="form-control" name="categoria" required>
						<option value="<?php if(isset($row['categoria_idcategoria'])) echo $row['categoria_idcategoria']; ?>"><?php if(isset($row['categoria_idcategoria'])) echo $row['nome'];?></option>
						<?php 
	                        $categoria = $_POST['categoria'];
	                        while($rows = $categoria->fetch_assoc()){
	                            echo '
	                            <option value="'.$rows['idcategoria'].'">
	                                '.$rows['nome'].'
	                            </option>';
	                        }
						?>
					</select><br>
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
					Origem:
				</label>
				<div class="col-sm-11">
					<input class="form-control" type="text" name="origem" value="<?php if(isset($row['origem'])) echo $row['origem']; ?>" required><br>
				</div>
			</div>
			<div class="form-group">
				<label for="inputEmail3" class="col-sm-1 control-label">
					Marca:
				</label>
				<div class="col-sm-11">
					<input class="form-control" type="text" name="marca" value="<?php if(isset($row['marca'])) echo $row['marca']; ?>" required><br>
				</div>
			</div>
			<div class="text-center">
				<input class="btn btn-primary" type="submit" value="<?php if($_GET['acao']=="atualizar-material") echo 'Atualizar'; else echo 'Cadastrar' ?>">
			</div>
		</form>
	</div>
</div>
