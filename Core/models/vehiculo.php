<?php 
	namespace Core\models;

	use \Core\Conexion;

	/**
	* Clase que gestiona el acceso a la informacion de los vehiculos
	*/
	class Vehiculo {
		
		public static function insert($placa, $modelo, $marca) {
			try {
	            $connection = Conexion::instance();
	            $sql = "INSERT INTO vehiculo(placa, modelo, marca) VALUES(?,?,?)";
	            $query = $connection->prepare($sql);
	            $query->bindParam(1, $placa, \PDO::PARAM_STR);
	            $query->bindParam(2, $modelo, \PDO::PARAM_STR);
	            $query->bindParam(3, $marca, \PDO::PARAM_INT);
	            return $query->execute();
	        }
	        catch(\PDOException $e)
	        {
	            print "Error!: " . $e->getMessage();
	        }
	    }
	}