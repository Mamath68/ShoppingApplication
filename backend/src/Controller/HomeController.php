<?php
	
	namespace App\Controller;
	
	use App\Core\Controller;
	use App\Core\SessionManager;
	
	class HomeController extends Controller
	{
		/**
		 * @return void
		 */
		public function index() : void
		{
			if( !SessionManager::isLoggedIn() ) {
				// Redirige vers la page de login si l'utilisateur n’est pas connecté
				header( 'Location: /loginForm' );
				exit;
			}
			$title = "Accueil";
			$this->render( 'Home', ['title' => $title] );
		}
	}
