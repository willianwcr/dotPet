<?php
	#CONFIGURAÇÕES GERAIS
	date_default_timezone_set('America/Sao_Paulo');
	header('Access-Control-Allow-Origin: *');
	header('Content-Type: text/html; charset=UTF-8');
	ob_start();
	session_start();

	#REQUIRES
	require_once('resources/functions.php');
	require_once('resources/router.php');
	if(isset($_SERVER['PATH_INFO'])){
		DEFINE('URL', $_SERVER['PATH_INFO']);
	}else{
		DEFINE('URL', '/');
	}
	
	#INICIA O ROUTER
	$routes = [
		[
			'url' => '/',
			'permission' => '',
			'title' => 'Página Inicial',
			'main' => 'views/home/index.php',
			'css' => '/views/home/style.css',
			'js' => '/views/home/script.js'
		],
		[
			'url' => '/login',
			'title' => 'Login',
			'main' => 'views/login/index.php',
			'css' => '/views/login/style.css',
			'js' => '/views/login/script.js'
		],
		[
			'url' => '/animal',
			'animal' => 'Lista de animais'
		]
	];
	
	ROUTE::create(json_encode($routes));

?>
<!DOCTYPE html>
<html>
	<head>
		<title>
		<?php
			echo ROUTE::title().' - dotPet';
		?>
		</title>
		<link rel="shortcut icon" href="/images/favicon.png" />
		<link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
		<script src="https://kit.fontawesome.com/ac7344cbc2.js" crossorigin="anonymous"></script>
		<?php
			require_once('resources/header.php');
			installCss('/resources/style.css');
			echo ROUTE::css();
		?>
	</head>
	<body>
		<?php
			ROUTE::requireMain();
		?>
		<script type="text/javascript" src="https://code.jquery.com/jquery-latest.min.js"></script>
		<script src="/resources/functions.js"></script>
		<?php
			echo ROUTE::js();
		?>
	</body>
</html>
