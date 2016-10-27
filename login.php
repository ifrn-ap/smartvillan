<?php
	session_start();
	ob_start();
	require_once 'controlador.php';
	require_once 'ldap.php';
	//$ldap = new ldap('LDAP://10.182.0.155');
	$control = new Controlador();	
	$resp = $control->login();
	if(!is_null($resp)){//&&($ladp->autentica($_POST['matricula'], $_POST['senha'])){
		$_SESSION['user'] = $resp;
		header('Location: views.php?acao=add-painel');
	}else{
		$_SESSION['erro'] = "Erro! E-mail e/ou Senha incorretos!<br/>";
		header('Location: index.php#login');
	}
?>