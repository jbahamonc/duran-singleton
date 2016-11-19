<?php 

	namespace Core\Controller;

	use \Core\View;
	
	/**
	* Controlador de la clase principal index
	*/
	class Afiliaciones {
		
		function __construct() {}

		function index() {
			View::set("saludo", "Panel de Registro de Afiliaciones");
			View::set("descPanel", "A continuacion encontrara el formulario para el registro de afiliaciones");
			View::render("registro" . DS . "afiliaciones");
		}

		function save() {
			if (isset($_POST[''])) {
				# code...
			}
		}
	}