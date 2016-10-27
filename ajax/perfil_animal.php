<?php $control = new Controlador; ?>
<h3 class="text-center">Perfil do Animal</h3><hr>
<div class="row">
  <div class="col-md-12">
  <div class="panel panel-default">
    <div class="panel-heading">
      <center><h3 class="panel-title"><i class="fa fa-tachometer"></i> Ficha Zootecnica</h3></center>
    </div>
    <div class="table-responsive">
      <table class="table table-bordered">
        <tbody>
          <td><strong>Nome: </strong><?php echo htmlentities($row['nome']); ?></td>
          <td><strong>Microchip: </strong><?php echo htmlentities($row['microchip']); ?></td>
        </tr>
        <tr>
        </tr>
        <tr>
          <td><strong>Especie: </strong><?php echo htmlentities($row['especie']); ?></td>
          <td><strong>Raça: </strong><?php echo htmlentities($row['raca']); ?></td>
        </tr>
        <tr>
          <td><strong>Compra: </strong><?php echo date('d/m/Y', strtotime($row['data_de_compra'])); ?></td>
          <td><strong>Idade: </strong><?php echo $control->idade($row['data_de_nascimento']); ?></td>
        </tr>
        <tr>
          <td><strong>Nascimento: </strong><?php echo $control->data($row['data_de_nascimento']); ?></td>
          <td><strong>Sexo: </strong><?php echo htmlentities($row['sexo']); ?></td>
        </tr>
        <tr>
          <td><strong>Destinação: </strong><?php echo htmlentities($row['destinacao']); ?></td>
          <td><strong>Genetica: </strong><?php echo htmlentities($row['grupo_genetico']); ?></td>
        </tr>
        <tr>
          <td><strong>Pelagem: </strong><?php echo htmlentities($row['pelagem']); ?></td>
          <td><strong>Altura: </strong><?php echo htmlentities($row['altura']); ?></td>
        </tr>
        <tr>
          <td><strong>Pai: </strong><?php echo htmlentities($row['nome_pai']); ?></td>
          <td><strong>Mãe: </strong><?php echo htmlentities($row['nome_mae']); ?></td>
        </tr>
        <tr>
          <td colspan="2"><strong>Observação: </strong><?php echo htmlentities($row['observacao']); ?></td>
        </tr>
        </tbody>
      </table>
    </div>
  </div>
</div>
</div>
                <div class="modal fade" id="myModal" role="dialog">
                  <div class="modal-dialog">
                      <div class="modal-content">
                          <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                              <h4 class="modal-title"><center>Deseja relamente excluir esse animal?</center></h4>
                          </div>
                        <div class="modal-body">
                        <div class="text-center">
                          <a class="btn btn-danger" href="views.php?id=<?php echo $row['idanimal']; ?>&acao=deletar-animal">
                            Sim
                          </a>
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Não</button>
                      </div>
                      </div>
                  </div>
                </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-tachometer"></i> Peso do Animal</h3>
                            </div>
                            <div class="panel-body">
                                <div id="morris-peso"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-tachometer"></i> Lactação do Animal</h3>
                            </div>
                            <div class="panel-body">
                                <div id="morris-lactacao"></div>
                            </div>
                        </div>
                    </div>
                 </div>
                    <div class="row">
                      <div class="col-lg-4">
                        <div class="panel panel-green">
                        <div class="panel-heading">
                        <h3 class="panel-title"><i class="fa fa-tachometer"></i> Lista de pesagens</h3>
                        </div>
                        <div class="table-responsive">
                          <table class="table table-bordered table-striped table-hover">
                            <thead>
                            <tr>
                              <th>Id</th>
                              <th>Peso</th>
                              <th>Data</th>
                            </tr>
                            </thead>
                            <tbody>
                              <?php 
                              while($rows=$_POST['peso']->fetch_assoc()) {
                                echo '
                                <tr>
                                  <td>'.$rows['idpeso'].'</td>
                                  <td>'.$rows['peso'].'</td>
                                  <td>'.$control->data($rows['data_de_pesagem']).'</td>
                                </tr>
                                ';
                              }
                              ?>
                            </tbody>
                          </table>
                        </div>
                    </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="panel panel-red">
                        <div class="panel-heading">
                        <h3 class="panel-title"><i class="fa fa-tachometer"></i> Lista de Ordenhas</h3>
                        </div>
                        <div class="table-responsive">
                          <table class="table table-bordered table-striped table-hover">
                            <thead>
                            <tr>
                              <th>Id</th>
                              <th>Animal</th>
                              <th>Data</th>
                              <th>Quantidade</th>
                            </tr>
                            </thead>
                            <tbody>
                              <?php 
                              while($rows=$_POST['leite']->fetch_assoc()) {
                                echo '
                                <tr>
                                  <td>'.$rows['idleite'].'</td>
                                  <td>'.$rows['nome'].'</td>
                                  <td>'.$control->data($rows['data_de_ordenha']).'</td>
                                  <td>'.$rows['quantidade'].' Litro(s)</td>
                                </tr>
                                ';
                              }
                              ?>
                            </tbody>
                          </table>
                        </div>
                    </div>
                    </div>
                     <div class="col-lg-4">
                        <div class="panel panel-yellow">
                        <div class="panel-heading">
                        <h3 class="panel-title"><i class="fa fa-tachometer"></i> Lista de Vacinações</h3>
                        </div>
                        <div class="table-responsive">
                          <table class="table table-bordered table-striped table-hover">
                            <thead>
                            <tr>
                              <th>Id</th>
                              <th>Vacina</th>
                              <th>Descição</th>
                              <th>Data</th>
                            </tr>
                            </thead>
                            <tbody>
                              <?php 
                              while($rows=$_POST['vacina']->fetch_assoc()) {
                                echo '
                                <tr>
                                  	<td>'.$rows['idvacina'].'</td>
                                   	<td>'.$rows['nome'].'</td>
                                    <td>'.$rows['descricao'].'</td>
                                  <td>'.$control->data($rows['data']).'</td>
                                </tr>
                                ';
                              }
                              ?>
                            </tbody>
                          </table>
                        </div>
                    </div>
                    </div>
                  </div>