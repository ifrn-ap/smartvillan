<div class="row">
    <div class="col-md-12">
        <h3 class="text-center">Usuarios Cadastrados</h3><hr>
    </div>
</div>
<?php if($_POST['usuario']->num_rows>0){ ?>
<div class="row">
 	<div class="col-md-12">
    	<div class="table-responsive">
			<table class="table table-bordered table-striped table-hover">
				<thead>
					<tr>
						<th>Matricula</th>
						<th>Nome</th>
						<th>Email</th>
						<th>Tipo</th>
					</tr>	
				</thead>
				<tbody>
					<?php
						$cont=0;
						$usuario = $_POST['usuario'];
						while ($row=$usuario->fetch_assoc()){
							$cont=$cont+1;
							if($row['tipo']=="1"){ 
								$row['tipo']="Administrador";
							}else{
								$row['tipo']="Padrão";
							}
							echo'
								<div class="modal fade" id="myModal'.$cont.'" role="dialog">
									<div class="modal-dialog">
									    <!-- Modal content-->
									    <div class="modal-content">
									        <div class="modal-header">
									          <button type="button" class="close" data-dismiss="modal">&times;</button>
									          <h4 class="modal-title"><center>Deseja relamente excluir esse usuario?</center></h4>
									        </div>
									    <div class="modal-body">
											<div class="text-center">
												<a class="btn btn-primary" href="views.php?acao=deletar-usuario&id='.$row['matricula'].'">Sim</a>
												<button type="button" class="btn btn-primary" data-dismiss="modal">Não</button>
												</div>
									        </div>
									    </div>
									</div>
								</div>
								<tr>
									<td>'.$row['matricula'].'</td>
									<td>'.$row['nome'].'</td>	
									<td>'.$row['email'].'</td>
									<td>'.$row['tipo'].'</td>
									<td>
										<div class="text-center">
											<a href="views.php?id='.$row['matricula'].'&acao=atualizar-usuario">                           
											 	<span class="glyphicon glyphicon-pencil"></span>
											</a>
										</div>
									</td>
									<td>
										<div class="text-center">
	                        				<a href="#" data-toggle="modal" data-target="#myModal'.$cont.'">
	                            				<span class="glyphicon glyphicon-trash"></span>
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
    echo '<div class="alert alert-danger"><h7><center>Nenhum leilao cadastrado</center></h7></div>';
  }
?>
