<?php 
	namespace Core\models;

	use \Core\Conexion;

	/**
	* Clase que gestiona el acceso a la informacion de los usuarios
	*/
	class User {
		
		public static function insert($id, $name, $phone, $dir) {
			try {
	            $connection = Conexion::instance();
	            $sql = "INSERT INTO usuario(identificacion,nombre_completo,telefono,direccion) VALUES(?,?,?,?)";
	            $query = $connection->prepare($sql);
	            $query->bindParam(1, $id, \PDO::PARAM_STR);
	            $query->bindParam(2, $name, \PDO::PARAM_STR);
	            $query->bindParam(3, $phone, \PDO::PARAM_STR);
	            $query->bindParam(4, $dir, \PDO::PARAM_STR);
	            return $query->execute();
	        }
	        catch(\PDOException $e)
	        {
	            print "Error!: " . $e->getMessage();
	        }
	    }
	}