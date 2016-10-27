<?php
    $xml = new SimpleXMLElement('<xml/>');
	ob_start();
    session_start();
    date_default_timezone_set('America/Sao_Paulo');
    include 'controlador.php';
    $control = new Controlador;
    if($_SERVER['REQUEST_METHOD']=='GET'){
        if($_GET['acao']=='listar-animal') $control->applistar_animal();
        if($_GET['acao']=='perfil-animal') $control->appperfil_animal();
        if($_GET['acao']=='mostrar-calendario') $control->appmostrar_calendario();
         if($_GET['acao']=='mostrar-estoque') $control->appmostrar_estoque();
        if($_GET['acao']=='login') $control->applogin();
    }
    include 'morris.php';
    header("Access-Control-Allow-Origin:*");
 ?>