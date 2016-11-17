<?php 

	namespace Core\Controller;

	use \Core\View;
	
	/**
	* Controlador de la clase principal index
	*/
	class home {
		
		function __construct() {}

		function index() {
			View::set("saludo", "Bienvenido a la plataforma de gestion de vehiculos Duran");
			View::set("descPanel", "A continuacion usted encontrara una serie de estadisticas e información ");
			View::render("home" . DS . "home");
		}
	}

