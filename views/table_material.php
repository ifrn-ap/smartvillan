<div class="row">
    <div class="col-md-12">
        <h3 class="text-center">Materiais Cadastrados</h3><hr>
    </div>
</div>
<?php if($_POST['material']->num_rows>0){?>
<div class="row">
    <div class="col-md-12">
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Codigo</th>
                        <th>Categoria</th>
                        <th>Descricao</th>
                        <th>Origem</th>
                        <th>Marca</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $modal = 0;
                        $material = $_POST['material'];
                        while($row = $material->fetch_assoc()){
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
                                                        Deseja relamente excluir esse material?
                                                    </center>
                                                </h4>
                                            </div>
                                            <div class="modal-body">
                                                <div class="text-center">
                                                    <a class="btn btn-primary" href="views.php?&acao=deletar-material&id='.$row['idmaterial'].'">Sim</a>
                                                    <button type="button" class="btn btn-primary" data-dismiss="modal">Não</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <tr>
                                    <td>'.$row['idmaterial'].'</td>
                                    <td>'.$row['nome'].'</td>
                                    <td>'.$row['descricao'].'</td>
                                    <td>'.$row['origem'].'</td>
                                    <td>'.$row['marca'].'</td>
                                    <td>
                                        <center>
                                            <a href="views.php?acao=atualizar-material&id='.$row['idmaterial'].'">
                                                <span class="glyphicon glyphicon-pencil" title="Atualizar"></span>
                                            </a>
                                        <center>
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
    echo '<div class="alert alert-danger"><h7><center>Nenhum material cadastro</center></h7></div>';
  }
?>