<?php
	
	namespace App\Core;
	
	use App\Model\Manager\UserManager;
	
	/**
	 * Classe qui gère le routage
	 */
	class Router
	{
		/**
		 * @var array
		 */
		private array $routes = [];
		
		/**
		 * @param string $path
		 * @param string $controller
		 * @param string $method
		 *
		 * @return void
		 */
		public function add( string $path, string $controller, string $method ) : void
		{
			$this->routes[ $path ] = ["controller" => $controller, "method" => $method];
		}
		
		/**
		 * @param string $uri
		 *
		 * @return mixed
		 */
		public function dispatch( string $uri ) : mixed
		{
			foreach( $this->routes as $path => $route ) {
				// Utilisation d'une expression régulière pour capter l'ID dans l'URL
				if( preg_match( "#^" . $path . "$#", $uri, $matches ) ) {
					// Crée une instance de UserManager
					$userManager = new UserManager();
					
					// Injecte UserManager dans le contrôleur
					$controller = new $route['controller']( $userManager );
					
					$method = $route['method'];
					if( method_exists( $controller, $method ) ) {
						// Passe l'ID capturé comme argument
						return $controller->$method( ...array_slice( $matches, 1 ) );
					}
				}
			}
			
			return "404 Not Found";
		}
	}
