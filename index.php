<?php session_start(); ?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, maximum-scale=1">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="author" content="">
<meta name="description" content="">

<title>Smartvillan</title>
<link rel="icon" href="idex/favicon.png" type="image/png">
<link rel="shortcut icon" href="favicon.ico" type="img/x-icon">
<link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,800italic,700italic,600italic,400italic,300italic,800,700,600' rel='stylesheet' type='text/css'>
<link href="bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css">
<link href="bootstrap/css/style.css" rel="stylesheet" type="text/css">
<link href="bootstrap/css/font-awesome.css" rel="stylesheet" type="text/css">
<link href="bootstrap/css/responsive.css" rel="stylesheet" type="text/css">
<link href="bootstrap/css/animate.css" rel="stylesheet" type="text/css">


<!--[if lt IE 9]>
    <script src="js/respond-1.1.0.min.js"></script>
    <script src="js/html5shiv.js"></script>
    <script src="js/html5element.js"></script>
<![endif]-->

</head>
<body>
<nav class="navbar navbar-default navbar-fixed-top" role="navigation" style="margin-bottom: 0;">
     <div class="container">
        <ul class="main-nav">
            <li><a href="#header">Home</a></li>
            <li><a href="#service">Serviços</a></li>
            <li><a href="#app">Photfolio</a></li>
            <li class="small-logo"><a href="#header"><img src="bootstrap/img/small-logo.png" alt=""></a></li>
            <li><a href="#Portfolio">Ferramentas</a></li>
            <li><a href="#client">Equipe</a></li>
            <li><a href="#login">Login</a></li>
        </ul>
        <a class="res-nav_click" href="#"><i class="fa-bars"></i></a>
    </div>
</nav>

<section class="header main-section" id="header"><!--header-start-->
<br/><br/><br/><br/><br/><br/><br/><br/>
	 <div class="container">
    	<figure class="logo animated fadeInDown delay-07s">
        	<a href="#"><img src="bootstrap/img/logo.png" alt=""></a>	
        </figure>	
        <h1 class="animated fadeInDown delay-07s">Seja Bem-Vindo ao Smartvillan</h1>
        <ul class="we-create animated fadeInUp delay-1s">
        	<li>Agora toda a praticidade de gerenciar sua fazenda a apenas alguns clicks!</li>
        </ul>
    </div>
    <br/>
</section>



<section class="main-section" id="service"><!--main-section-start-->
	<div class="container">
    	<h2>Serviços Web</h2>
    	<h6>Veja os serviçoes que nosso sistema oferece.</h6>
        <div class="row">
        	<div class="col-lg-4 col-sm-6 wow fadeInLeft delay-05s">
            	<div class="service-list">
                	<div class="service-list-col1">
                    	<i class="fa fa-4x fa-wrench wow bounceIn text-primary"></i>
                    </div>
                	<div class="service-list-col2">
                        <h3>Praticidade</h3>
                        <p>Tudo o que você precisa para gerenciar seu rebanho em um único lugar.</p>
                    </div>
                </div>
                <div class="service-list">
                	<div class="service-list-col1">
                        <i class="fa fa-4x fa-folder-open wow bounceIn text-primary" data-wow-delay=".1s"></i>
                    </div>
                	<div class="service-list-col2">
                        <h3>Organização</h3>
                        <p>Troque as pilhas de papéis por um painel com muito mais espaço para informações e organização.</p>
                    </div>
                </div>
                <div class="service-list">
                	<div class="service-list-col1">
                        <i class="fa fa-4x fa-cloud-upload wow bounceIn text-primary" data-wow-delay=".2s"></i>
                    </div>
                	<div class="service-list-col2">
                        <h3>Segurança</h3>
                        <p>Seus dados todos salvos em um servidor e sempre acessíveis sem o risco de perda.</p>
                    </div>
                </div>
                <div class="service-list">
                	<div class="service-list-col1">
                    	<i class="fa-file-word-o"></i>
                    </div>
                	<div class="service-list-col2">
                        <h3>Relatorios</h3>
                        <p>Gera relatorios que ajudão no controle financeiro</p>
                    </div>
                </div>
            </div>
            <figure class="col-lg-8 col-sm-6  text-right wow fadeInUp delay-02s">
            	<img src="bootstrap/img/macbook-pro.png" alt="">
            </figure>
        
        </div>
	</div>
