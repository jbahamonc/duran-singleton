<?php 

	namespace Core\Controller;

	use \Core\View;
	
	/**
	* Controlador de la clase principal index
	*/
	class Pagos {
		
		function __construct() {}

		function index() {
			View::set("saludo", "Panel de Administracion de Pagos");
			View::set("descPanel", "A continuacion usted encontrara informacion referente a los pagos realizados por los clientes");
			View::render("pagos" . DS . "pagos");
		}

		function getAttachment() {
			
		}
	}

