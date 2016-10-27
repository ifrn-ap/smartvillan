<div class="row">
    <div class="col-md-12">
        <h3 class="text-center">Vacinações Agendadas</h3><hr>
    </div>
</div>
<?php if($_POST['vacinacao']->num_rows>0){?>
<div class="row">
    <div class="col-md-12">
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>ID Animal</th>
                        <th>Animal</th>
                        <th>Brinco</th>
                        <th>Sexo</th>
                        <th>ID Vacina</th>
                        <th>Vacina</th>
                        <th>Descricao</th>
                        <th>Destincao</th>
                        <th>Data</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $control = new Controlador;
                        $modal = 0;
                        $vacinacao = $_POST['vacinacao'];
                        while($row = $vacinacao->fetch_assoc()){
                            $modal=$modal+1;
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
                                                    <center>
                                                        Deseja relamente cancelar essa vacinação?
                                                    </center>
                                                </h4>
                                            </div>
                                            <div class="modal-body">
                                                <div class="text-center">
                                                    <a class="btn btn-danger" href="views.php?&acao=deletar-vacinacao&id='.$row['idvacinacao'].'">Sim</a>
                                                    <button type="button" class="btn btn-primary" data-dismiss="modal">Não</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <tr>
                                    <td>'.$row['idanimal'].'</td>
                                    <td>'.$row['animal'].'</td>
                                    <td>'.$row['brinco'].'</td>
                                    <td>'.$row['sexo'].'</td>
                                    <td>'.$row['idvacina'].'</td>
                                    <td>'.$row['nome'].'</td>
                                    <td>'.$row['descricao'].'</td>
                                    <td>'.$row['destinacao'].'</td>
                                    <td>'.$row['data'].'</td>
                                    <td>
                                        <center>
                                            <a href=# data-toggle="modal" data-target="#myModal'.$modal.'">
                                                <span class="glyphicon glyphicon-remove"></span>
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
    echo '<div class="alert alert-danger"><h7><center>Nenhuma vacinação agendada</center></h7></div>';
  }
?>