<div class="row">
    <div class="col-md-12">
        <h3 class="text-center">Ordenhas Registradas</h3><hr>
    </div>
</div>
<?php if($_POST['leite']->num_rows>0){?>
<div class="row">
    <div class="col-md-12">
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Codigo</th>
                        <th>Animal</th>
                        <th>Brinco</th>
                        <th>Data</th>
                        <th>Quantidade</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $control = new Controlador; 
                        $modal = 0;
                        $leite = $_POST['leite'];
                        while($row = $leite->fetch_assoc()){
                            $row['data_de_ordenha']=$control->data($row['data_de_ordenha']);
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
                                                        Deseja relamente excluir essa categoria?
                                                    </center>
                                                </h4>
                                            </div>
                                            <div class="modal-body">
                                                <div class="text-center">
                                                    <a class="btn btn-primary" href="views.php?&acao=deletar-leite&id='.$row['idleite'].'">Sim</a>
                                                    <button type="button" class="btn btn-primary" data-dismiss="modal">Não</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <tr>
                                    <td>'.$row['idleite'].'</td>
                                    <td>'.$row['nome'].'</td>
                                    <td>'.$row['brinco'].'</td>
                                    <td>'.$row['data_de_ordenha'].'</td> 
                                    <td>'.$row['quantidade'].' Litros</td> 
                                    <td>
                                        <center>
                                            <a href="views.php?acao=atualizar-leite&id='.$row['idleite'].'">
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
    echo '<div class="alert alert-danger"><h7><center>Nenhuma categoria cadastrada</center></h7></div>';
  }
?>