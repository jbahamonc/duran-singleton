<?php 
	namespace Core\models;

	use \Core\Conexion;

	/**
	* Clase que gestiona el acceso a la informacion de los vehiculos
	*/
	class Afiliacion{
		
		public static function insert($placa) {
			try {
	            $connection = Conexion::instance();
	            $fecha = date("d/m/Y");
	            $sql = "INSERT INTO afiliacion(placa,fecha) VALUES(?,?)";
	            $query = $connection->prepare($sql);
	            $query->bindParam(1, $placa, \PDO::PARAM_STR);
	            $query->bindParam(2, $fecha, \PDO::PARAM_STR);
	            $query->execute();
	        }
	        catch(\PDOException $e)
	        {
	            print "Error!: " . $e->getMessage();
	        }
	    }

	    public static function getMaxId() {
	    	try {
	            $connection = Conexion::instance();
	            $sql = "SELECT MAX(a.id) as id FROM afiliacion a";
	            $query = $connection->prepare($sql);
	            $query->execute();
	            return $query->fetch();
	        }
	        catch(\PDOException $e) {
	            print "Error!: " . $e->getMessage();
	        }
	    }
	}