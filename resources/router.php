<?php

	class ROUTE{
		
		private static $actualRoute;
		
		public static function create($routes){
			$routes = json_decode($routes);
			$noRoute = true;
			if(URL == ''){
				foreach($routes as $route){
					if($route->url == 'home'){
						self::$actualRoute = $route; 
					}
				}
			}else{
				foreach($routes as $route){
					if(URL == $route->url){
						$noRoute = false;
						self::$actualRoute = $route;	
					}
				};
				if($noRoute == true){
					echo 'ERRO 404';
				}
			}
		}
		
		public static function title(){
			if(self::$actualRoute->title !== "" || !isset(self::$actualRoute)){
				return self::$actualRoute->title;
			}else{
				return "Error 404";
			}
		}
		
		public static function body(){
			return self::$actualRoute->body;
		}
		
		public static function requireMain(){
			if(self::$actualRoute->main){
				require_once(self::$actualRoute->main);
			}
		}
		
		public static function css(){
			$returnText = "";
			if(self::$actualRoute->css){
				if(is_array(self::$actualRoute->css)){
					foreach(self::$actualRoute->css as $css){
						$returnText .= "<link rel='stylesheet' href='".$css."'/>";
					}
				}else{
					$returnText = "<link rel='stylesheet' href='".self::$actualRoute->css."'/>";
				}
				
			}
			return $returnText;
		}
		
		public static function js(){
			$returnText = "";
			if(self::$actualRoute->js){
				if(is_array(self::$actualRoute->js)){
					foreach(self::$actualRoute->js as $js){
						$returnText .= "<script src='".$js."'></script>";
					}
				}else{
					$returnText = "<script src='".self::$actualRoute->js."'></script>";
				}
				
			}
			return $returnText;
		}
		
	}
?>