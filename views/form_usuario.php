<div class="row">
    <div class="col-md-12">
        <h3 class="text-center"><?php if($_GET['acao']=='atualizar-usuario') echo 'Atualizar Usuario'; else echo 'Cadastrar Usuario'; ?></h3><hr>
    </div>
</div>
<div class="row">
	<div class="col-md-12">
		<form method="POST" action="views.php" name="a">
			<!-- Campo acao-->
			<input type="hidden" name="acao" value="<?php if($_GET['acao']=='atualizar-usuario') echo 'up-usuario'; else echo 'add-usuario'; ?>">
			<input type="hidden" name="header" value="<?php if($_GET['header']=='perfil') echo 'pefil'; ?>">
			<!-- Campo butao de submição-->
			<div class="form-group">
				<label for="inputEmail3" class="col-sm-1 control-label">
					Nome:
				</label>
				<div class="col-sm-11">
					<input type="text" class="form-control" name= "nome" value="<?php if(isset($row['nome'])) echo $row['nome'];?>" required><br>
				</div>
			</div>
			<?php if($_GET['acao']=='cadastrar-usuario'){ ?>
			<!-- Campo butao de submição-->
			<div class="form-group">
				<label for="inputEmail3" class="col-sm-1 control-label">
					Matricula:
				</label>
				<div class="col-sm-11">
					<input type="text" class="form-control" name= "matricula" value="<?php if(isset($row['matricula'])) echo $row['matricula'];?>" required><br>
				</div>
			</div>
			<?php }else{ ?>
			<input type="hidden" name="matricula" value="<?php if(isset($row['matricula'])) echo $row['matricula'];?>">
			<?php }?>
			<!-- Campo butao de submição-->
			<div class="form-group">
				<label for="inputEmail3" class="col-sm-1 control-label">
					Email:
				</label>
				<div class="col-sm-11">
					<input type="email" class="form-control" name= "email" value="<?php if(isset($row['email'])) echo $row['email'];?>" required><br>
				</div>
			</div>
			<!-- Campo butao de submição-->
			<?php if($_SESSION['user']['tipo']==1){?>
			<div class="form-group">
				<label for="inputEmail3" class="col-sm-1 control-label">
					Tipo:
				</label>
				<div class="col-sm-11">
					<select name="tipo" class="form-control" required>
						<option value="<?php if(isset($row['tipo'])) echo $row['tipo'];?>">
						<?php 
							if(isset($row['tipo'])){
								if($row['tipo']==1) echo'Administrador';
								if($row['tipo']==0) echo'Normal';
							}else{
								echo 'Selecione';
							}
						?>
						</option>
						<option value="0">
							Nomal
						</option>
						<option value="1">
							Administrador
						</option>
					</select><br>
				</div>
			</div>
			<?php } ?>
			<!-- Campo butao de submição-->
			<div class="form-group">
				<div class="text-center">
					<button class='btn btn-primary' type="submit" class="btn btn-default">
						<?php if($_GET['acao']=='cadastrar-usuario') echo "Cadastrar"; else echo 'Atualizar'; ?>
					</button>
				</div>
			</div>
		</form>
	</div>
</div>