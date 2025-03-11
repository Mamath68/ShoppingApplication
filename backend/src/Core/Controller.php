<?php
	
	namespace App\Core;
	
	/**
	 * Class qui gère le render des vues
	 */
	class Controller
	{
		/**
		 * @param string $view
		 * @param array  $data
		 *
		 * @return void
		 */
		public function render( string $view, array $data = [] ) : void
		{
			extract( $data );
			
			ob_start();
			include VIEW_DIR . "/$view.html.php";
			$content = ob_get_clean();
			
			include LAYOUT_DIR . "/main.html.php";
		}
		
		public function guestRender( string $view, array $data = [] ) : void
		{
			extract( $data );
			
			ob_start();
			include VIEW_DIR . "/$view.html.php";
			$content = ob_get_clean();
			
			include LAYOUT_DIR . "/guest.html.php";
		}
	}
