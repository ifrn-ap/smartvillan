<div class="row">
    <h1 class="text-center">Estoque</h1><hr>
    <div class="col-md-12">
        <form action="views.php" method="POST" id="form">
            <input type="hidden" name="acao" value="filtrar-estoque">
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-1 control-label">
                    Filtrar:
                </label>
                <div class="col-sm-5">
                    <select class="form-control" onChange="document.getElementById('form').submit();" name="categoria" required>
                        <option value="0">Escolha uma Categoria</option>
                        <?php 
                            $categoria = $_POST['categoria'];
                            while($rows = $categoria->fetch_assoc()){
                                echo'
                                    <option value="'.$rows['idcategoria'].'">
                                        '.$rows['nome'].'
                                    </option>
                                ';
                            }
                        ?>
                    </select>
                </div>  
                <div class="col-sm-6">
                        <select class="form-control" onChange="document.getElementById('form').submit();" name="material" required>
                            <option value="0">Escolha o materia</option>
                            <?php 
                                $material = $_POST['material'];
                                while($rows = $material->fetch_assoc()){
                                    echo'
                                        <option value="'.$rows['idmaterial'].'">
                                            '.$rows['descricao'].'
                                        </option>
                                    ';
                                }
                            ?>
                        </select>
                    </div>
                    <div class="col-sm-1">                           
                    </div>
                </div>
            </div>
        </form>
    </div>
    <br><br>
    <?php
        $modal=0;
        	$cont = 0;
            while($row=$_POST['estoque']->fetch_assoc()){
            	$modal=$modal+1;
            	$cont = $cont+1;
            	if(($cont==1) || ($cont==2) || ($cont==3) || ($cont==4)) $row['tipo']='primary';
            	if(($cont==5) || ($cont==6) || ($cont==7) || ($cont==8)) $row['tipo']='green';
            	if(($cont==9) || ($cont==10) || ($cont==11) || ($cont==12)) $row['tipo']='yellow';
            	if(($cont==13) || ($cont==14) || ($cont==15) || ($cont==16)) $row['tipo']='red';
            	if($cont==16) $cont=0;
            	$row['validade']=date('d/m/Y', strtotime($row['validade']));
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
                                                Indique a quantidade de itens a serem retirados?
                                        </center>
                                    </h4>
                                </div>
                                <div class="modal-body">
                                    <form method="POST" action="views.php">
	                                    <input type="hidden" name="item" value="'.$row['iditem'].'">
                                        <input type="hidden" name="acao" value="add-saida">
	                                    <div class="form-group">
                                            <label for="inputEmail3" class="col-sm-2 control-label">
                                                Data de Saida:
                                            </label>
                                            <div class="col-sm-10">
                                                <input type="date" class="form-control" name="dt_cadastro" value="'.date('Y').'-'.date('m').'-'.date('d').'" required><br>
                                            </div>
                                        </div>
	                                    <div class="form-group">
                                            <label for="inputEmail3" class="col-sm-2 control-label">
                                                Quantidade:
                                            </label>
                                            <div class="col-sm-10">
	                                           <input class="form-control" type="number" name="quantidade"><br>
                                            </div>
                                        </div>
                                        <div class="text-center">
    										<input class="btn btn-primary" type="submit" value="Retirar">
    									</div>
	                                </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal fade" id="Modal'.$modal.'" role="dialog">
                        <div class="modal-dialog"> 
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">
                                        &times;
                                    </button>
                                    <h4 class="modal-title">
                                        <center>
                                                Indique a quantidade a ser inserida?
                                        </center>
                                    </h4>
                                </div>
                                <div class="modal-body">
                                    <form method="POST" action="views.php">
                                        <input type="hidden" name="item" value="'.$row['iditem'].'">
                                        <input class="form-control" type="hidden" name="acao" value="add-entrada">
                                        <div class="form-group">
                                            <label for="inputEmail3" class="col-sm-2 control-label">
                                                Data de Entrada:
                                            </label>
                                            <div class="col-sm-10">
                                                <input type="date" class="form-control" name="dt_cadastro" value="'.date('Y').'-'.date('m').'-'.date('d').'" required><br>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputEmail3" class="col-sm-2 control-label">
                                                Quantidade:
                                            </label>
                                            <div class="col-sm-10">
                                               <input class="form-control" type="number" name="quantidade"><br>
                                            </div>
                                        </div>
                                        <div class="text-center">
                                            <input class="btn btn-primary" type="submit" value="Retirar">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
	                <div class="col-lg-3 col-md-6">
	                    <div class="panel panel-'.$row['tipo'].'">
	                        <div class="panel-heading">
	                            <div class="row">
	                                <div class="col-xs-3">
	                                    <i class="fa fa-tasks fa-4x"></i>
	                                </div>
	                                <div class="col-xs-9 text-right">
	                                    <div class="text-center"><h4>'.$row['descricao'].'</h4></div>
	                                </div>
                                    <div class="col-xs-12">
                                    <div><h5>Validade: '.$row['validade'].'</h5></div>
                                    </div>
	                            </div>
	                        </div>
	                            <div class="panel-footer">
	                                <span class="pull-left">Disponiveis: '.$row['disponibilidade'].'</span>
                                    <a href=# data-toggle="modal" data-target="#Modal'.$modal.'" title="Adicionar"><span class="pull-right"><i class="fa fa-plus-square"></i></span></a>
                                    <a href=# data-toggle="modal" data-target="#myModal'.$modal.'" title="Retirar"><span class="pull-right"><i class="fa fa-minus-square"></i></span></a>
	                                <div class="clearfix"></div>
	                            </div>
	                        </a>

	                    </div>
	                </div>
                ';
            }
        ?>
    </div>
</div>

