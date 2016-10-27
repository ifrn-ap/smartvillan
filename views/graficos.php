<div class="row">
    <div class="col-lg-12">
        <center>
            <h3 class="text-center">
                <?php 
                if($_POST['id']=='morris-material'){
                    echo 'Materiais mais usados';
                }else if($_POST['id']=='morris-estoque'){
                    echo 'Materiais em Estoque';
                }else if($_POST['id']=='morris-saida'){
                    echo 'Saidas Realizadas';
                }else if($_POST['id']=='morris-entrada'){
                    echo 'Entradas Realizadas';
                }
                ?>
            <hr>
            </h3>
        </center>
    </div>
 </div>
<!-- /.row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-graphic"></i>Grafico</h3>
                            </div>
                            <div class="panel-body">
                                <div id=<?php echo '"'.$_POST['id'].'"'; ?>></div>
                            </div>
                        </div>
                    </div>
                </div>