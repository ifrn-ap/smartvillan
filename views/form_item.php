<div class="row">
	<div class="col-md-12">
		<h3 class="text-center"><?php if($_GET['acao']=='atualizar-item') echo 'Atualizar Item'; else echo 'Cadastrar Item'; ?>
		</h3><hr>		
		<form method="POST" action="views.php">
			<input type="hidden" name="acao" value="<?php if($_GET['acao']=='atualizar-item') echo 'up-item'; else echo 'add-item'; ?>">
			<input type="hidden" name="iditem" value="<?php if(isset($row['iditem'])) echo $row['iditem']; ?>">
			<div class="form-group">
				<label for="inputEmail3" class="col-sm-1 control-label">
					Material:
				</label>
				<div class="col-sm-11">
					<select class="form-control" name="material" required>
						<option value="<?php if(isset($row['material_idmaterial'])) echo $row['material_idmaterial']; ?>"><?php if(isset($row['material_idmaterial'])) echo $row['descricao'];?></option>
						<?php 
							$material = $_POST['material'];
	                        while($rows = $material->fetch_assoc()){
	                            echo'
	                                <option value="'.$rows['idmaterial'].'">
	                                    '.$rows['descricao'].'
	                                </option>
	                            ';
	                        }
						?>
					</select><br>
				</div>
			</div>
			<div class="form-group">
				<label for="inputEmail3" class="col-sm-1 control-label">
					Validade:
				</label>
				<div class="col-sm-11">
					<input class="form-control" type="date" name="validade" value="<?php if(isset($row['validade'])) echo $row['validade']; ?>" required><br>
				</div>
			</div>
			<div class="form-group">
				<label for="inputEmail3" class="col-sm-1 control-label">
					Cadastro:
				</label>
				<div class="col-sm-11">
					<input class="form-control" type="date" name="dt_cadastro" value="<?php if(isset($row['data_cadastro'])) echo $row['data_cadastro']; else echo date('Y').'-'.date('m').'-'.date('d'); ?>" required><br>
				</div>
			</div>
			<input class="form-control" type="hidden" name="disponibilidade" value="<?php if(isset($row['disponibilidade'])) echo $row['disponibilidade']; else echo 1; ?>" required>
			<div class="form-group">
				<label for="inputEmail3" class="col-sm-1 control-label">
					Valor:
				</label>
				<div class="col-sm-11">
					<input class="form-control" type="text" name="valor" value="<?php if(isset($row['valor'])) echo $row['valor']; ?>"  required><br>
				</div>
			</div>
			<div class="text-center">
				<input class="btn btn-primary" type="submit" value="<?php if($_GET['acao']=="atualizar-item") echo 'Atualizar'; else echo 'Cadastrar' ?>">
			</div>
		</form>
	</div>
</div>
