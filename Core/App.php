<?php 

	namespace Core;

	include 'controller/home.php';
	include 'controller/afiliaciones.php';
	include 'controller/upload.php';
	include 'controller/siniestro.php';
	include 'controller/reparaciones.php';
	include 'controller/pagos.php';

	include 'models/user.php';
	include 'models/vehiculo.php';
	include 'models/afiliacion.php';
	include 'models/deta_partes_afiliacion.php';
	include 'models/pago.php';
	
	include 'Core/views.php';
	include 'Database.php';

	/**
	* Clase que se encarga de gestionar las peticiones a los controladores
	*/
	class App {

		/**
		 * @var $_instancia almacenara una unica instancia de la clase App
		 */
		private static $_instancia;

		/**
		 * @var $_controller almacenara el nombre del controlador que enviemos por get
		 */
		private $_controller;

		/**
		 * @var $_medoto almacenara el nombre del metodo ha ejecutar por defecto es index
		 */
		private $_method = "index";

		/**
		 * @var $_params almacenara los parametro que se pasen por get
		 */
		private $_params = [];

		/**
		 * @var NAMESPACE_CONTROLLERS almanece el namespace de los controladores
		 */
		const NAMESPACE_CONTROLLERS = "\Core\Controller\\";

		/**
	     * @var CONTROLLERS_PATH almacena la ruta a los controladores
	     */
	    const CONTROLLERS_PATH = "Core/controller/";
		
		private function __construct () {

			 //obtenemos la url parseada
        	$url = $this->parseUrl();

        	if (!empty($url[0])) {  

				//comprobamos que exista el archivo en el directorio Controllers
				if (file_exists(self::CONTROLLERS_PATH . ucfirst($url[0]) . ".php")) {
					
					$this->_controller = ucfirst($url[0]);
					unset($url[0]);
				}
				else {
					//echo self::CONTROLLERS_PATH . ucfirst($url[0]) . ".php";
					include VIEWSPATH . DS . "errors" . DS . "404.php";
	        		exit;
				}
			}
			else {
				$this->_controller = "home";
			}

			//obtenemos la clase con su espacio de nombres
    		$fullClass = self::NAMESPACE_CONTROLLERS . $this->_controller;

    		//asociamos la instancia a $this->_controller
    		$this->_controller = new $fullClass;

    		// validamos si existe un metodo
    		if (isset($url[1])) {
    			
    			 //aquí tenemos el método
            	$this->_method = $url[1];

    			// si existe un metodo procedemos a borrar la posicion correspondiente
    			if (method_exists($this->_controller, $this->_method)) {
    				
    				unset($url[1]);
    			}
    			else {
    				throw new \Exception("Error Processing Method {$this->_method}", 1);
    			}
    		}
			
			//asociamos el resto del array a $this->_params para pasarlos al método llamado, por defecto será un array vacío
        	$this->_params = $url ? array_values($url) : [];

		}

		public static function getInstance() {
	        if (!isset(self::$_instancia)) {

	            self::$_instancia = new self;
	        } 
	        return self::$_instancia;
	    }

		public function run() {

	        call_user_func_array(array($this->_controller, $this->_method), $this->_params);
	    }

		/**
	     * 
	     * @return [array] [contiene la descripcion del controlador el metodo y los parametros]
	     */
	    public function parseUrl() {
	        if(isset($_GET["url"])) {
	            return explode("/", filter_var(rtrim($_GET["url"], "/"), FILTER_SANITIZE_URL));
	        }
	    }

	    /**
	     * [getConfig Obtenemos la configuración de la app]
	     * @return [Array] [Array con la Config]
	     */
	    public static function getConfig() {
	        return parse_ini_file(PROJECTPATH . DS . 'App/config/config.ini');
	    }
	}