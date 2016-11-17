<?php

	namespace Core\Controller;

	use \Core\View;

	/**
	*  Controlador que gestiona la subida de las imagenes al servidor
	*/
	class Upload{

		/**
		 * @var folder indica la raiz donde se alojan los archivos de las afiliaciones
		 */
		private $folder = "archivo";

		/**
		 * @var placa indica el nombre de carpeta correspondiente a cada placa
		 */
		private $placa;
		
		function __construct() {}

		function fileUpload($placa) {

			if (!empty($_FILES)) {

				$this->placa = $placa;

				$this->folder .= DS . $this->placa . DS	. "afiliacion" . DS;

				if (!file_exists($this->folder)) { 
				    mkdir($this->folder, 0777, true);	
				}

				for ($i = 0; $i < count($_FILES['file']['name']); $i++) {

					$tempFile = $_FILES['file']['tmp_name'][$i];    
				    $targetFile =  $_FILES['file']['name'][$i]; 				      
				 
				    if(move_uploaded_file($tempFile, $this->folder . $targetFile)) {
				    	echo "archivo subido";
				    	// Agregar a la DB
				    } else {
				     	throw new \Exception("Error Processing File", 1);
				     	
					}
				}	    
			}
		}

		function delete() {

			if (!empty($this->placa)) {			
					
				$file = $_POST['filename'];

				if (file_exists($this->folder . $file)) {
					unlink($this->folder . $file);
					echo json_encode(array('exito' => true));
				} 
				else {
					//echo json_encode(array('exito' => false));
					throw new \Exception("Error Processing Request", 1);
					
				}
				
			} else {
				//echo json_encode(array('exito' => false));
				throw new \Exception("Error Processing Request", 1);
				
			}
		}
	}

	
		

