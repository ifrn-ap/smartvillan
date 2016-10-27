<h3 class="text-center">Materiais Mais Usados</h3><hr>
<?php if($_POST['material']->num_rows>0){?>
<div class="row">
    <div class="col-md-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered">
			    <thead>
			        <tr>
			            <th>Item</th>
                        <th>Categoria</th>
                        <th>Descrição</th>
                        <th>Quantidade</th>
                        <th>Valor</th>
			        </tr>
			    </thead>
			    <tbody>
			        <?php
			        $modal = 0;
			        $control = new Controlador;
			            while($row = $_POST['material']->fetch_assoc()){
			            	$modal = $modal+1;
			            	$row['data'] = $control->data($row['data']);
			                echo'
			                    <tr>
			                        <td>'.$row['item_iditem'].'</td>
                                    <td>'.$row['nome'].'</td>
                                    <td>'.$row['descricao'].'</td>
                                    <td>'.$row['quantidade'].'</td>
                                    <td>R$ '.$row['valor'].'</td>
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
    echo '<div class="alert alert-danger"><h7><center>Nenhum material cadastro</center></h7></div>';
  }
?>