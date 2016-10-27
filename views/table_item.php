<div class="row">
    <div class="col-md-12">
        <h3 class="text-center">Itens Cadastrados</h3><hr>
    </div>
</div>
<?php if($_POST['item']->num_rows>0){?>
<div class="row">
    <div class="col-md-12">
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Item</th>
                        <th>Categoria</th>
                        <th>Descrição</th>
                        <th>Cadastro</th>
                        <th>Validade</th>
                        <th>Disponiveis</th>
                        <th>Valor</th>

                    </tr>
                </thead>
                <tbody>
                    <?php
                        $modal = 0;
                        $item = $_POST['item'];
                        $control = new Controlador;
                        while($row = $_POST['item']->fetch_assoc()){
                            $modal = $modal+1;
                            $row['data_cadastro'] = $control->data($row['data_cadastro']);
                            $row['validade'] = $control->data($row['validade']);
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
                                                    <a class="btn btn-primary" href="views.php?&acao=deletar-item&id='.$row['iditem'].'">Sim</a>
                                                    <button type="button" class="btn btn-primary" data-dismiss="modal">Não</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <tr>
                                    <td>'.$row['iditem'].'</td>
                                    <td>'.$row['nome'].'</td>
                                    <td>'.$row['descricao'].'</td>
                                    <td>'.$row['data_cadastro'].'</td>
                                    <td>'.$row['validade'].'</td>
                                    <td>'.$row['disponibilidade'].'</td>
                                    <td>R$ '.$row['valor'].'</td>
                                    <td>
                                        <center>
                                            <a href=# data-toggle="modal" data-target="#myModal'.$modal.'">
                                                <span class="glyphicon glyphicon-trash" title="Excluir"></span>
                                            </a>
                                        </center>
                                    </td>
                                    <td>
                                        <center>
                                            <a href="views.php?acao=atualizar-item&id='.$row['iditem'].'">
                                                <span class="glyphicon glyphicon-pencil" title="Atualizar"></span>
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
    echo '<div class="alert alert-danger"><h7><center>Nenhum item cadastrada</center></h7></div>';
  }
?>