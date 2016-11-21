<?php 

	namespace Core\Controller;

	use \Core\View,
	\Core\models\Pago,
	\App\plugins\DownloadAttachments as DA;
	
	/**
	* Controlador de la clase principal index
	*/
	class Pagos {
		
		function __construct() {}

		function index() {
			View::set("saludo", "Panel de Administracion de Pagos");
			View::set("descPanel", "A continuacion usted encontrara informacion referente a los pagos realizados por los clientes");			
			if($this->validatePayments()) {
				$lisPagos = $this->getPayments();
				View::set("listPagos", $lisPagos);
			} else {
				View::set("lisPagos", "");				
				View::render("pagos" . DS . "pagos");
			}
		}

		private function validatePayments() {
			return Pago::truePayments();
		}
	}

