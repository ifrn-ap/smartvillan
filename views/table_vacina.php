<div class="row">
    <div class="col-md-12">
        <h3 class="text-center">Vacinas Agendadas</h3><hr>
    </div>
</div>
<?php if($_POST['vacina']->num_rows>0){?>
<div class="row">
    <div class="col-md-12">
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Codigo</th>
                        <th>Nome</th>
                        <th>Descrição</th>
                        <th>Destinacao</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $control = new Controlador;
                        $modal = 0;
                        $vacina = $_POST['vacina'];
                        while($row = $vacina->fetch_assoc()){
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
                                                    <a class="btn btn-primary" href="views.php?&acao=deletar-vacina&id='.$row['idvacina'].'">Sim</a>
                                                    <button type="button" class="btn btn-primary" data-dismiss="modal">Não</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <tr>
                                    <td>'.$row['idvacina'].'</td>
                                    <td>'.$row['nome'].'</td>
                                    <td>'.$row['descricao'].'</td>
                                    <td>'.$row['destinacao'].'</td>
                                    <td>
                                        <center>
                                            <a href="views.php?acao=atualizar-vacina&id='.$row['idvacina'].'">
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
    echo '<div class="alert alert-danger"><h7><center>Nenhuma vacina cadastrada</center></h7></div>';
  }
?>