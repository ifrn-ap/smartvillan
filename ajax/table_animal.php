<h3 class="text-center">Animais Cadastrados</h3><hr>
<?php if($_POST['animal']->num_rows>0){ ?>
<div class="row">
  	<div class="col-md-12">
    	<div class="table-responsive">
			<table class="table table-bordered" style="color: black; background: white;">
				<thead class="btn-primary" style="color: white;">
					<tr>
						<th>Brinco</th>
						<th>Especie</th>
						<th>Sexo</th>
						<th>Perfil</th>
					</tr>
				</thead>
				<tbody>
					<?php
						$animal = $_POST['animal'];
			            while($row = $animal->fetch_assoc()){
							echo'
								<tr>
									<td>'.$row['brinco'].'</td>
									<td>'.$row['especie'].'</td>
									<td>'.$row['sexo'].'</td>
									<td>
										<div class="text-center">
											<button title="Perfil" onclick="perfil_animal('.$row['idanimal'].')" class="btn btn-success">                           
												Ver
											</button>
										</div>
									</td>
								</tr>
							';
						}
					?>
				</tbody>
			</table>
		</div>
	</div>
</div>
<?php
  }else{
  	echo '<div class="alert alert-danger"><h7><center>Nenhum animal cadastrado</center></h7></div>';
  }
?>