</section><!--main-section-end-->


<section id="app" class="main-section alabaster" style="background: url('bootstrap/img/pw_maze_black_2X.png'); color:white;">
        <div class="container-fluid">
            <div class="row no-  wow fadeInUp delay-04s">
            	<h2 style="color: white;">Portfolio de Funcionalidades</h2>
                <h4 class="text-center" style="color: white;">Com o SmartVillan gerenciar os seus rebanhos nunca
                        foi tão fácil!</h4>
                <div class="col-lg-4 col-sm-6">
                    <br><br><img src="bootstrap/img/1.jpg" class="img-responsive" alt="">
                    <div class="portfolio-box-caption">
                       	<div class="portfolio-box-caption-content">
                            <div class="project-category text-faded">
                                <h1 class="text-center">Controle do Leite</h1>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <br><br><img src="bootstrap/img/2.jpg" class="img-responsive" alt="">
                    <div class="portfolio-box-caption">
                        <div class="portfolio-box-caption-content">
                            <div class="project-category text-faded">
                               <h1 class="text-center">Controle Natalidade</h1>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <br><br><img src="bootstrap/img/3.jpg" class="img-responsive" alt="">
                    <div class="portfolio-box-caption">
                        <div class="portfolio-box-caption-content">
                            <div class="project-category text-faded">
                                <h1 class="text-center">Cadastro de Rebanho</h1>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <br><br><img src="bootstrap/img/4.jpg" class="img-responsive" alt="">
                    <div class="portfolio-box-caption">
                        <div class="portfolio-box-caption-content">
                            <div class="project-category text-faded">
                                <h1 class="text-center">Controle de Vacina</h2>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <br><br><img src="bootstrap/img/6.jpg" class="img-responsive" alt="">
                    <div class="portfolio-box-caption">
                        <div class="portfolio-box-caption-content">
                            <div class="project-category text-faded">
                                <h1 class="text-center">Controle de Carne</h1>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <br><br><img src="bootstrap/img/5.jpg" class="img-responsive" alt="">
                    <div class="portfolio-box-caption">
                        <div class="portfolio-box-caption-content">
                            <div class="project-category text-faded">
                                <h1 class="text-center">Controle Financeiro</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>

<section class="main-section paddind" id="Portfolio"><!--main-section-start-->
	<div class="container">
    	<h2>Ferramentas de Desenvolvimento</h2>
    	<h6>Linguagens Ultilizadas</h6>
      <div class="portfolioFilter">  
        <ul class="Portfolio-nav wow fadeIn delay-02s">
        	<li><a href="#" data-filter="*" class="current" >Todas</a></li>
            <li><a href="#" data-filter=".branding" >Estrutura</a></li>
            <li><a href="#" data-filter=".webdesign" >Web design</a></li>
            <li><a href="#" data-filter=".photography" >Animação</a></li>
            <li><a href="#" data-filter=".printdesign" >Banco de Dados</a></li>
        </ul>
       </div> 
        
	</div>
    <div class="portfolioContainer wow fadeInUp delay-04s">
        <div class=" Portfolio-box printdesign">
            <a href="#"><img src="bootstrap/img/Portfolio-pic1.jpg" alt=""></a>	
            <h3>PHP</h3>
            <p>Linguagem do lado Servidor</p>
        </div>
        <div class=" Portfolio-box printdesign">
            <a href="#"><img src="bootstrap/img/Portfolio-pic5.jpg" alt=""></a>	
            <h3>Mysqli</h3>
            <p>Acesso ao banco de dados</p>
        </div>
        <div class="Portfolio-box branding">
            <a href="#"><img src="bootstrap/img/Portfolio-pic2.jpg" alt=""></a>	
            <h3>HTML 5</h3>
            <p>Web Design</p>
        </div>
        <div class=" Portfolio-box webdesign">
           	<a><img src="bootstrap/img/Portfolio-pic3.jpg" alt=""></a>	
            <h3>CSS: Bootstrap</h3>
            <p>Desnig Responsivel</p>
        </div>
        <div class=" Portfolio-box photography">
            <a href="#"><img src="bootstrap/img/Portfolio-pic4.jpg" alt=""></a>	
            <h3>JavaScrip</h3>
            <p>Interatividade</p>
        </div>
        <div class=" Portfolio-box photography webdesign">
            <a href="#"><img src="bootstrap/img/Portfolio-pic6.jpg" alt=""></a>	
            <h3>Jquery</h3>
            <p>Animações</p>
        </div>
    </div>
