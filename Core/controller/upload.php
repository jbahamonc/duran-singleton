<?php

	namespace Core\Controller;

	/**
	*  Controlador que gestiona la subida de las imagenes al servidor
	*/
	class Upload{

		/**
		 * @var folder indica la raiz donde se alojan los archivos
		 */
		private $folder = "archivo";

		function fileUpload($placa, $folder) {

			if (!empty($_FILES) and !empty($placa) and !empty($folder)) {

				$path = $this->folder . DS . $placa . DS . $folder . DS;

				if (!file_exists($path)) { 
				    mkdir($path, 0777, true);	
				}

				for ($i = 0; $i < count($_FILES['file']['name']); $i++) {

					$tempFile = $_FILES['file']['tmp_name'][$i];    
				    $targetFile =  $_FILES['file']['name'][$i]; 				      
				 
				    if(move_uploaded_file($tempFile, $path . $targetFile)) {
				    	echo "archivo subido";
				    	// Agregar a la DB
				    } else {
				     	throw new \Exception("Error Processing File", 1);
				     	
					}
				}	    
			}
		}

		function delete($placa, $folder) {

			if (!empty($placa) and !empty($folder)) {
					
				$file = $_POST['filename'];
				$path = $this->folder . DS . $placa . DS . $folder . DS;			

				if (file_exists($path . $file)) {
					unlink($path . $file);
					echo json_encode(array('response' => true));
				} 
				else {
					echo json_encode(array('response' => false));
					
				}
				
			} else {
				echo json_encode(array('response' => false));
				
			}
		}
	}

	
		

