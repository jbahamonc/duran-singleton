<?php 

	namespace Core\Controller;

	use \Core\View,
		\Core\models\User,
		\Core\models\Vehiculo,
		\Core\models\Afiliacion,
		\Core\models\DetallePartesAfiliacion as dpa;
	
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
			if (isset($_POST)) {
				$json = json_decode($_POST['json']);
				$resUser = User::insert($json->id, $json->nombre, $json->tel, $json->dir);
				$resVehi = Vehiculo::insert($json->placa, $json->modelo, $json->marca);
				$resAfi = Afiliacion::insert($json->placa);
				$resAfiMaxId = Afiliacion::getMaxId();
				$resDPA = dpa::insert($resAfiMaxId[0], $json->partes);
				//return ($resUser && $resVehi && $resAfi);
			}
		}
	}