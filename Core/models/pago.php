<?php 
	namespace Core\models;

	use Core\Conexion;

	/**
	* Clase que se encarga de gestionar los pagos de los usuarios
	*/
	class Pago {
		
		public static function truePayments() {
			try {
				$connect = Conexion::instance();
				$sql = "SELECT p.fecha FROM pagos p WHERE p.fecha =" . date("d/m/y");
				$query= $connect->prepare($sql);
				$query->execute();
				return ($connect->num_rows($sql) > 0);				

			} catch (\PDOException $e) {
				 print "Error!: " . $e->getMessage();
			}
		}
	}