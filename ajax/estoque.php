<br><br><br>
<div class="row">
    <h1 class="text-center" style="color: white;">Estoque</h1><hr>
    <?php
        $modal=0;
        	$cont = 0;
            while($row=$_POST['estoque']->fetch_assoc()){
            	$cont = $cont+1;
            	if($cont==1) $row['tipo']='primary';
            	if($cont==2) $row['tipo']='green';
            	if($cont==3) $row['tipo']='yellow';
            	if($cont==4) $row['tipo']='red';
            	if($cont==4) $cont=0;
            	$row['validade']=date('d/m/Y', strtotime($row['validade']));
                echo'
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

