<?php

include('/controller/db.class.php');

function error() {
	ob_end_clean();
	include('error.php');
	exit;
}

function index($name,$result='',$result2='',$result3='',$messegError='') {
	$path = 'view/'.$name.'.php';
	ob_start();
	if(!include($path)) error();
	return ob_get_clean();
}

function clear($value) {
	$value = trim($value); 
	$value = mysql_real_escape_string($value);
	$value = htmlspecialchars($value);
	return $value;
}

//routing
$priQuery = explode("/",clear($_GET["alpha"]));
$query = $priQuery;

if($query[0] != '') {
	$controller = $query[0];
	unset($query[0]);
	$action = array_values($query);
} else $controller = 'controller';

//loading
$controllPath = 'controller/'.$controller.'.php';
if(file_exists($controllPath)){
	include($controllPath);
} else {
	echo 'все плохо';
	//error();
}

include('view/layout.php');

?>