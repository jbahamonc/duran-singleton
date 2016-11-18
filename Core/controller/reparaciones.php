<?php 
	namespace Core\controller;

	use \Core\View;

	/**
	* Controlador de siniestros
	*/
	class Reparaciones {
		
		function __construct() {}

		function index() {
			View::set("saludo", "Panel de Registro de Reparaciones");
			View::set("descPanel", "A continuacion encontrara el formulario de registro de Reparaciones");
			View::render("reparacion" . DS . "reparacion");
		}
	}