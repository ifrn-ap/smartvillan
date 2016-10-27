<?php
	session_start();
	require_once 'Controlador.php';
	$control = new Controlador();
	$control->logout();
?>