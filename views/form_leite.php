<div class="row">
	<div class="col-md-12">
		<h3 class="text-center"><?php if($_GET['acao']=='atualizar-leite') echo 'Atualizar Ordenha'; else echo 'Registro de Ordenha'; ?>
		</h3><hr>		
		<form method="POST" action="views.php">
			<input type="hidden" name="acao" value="<?php if($_GET['acao']=='atualizar-leite') echo 'up-leite'; else echo 'add-leite'; ?>">
			<input type="hidden" name="idleite" value="<?php if(isset($row['idleite'])) echo $row['idleite']; ?>">
			<div class="form-group">
				<label for="inputEmail3" class="col-sm-1 control-label">
					Animal:
				</label>
				<div class="col-sm-11">
					<select class="form-control" name="animal" required>
						<option value="<?php if(isset($row['animal_idanimal'])) echo $row['animal_idanimal']; ?>"><?php if(isset($row['nome'])) echo $row['nome'];?></option>
						<?php 
							$animal = $_POST['animal'];
	                        while($rows = $animal->fetch_assoc()){
	                        	if($rows['destinacao']=='Lactacao'){
		                            echo'
		                                <option value="'.$rows['idanimal'].'">
		                                    '.$rows['nome'].'
		                                </option>
		                            ';
	                            }
	                        }
						?>
					</select><br>
				</div>
			</div>
			<div class="form-group">
				<label for="inputEmail3" class="col-sm-1 control-label">
					Data:
				</label>
				<div class="col-sm-11">
					<input class="form-control" type="date" name="data" value="<?php if(isset($row['data_de_ordenha'])) echo $row['data_de_ordenha']; else echo date('Y').'-'.date('m').'-'.date('d'); ?>" required><br>
				</div>
			</div>
			<div class="form-group">
				<label for="inputEmail3" class="col-sm-1 control-label">
					Quantidade:
				</label>
				<div class="col-sm-11">
					<input class="form-control" type="number" placeholder="Quantidade em Litros" name="quantidade" value="<?php if(isset($row['quantidade'])) echo $row['quantidade']; ?>" required><br>
				</div>
			</div>
			<div class="text-center">
				<input class="btn btn-primary" type="submit" value="<?php if($_GET['acao']=="atualizar-leite") echo 'Atualizar'; else echo 'Cadastrar' ?>">
			</div>
		</form>
	</div>
</div>