</section><!--main-section-end-->


<section class="main-section header" id="client"><!--main-section client-part-start-->
	<div class="container">
    	<div class="row">
        	<div class="col-lg-12">
            	<h2 class="client-part-haead wow fadeInDown delay-05">Equipe desenvolvedora<h2><br>
            </div>
        </div>
    	<ul class="client wow fadeIn delay-05s">
        	<li><a href="#">
		        	<img src="bootstrap/img/client-pic1.jpg" alt="">
		            <h3>Anderson Alves</h3>
		            <span><a href=""></a></span>
		        </a>
            </li>
            <li><a href="#">
		        	<img src="bootstrap/img/client-pic2.jpg" alt="">
		            <h3>Allison Diêgo</h3>
		            <span><a href=""></a></span>
		        </a>
            </li>
            <li><a href="#">
		        	<img src="bootstrap/img/client-pic3.jpg" alt="">
		            <h3>Clara Pamplona</h3>
		            <span><a href="https://www.facebook.com/profile.php?id=100004380580130"></a></span>
		        </a>
            </li>
            <li><a href="#">
		        	<img src="bootstrap/img/client-pic4.jpg" width="190" alt="">
		            <h3>Lígia Dantas</h3>
		            <span><a href=""></a></span>
		        </a>
            </li>
        </ul>
    </div>
</section><!--main-section client-part-end-->
   	<div class="c-logo-part" style="background: black;"><!--c-logo-part-start-->
		<div class="container">
	    	<ul>
	        	<li><a href="#"><img src="bootstrap/img/c-liogo1.png" alt=""></a></li>
	            <li><a href="#"><img src="bootstrap/img/c-liogo2.png" alt=""></a></li>
	            <li><a href="#"><img src="bootstrap/img/c-liogo3.png" alt=""></a></li>
	            <li><a href="#"><img src="bootstrap/img/c-liogo4.png" alt=""></a></li>
	            <li><a href="#"><img src="bootstrap/img/c-liogo5.png" alt=""></a></li>
	    	</ul>
		</div>
	</div><!--c-logo-part-end-->
