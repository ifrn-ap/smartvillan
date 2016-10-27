<div class="row">
    <div class="col-lg-12">
        <center>
            <h2 class="page-header">Painel de usuário</h2>
        </center>
    </div>
 </div>
<!-- /.row -->
<div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-briefcase fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo $row['material']; ?></div>
                                    <div>Materiais<br>Cadastrados!</div>
                                </div>
                            </div>
                        </div>
                        <a href="views.php?acao=listar-material">
                            <div class="panel-footer">
                                <span class="pull-left">Materiais</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-red">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-cubes fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo $row['item']; ?></div>
                                    <div>Item<br>Cadastrados!</div>
                                </div>
                            </div>
                        </div>
                        <a href="views.php?acao=listar-item">
                            <div class="panel-footer">
                                <span class="pull-left">Itens</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                    <div class="col-lg-3 col-md-6">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-share fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge"><?php echo $row['Entrada']; ?></div>
                        <div>Entradas<br>Realizadas</div>
                    </div>
                </div>
            </div>
            <a href="views.php?acao=listar-entrada">
                <div class="panel-footer">
                    <span class="pull-left">Entradas</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-yellow">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-reply fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo $row['saida']; ?></div>
                                    <div>Retiradas<br>Realizadas!</div>
                                </div>
                            </div>
                        </div>
                        <a href="views.php?acao=listar-saida">
                            <div class="panel-footer">
                                <span class="pull-left">Saidas</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>

                <div class="row">
                    <div class="col-lg-4">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-tachometer"></i> Animas por Sexo</h3>
                            </div>
                            <div class="panel-body">
                                <div id="morris-sexo"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-tachometer"></i> Animais por Especie</h3>
                            </div>
                            <div class="panel-body">
                                <div id="morris-especie"></div>
                            </div>
                        </div>
                    </div>
                </div>

