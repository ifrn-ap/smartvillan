<h3 class="text-center">Animais Cadastrados</h3><hr>
<?php if($_POST['animal']->num_rows>0){ ?>
<div class="row">
    <div class="col-md-12">
        <form action="views.php" method="POST" id="form">
            <input type="hidden" name="acao" value="filtrar-animal">
                <div class="col-sm-5">
                    <select name="especie" onChange="document.getElementById('form').submit();" class="form-control">
                        <option value="">Especie</option>
                        <option value="Caprino">Caprino</option>
                        <option value="Bovino">Bovino</option>
                        <option value="Suíno">Suíno</option>
                        <option value="Equino">Equino</option>
                        <option value="Ovino">Ovino</option>
                    </select><br>
                </div>
                <div class="col-sm-5">
                    <select name="sexo" class="form-control"  onChange="document.getElementById('form').submit();">
            			<option value="">Sexo</option>
                        <option value="Macho">Macho</option>
                        <option value="Femea">Femea</option>
                    </select><br>
                </div>
                <div class="col-sm-2">
	                <div class="form-group">
	                	 <div class="input-group custom-search-form">
                            <input class="form-control" type="text" name="brinco" placeholder="brinco">
                            <span class="input-group-btn">
                          		<button class="btn btn-default" type="submit">
                                	<i class="fa fa-search"></i>
                            	</button>
                            </span>
                        </div>
	                </div>
                </div>
        </form>
    </div>
</div>
<div class="row">
  	<div class="col-md-12">
    	<div class="table-responsive">
			<table class="table table-bordered table-striped table-hover">
				<thead>
					<tr>
						<th>Id</th>
						<th>Nome</th>	
						<th>Brinco</th>
						<th>Especie</th>
						<th>Raça</th>
						<th>Sexo</th>
						<th>Nascimento</th>
						<th>Idade</th>
					</tr>
				</thead>
				<tbody>
					<?php
						$modal=0;
						$animal = $_POST['animal'];
			            while($row = $animal->fetch_assoc()){
			            	$control = new Controlador;
			            	$row['idade']= $control->idade($row['data_de_nascimento']);
			            	$row['data_de_nascimento']= $control->data($row['data_de_nascimento']);
			            	$modal=$modal+1;
							echo'
								<div class="modal fade" id="myModal'.$modal.'" role="dialog">
			                       	<div class="modal-dialog"> 
			                            <div class="modal-content">
			                                <div class="modal-header">
			                                    <button type="button" class="close" data-dismiss="modal">
			                                        &times;
			                                    </button>
			                                   	<h4 class="modal-title">
			                                        <center>
			                                            Pesagem
			                                        </center>
			                                    </h4>
			                                </div>
			                                <div class="modal-body">
			                                    <form method="POST" action="views.php">
				                                    <input type="hidden" name="animal" value="'.$row['idanimal'].'">
			                                        <input type="hidden" name="acao" value="add-peso">
				                                    <div class="form-group">
			                                            <label for="inputEmail3" class="col-sm-2 control-label">
			                                                Data de Pesagem:
			                                            </label>
			                                            <div class="col-sm-10">
			                                                <input type="date" class="form-control" name="dt_pesagem" value="'.date('Y').'-'.date('m').'-'.date('d').'" required><br>
			                                            </div>
			                                        </div>
				                                    <div class="form-group">
			                                            <label for="inputEmail3" class="col-sm-2 control-label">
			                                                Valor(Kg):
			                                            </label>
			                                            <div class="col-sm-10">
				                                           <input class="form-control" type="number" name="peso"><br>
			                                            </div>
			                                        </div>
			                                        <div class="text-center">
			    										<input class="btn btn-primary" type="submit" value="Pesar">
			    									</div>
				                                </form>
			                                </div>
			                            </div>
			                        </div>
			                    </div>
								<tr>
									<td>'.$row['idanimal'].'</td>
									<td>'.$row['nome'].'</td>
									<td>'.$row['brinco'].'</td>
									<td>'.$row['especie'].'</td>
									<td>'.$row['raca'].'</td>
									<td>'.$row['sexo'].'</td>
									<td>'.$row['data_de_nascimento'].'</td>
									<td>'.$row['idade'].'</td>
									<td>
										<div class="text-center">
											<a href="views.php?id='.$row['idanimal'].'&acao=perfil-animal">                           
											 	<span class="glyphicon glyphicon-list-alt" title="Perfil"></span>
											</a>
										</div>
									</td>
									<td>
										<div class="text-center">
											<a href="#" data-toggle="modal" data-target="#myModal'.$modal.'" title="Pesar">
	                							<span class="glyphicon glyphicon-scale"></span>
	              							</a> 
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