<section class="main-section contact" id="login">
    <div class="container">
        <div class="row">
                <?php 
                    if(isset($_SESSION['erro'])){
                        echo'
                            <div class="col-lg-12 col-sm-12">
                                <div class="alert alert-danger text-center">
                                    <h7>
                                        '.$_SESSION['erro'].'
                                    </h7>
                                </div><br>
                            </div>
                        ';
                        $_SESSION['erro']=null;
                    } 
                ?>
            <div class="col-lg-6 col-sm-6">
                <h2 class="section-heading">Faça seu Login</h2><br>
                <form action="login.php" method="POST">
                    <div class="row control-group">
                        <div class="form-group col-xs-12 floating-label-form-group controls">
                            <label>Matricula</label>
                            <input style="height: 60px;" type="text" class="form-control" placeholder="Nome de Usuario" id="nome_usuario" name="matricula">
                                <p class="help-block text-danger"></p>
                        </div>
                    </div>
                    <div class="row control-group">
                        <div class="form-group col-xs-12 floating-label-form-group controls">
                            <label>Senha</label>
                            <input style="height: 60px;"  type="password" class="form-control" placeholder="Senha" id="senha" name="senha">
                            <p class="help-block text-danger"></p>
                        </div>
                    </div><br>
                    <a href="" data-toggle="modal" data-target="#myModal"><b>Solicitação de Cadastro</b></a>
                    <div id="success"></div><br>
                    <div class="row">
                        <div class="form-group col-xs-12 text-center">
                            <br><button type="submit" class="btn btn-lg btn-primary">Entrar</button>
                        </div>
                    </div>       
                </form>
            </div>
        	<div class="col-lg-6 col-sm-6 wow fadeInLeft">
            <h2 class="section-heading">Fonte para contato</h2><br>
            	<div class="contact-info-box address clearfix">
                	<h3><i class=" icon-map-marker"></i>Address:</h3>
                	<span>308 Negra Arroyo Lane<br>Albuquerque, New Mexico, 87111.</span>
                </div>
                <div class="contact-info-box phone clearfix">
                	<h3><i class="fa-phone"></i>Phone:</h3>
                	<span>1-800-BOO-YAHH</span>
                </div>
                <div class="contact-info-box email clearfix">
                	<h3><i class="fa-pencil"></i>email:</h3>
                	<span>hello@knightstudios.com</span>
                </div>
            	<div class="contact-info-box hours clearfix">
                	<h3><i class="fa-clock-o"></i>Hours:</h3>
                	<span><strong>Monday - Thursday:</strong> 10am - 6pm<br><strong>Friday:</strong> People work on Fridays now?<br><strong>Saturday - Sunday:</strong> Best not to ask.</span>
                </div>
                <div class="col-md-12">
                <div class="text-center">
                    <ul class="social-link">
                        <li class="facebook"><a href="#"><i class="fa-facebook"></i></a></li>
                        <li class="pinterest"><a href="#"><i class="fa-pinterest"></i></a></li>
                        <li class="facebook"><a href="#"><i class="fa-facebook"></i></a></li>
                        <li class="gplus"><a href="#"><i class="fa-google-plus"></i></a></li>
                        <li class="facebook"><a href="#"><i class="fa-facebook"></i></a></li>
                        <li class="dribbble"><a href="#"><i class="fa-dribbble"></i></a></li>
                        <li class="facebook"><a href="#"><i class="fa-facebook"></i></a></li>
                    </ul>
                </div>
                </div>
            </div>
        </div>
    </div>
</section>
<footer class="footer" id="footer">
    <div class="container">
        <span class="copyright">INFORMATICA © 2016 | <a href="http://bootstraptaste.com/">IFRN</a> Campus Apodi</span>
    </div>

</footer>
<!--[if IE]><style type="text/css">.pie {behavior:url(PIE.htc);}</style><![endif]-->
<script type="text/javascript" src="bootstrap/jquery/jquery.1.8.3.min.js"></script>
<script type="text/javascript" src="bootstrap/jquery/bootstrap.js"></script>
<script type="text/javascript" src="bootstrap/jquery/jquery-scrolltofixed.js"></script>
<script type="text/javascript" src="bootstrap/jquery/jquery.easing.1.3.js"></script>
<script type="text/javascript" src="bootstrap/jquery/jquery.isotope.js"></script>
<script type="text/javascript" src="bootstrap/jquery/wow.js"></script>
<script type="text/javascript" src="bootstrap/jquery/classie.js"></script>
<script src="js/index.js"></script>
</body>
</html>