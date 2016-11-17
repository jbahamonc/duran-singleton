<?php 
	namespace Core\controller;

	use \Core\View;

	/**
	* Controlador de siniestros
	*/
	class Siniestro {
		
		function __construct() {}

		function index() {
			View::set("saludo", "Panel de Registro de Siniestros");
			View::set("descPanel", "A continuacion encontrara el formulario de registro de siniestros");
			View::render("siniestro" . DS . "siniestro");
		}
	}