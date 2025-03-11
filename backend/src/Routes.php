<?php
	
	namespace App;
	
	use App\Controller\ProfileController;
	use App\Controller\UserController;
	use App\Controller\HomeController;
	use App\Core\Router;
	
	/**
	 * Classes qui contients les routes.
	 */
	class Routes
	{
		/**
		 * @var Router
		 */
		private Router $router;
		
		/**
		 * @param Router $router
		 */
		public function __construct( Router $router )
		{
			$this->router = $router;
		}
		
		/**
		 * @return void
		 */
		public function routes() : void
		{
			$router = $this->router;
			
			// Sécurity
			$router->add( "/", HomeController::class, "index" );
			$router->add( "/users", ProfileController::class, "listUsers" );
			$router->add( "/user/show/(\d+)", ProfileController::class, "showUser" );
			$router->add( "/publicUser/show/(\d+)", ProfileController::class, "showPublicUser" );
			$router->add( "/registerForm", UserController::class, "createUserForm" );
			$router->add( "/register", UserController::class, "createUserAction" );
			$router->add( "/loginForm", UserController::class, "createLoginForm" );
			$router->add( "/login", UserController::class, "loginAction" );
			$router->add( "/user/edit/(\d+)", UserController::class, "editUser" );
			$router->add( "/user/delete/(\d+)", UserController::class, "deleteUser" );
			$router->add( "/logout", UserController::class, "logout" );
			
			
			$this->router->dispatch( $_SERVER['REQUEST_URI'] );
		}
	}
