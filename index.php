<?php

header('Content-Type: text/html; charset=utf-8');
	if ( session_id() == '' ) {
		session_start();
	}
	
	include_once("config/constantes.php");
	
	include_once(CONTROLLER_DIR."Home.php");
	
	require_once ROOT."/libs/Smarty.class.php";
	
	$parametros = count($_GET) ? $_GET : $_POST;
	
	$classe = isset($parametros['classe']) ? $parametros['classe'] : 'Home';
	
	if ( class_exists($classe) ) {
		$objeto = new $classe();
	} else {
		$objeto = new Busca();	
	}
	
	$metodo = isset($parametros['metodo']) ? $parametros['metodo'] : 'index';
	
	if ( !method_exists( $objeto, $metodo ) && !is_callable( array($objeto, $metodo) ) ) {
		$metodo = 'index';			
	} 
	

	
	$objeto->$metodo();
	
?>