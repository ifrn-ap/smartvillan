<div class="row">
    <div class="col-md-12">
        <h3 class="text-center">Entradas Realizadas</h3><hr>
    </div>
</div>
<?php if($_POST['entrada']->num_rows>0){?>
<div class="row">
    <div class="col-md-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered">
			    <thead>
			        <tr>
			            <th>Codigo</th>
			            <th>item</th>
                        <th>Quantidade</th>
			            <th>Data</th>
			            <th>Retirante</th>
			            <th>Matricula</th>
                        <th>Valor</th>
			        </tr>
			    </thead>
			    <tbody>
			        <?php
			        $modal = 0;
			        $control = new Controlador;
			            while($row = $_POST['entrada']->fetch_assoc()){
			            	$modal = $modal+1;
			            	$row['data'] = $control->data($row['data']);
			                echo'
			                	<div class="modal fade" id="myModal'.$modal.'" role="dialog">
                                    <div class="modal-dialog"> 
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal">
                                                    &times;
                                                </button>
                                                <h4 class="modal-title">
                                                    <center>Deseja relamente excluir essa categoria?</center>
                                                </h4>
                                            </div>
                                            <div class="modal-body">
                                                <div class="text-center">
                                                    <a class="btn btn-primary" href="views.php?&acao=deletar-entrada&id='.$row['identrada'].'">Sim</a>
                                                    <button type="button" class="btn btn-primary" data-dismiss="modal">Não</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
			                    <tr>
			                        <td>'.$row['identrada'].'</td>
			                        <td>'.$row['item_iditem'].'</td>
                                    <td>'.$row['quantidade'].'</td>
			                        <td>'.$row['data'].'</td>
			                        <td>'.$row['nome'].'</td>
			                        <td>'.$row['usuario_matricula'].'</td>
                                    <td>R$ '.$row['valor']*$row['quantidade'].'</td>
			                        <td>
                                        <center>
                                            <a href="views.php?acao=atualizar-entrada&id='.$row['identrada'].'">
                                                <span class="glyphicon glyphicon-pencil" title="Atualizar"></span>
                                            </a>
                                        </center>
                                    </td>
                                    <td>
                                        <center>
                                            <a href=# data-toggle="modal" data-target="#myModal'.$modal.'">
                                                <span class="glyphicon glyphicon-trash" title="Excluir"></span>
                                            </a>
                                        </center>
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
    echo '<div class="alert alert-danger"><h7><center>Nenhuma entrada cadastro</center></h7></div>';
  }
?>