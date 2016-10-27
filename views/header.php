<!DOCTYPE html>
<html lang="en">
	<head>
	    <meta charset="utf-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
	    <meta name="description" content="">
	    <meta name="author" content="">
	    <title>Smartvillan</title>
	    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
	    <link href="bootstrap/css/sb-admin.css" rel="stylesheet">
	    <link href="bootstrap/css/morris.css" rel="stylesheet">
	    <link href="bootstrap/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	   	<script src="js/jquery.js"></script>
	   	<style type="text/css">thead{background: #222; color: white;}</style>
	</head>
	<body style="background: white;">
	    <div id="wrapper">
	        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
	            <div class="navbar-header">
	                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
	                    <span class="sr-only">Toggle navigation</span>
	                    <span class="icon-bar"></span>
	                    <span class="icon-bar"></span>
	                    <span class="icon-bar"></span>
	                </button>
	                <a class="navbar-brand" href="">Smartvillan</a>
	            </div>
	            <ul class="nav navbar-right top-nav">
	                <li class="dropdown">
	                     <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo $_SESSION['user']['nome']; ?><b class="caret"></b></a>
	                    <ul class="dropdown-menu">
	                        <li><a href="views.php?acao=perfil-usuario"><i class="fa fa-user fa-fw"></i>Meu Perfil</a>
                            </li>
                            <?php if($_SESSION['user']['tipo']==1){?>
                            <li class="divider"></li>
      							<li>
                                    <a href="views.php?acao=cadastrar-usuario"><i class="fa fa-plus-square"></i> Adicionar Users</a>
                                </li>
                                <li>
                                    <a href="views.php?acao=listar-usuario"><i class="fa fa-bars"></i> Listar Users</a>
                                </li>
	                    		<?php }?>
                            <li class="divider"></li>
                            <li><a href="logout.php"><i class="fa fa-sign-out fa-fw"></i>Sair</a>
                            </li>
	                    </ul>
	                </li>
	            </ul>
	            <div class="collapse navbar-collapse navbar-ex1-collapse">
	                <ul class="nav navbar-nav side-nav">
	                    <li>
                            <a href="views.php?acao=add-painel"><i class="fa fa-table fa-fw"></i>Painel</a>
                        </li>
                     	<li>
                            <a href="views.php?acao=mostrar-calendario"><i class="glyphicon glyphicon-calendar"></i> Calendario</a>
                        </li>
	                   	<li>
	                        <a href="javascript:;" data-toggle="collapse" data-target="#animal"><i class="fa fa-tachometer"></i> Rebanho<span class="fa arrow"></span></a>
	                        <ul id="animal" class="collapse">
      							<li>
                                    <a href="views.php?acao=cadastrar-animal"><i class="fa fa-plus-square"></i> Cadastrar</a>
                                </li>
                                <li>
                                    <a href="views.php?acao=listar-animal"><i class="fa fa-bars"></i> Listar</a>
                                </li>
	                        </ul>
	                    </li>
	                   	<li>
	                        <a href="javascript:;" data-toggle="collapse" data-target="#peso"><i class="glyphicon glyphicon-pushpin"></i> Vacinas<span class="fa arrow"></span></a>
	                        <ul id="peso" class="collapse">
      							<li>
                                    <a href="views.php?acao=cadastrar-vacina"><i class="fa fa-plus-square"></i> Cadastrar</a>
                                </li>
                                <li>
                                    <a href="views.php?acao=listar-vacina"><i class="fa fa-bars"></i> Listar</a>
                                </li>
	                        </ul>
	                    </li>
	                    <li>
	                        <a href="javascript:;" data-toggle="collapse" data-target="#vacinacao"><i class="glyphicon glyphicon-tint"></i> Vacinação<span class="fa arrow"></span></a>
	                        <ul id="vacinacao" class="collapse">
      							<li>
                                    <a href="views.php?acao=agendar-vacinacao"><i class="glyphicon glyphicon-time"></i> Registrar</a>
                                </li>
                                <li>
                                    <a href="views.php?acao=listar-vacinacao"><i class="fa fa-bars"></i> Controle</a>
                                </li>
	                        </ul>
	                    </li>
	                   	<li>
	                        <a href="javascript:;" data-toggle="collapse" data-target="#leite"><i class="fa fa-beer"></i> Ordenha<span class="fa arrow"></span></a>
	                        <ul id="leite" class="collapse">
      							<li>
                                    <a href="views.php?acao=cadastrar-leite"><i class="glyphicon glyphicon-time"></i> Registrar</a>
                                </li>
                                <li>
                                    <a href="views.php?acao=listar-leite"><i class="fa fa-bars"></i> Controle</a>
                                </li>
	                        </ul>
	                    </li>
	                    <li>
	                        <a href="javascript:;" data-toggle="collapse" data-target="#categoria"><i class="fa fa-database"></i> Categorias<span class="fa arrow"></span></a>
	                        <ul id="categoria" class="collapse">
      							<li>
                                    <a href="views.php?acao=cadastrar-categoria"><i class="fa fa-plus-square"></i> Cadastrar</a>
                                </li>
                                <li>
                                    <a href="views.php?acao=listar-categoria"><i class="fa fa-bars"></i> Listar</a>
                                </li>
	                        </ul>
	                    </li>
	                    <li>
	                        <a href="javascript:;" data-toggle="collapse" data-target="#material"><i class="fa fa-briefcase"></i> Materias<span class="fa arrow"></span></i></a>
	                        <ul id="material" class="collapse">
                                <li>
                                    <a href="views.php?acao=cadastrar-material"><i class="fa fa-plus-square"></i> Cadastrar</a>
                                </li>
                                <li>
                                    <a href="views.php?acao=listar-material"><i class="fa fa-bars"></i> Listar</a>
                                </li>
	                        </ul>
	                    </li>
	                    <li>
	                        <a href="javascript:;" data-toggle="collapse" data-target="#item"><i class="fa fa-cube"></i> Itens<span class="fa arrow"></span></i></a>
	                        <ul id="item" class="collapse">
                                <li>
                                    <a href="views.php?acao=cadastrar-item"><i class="fa fa-plus-square"></i> Cadastrar</a>
                                </li>
                                <li>
                                    <a href="views.php?acao=listar-item"><i class="fa fa-bars"></i> Listar</a>
                                </li>
	                        </ul>
	                    </li>
	                   	<li>
	                        <a href="javascript:;" data-toggle="collapse" data-target="#estoque"><i class="fa fa-cubes"></i> Estoque<span class="fa arrow"></span></i></a>
	                        <ul id="estoque" class="collapse">
	                            <li>
		                            <a href="views.php?acao=listar-estoque"><i class="fa fa-search"></i> Visualizar</a>
		                        </li>
		                        <li>
	                        		<a href="views.php?acao=listar-entrada"><i class="fa fa-share"></i> Entradas<span class="fa arrow"></span></a>
	                    		</li>
			                   	
		                        <li>
			                        <a href="views.php?acao=listar-saida"><i class="fa fa-reply"></i> Retiradas<span class="fa arrow"></span></a>
			                    </li>
	                        </ul>
	                    </li>

	                    <li>
	                        <a href="views.php?acao=chamar_relatorio"><i class="fa fa-file-text-o"></i> Relatorios<span class="fa arrow"></span></a>
	                    </li>
	            </div>
	        </nav>
	        <div id="page-wrapper">
	            <div class="container-fluid">