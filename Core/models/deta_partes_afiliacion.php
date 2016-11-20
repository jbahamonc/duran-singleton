<?php 
	namespace Core\models;

	use \Core\Conexion;

	/**
	* Clase que gestiona el acceso a la informacion de los vehiculos
	*/
	class DetallePartesAfiliacion {
		
		public static function insert($id_a, $obj) {
			try {
	            $connection = Conexion::instance();
	            $sql = "INSERT INTO detalle_partes_afiliacion(id_afiliacion, id_partes, descripcion) VALUES(?,?,?)";
	            $query = $connection->prepare($sql);
	            $query->bindParam(1, $id_a, \PDO::PARAM_INT);
	            foreach ($obj[0] as $key => $value) {
	            	$query->bindParam(2, $key, \PDO::PARAM_INT);
	            	$query->bindParam(3, $value, \PDO::PARAM_STR);
	            	$query->execute();
				}    
	        }
	        catch(\PDOException $e) {
	            print "Error!: " . $e->getMessage();
	        }
	    }

	}