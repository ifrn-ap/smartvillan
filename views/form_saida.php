<div class="row">
	<div class="col-md-12">
		<h3 class="text-center">Atualização de Saida</h3><hr>
		<form method="POST" action="views.php">
			<input type="hidden" name="acao" value="<?php if($_GET['acao']=='atualizar-saida') echo 'up-saida'; else echo 'add-saida'; ?>">
			<input type="hidden" name="idsaida" value="<?php if(isset($row['idsaida'])) echo $row['idsaida']; ?>">
			<div class="form-group">
				<label for="inputEmail3" class="col-sm-1 control-label">
					Item:
				</label>
				<div class="col-sm-11">
					<select class="form-control" name="item" required>
						<option value="<?php if(isset($row['item_iditem'])) echo $row['item_iditem']; ?>"><?php if(isset($row['item_iditem'])) echo $row['iditem'];?></option>
						<?php 
							$saida = $_POST['item'];
	                        while($rows = $saida->fetch_assoc()){
	                            echo'
	                                <option value="'.$rows['iditem'].'">
	                                    '.$rows['iditem'].'
	                                </option>
	                            ';
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
					<input class="form-control" type="date" name="dt_cadastro" value="<?php if(isset($row['data'])) echo $row['data']; else echo date('Y').'-'.date('m').'-'.date('d'); ?>" required><br>
				</div>
			</div>
			<div class="form-group">
				<label for="inputEmail3" class="col-sm-1 control-label">
					Quantidade:
				</label>
				<div class="col-sm-11">
					<input class="form-control" type="number" name="quantidade" value="<?php if(isset($row['quantidade'])) echo $row['quantidade']; ?>" required><br>
				</div>
			</div>
			<div class="text-center">
				<input class="btn btn-primary" type="submit" value="<?php if($_GET['acao']=="atualizar-saida") echo 'Atualizar'; else echo 'Cadastrar' ?>">
			</div>
		</form>
	</div>
</div>
