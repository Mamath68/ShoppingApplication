<?php
	
	namespace App\Controller;
	
	use App\Core\Controller;
	use App\Core\SessionManager;
	use App\Model\Manager\UserManager;
	
	class ProfileController extends Controller
	{
		
		/**
		 * @var UserManager
		 */
		private UserManager $userManager;
		
		/**
		 * @param UserManager $userManager
		 */
		public function __construct( UserManager $userManager )
		{
			$this->userManager = $userManager;
		}
		
		/**
		 * @return void
		 */
		public function listUsers() : void
		{
			if( !SessionManager::isAdmin() ) {
				SessionManager::set( "error", "Vous n'êtes pas Administrateur, vous n'avez pas accès a cette page" );
				header( 'Location: /' );
				exit;
			}
			$users = $this->userManager->getAllUsers();
			$title = "Les Utilisateurs";
			$this->render( 'security/Profile/users', ['users' => $users, 'title' => $title] );
		}
		
		
		/**
		 * @param int $id_user
		 *
		 * @return void
		 */
		public function showUser( int $id_user ) : void
		{
			$user = $this->userManager->getUserById( $id_user );
			if( !$user ) {
				echo "Utilisateur non trouvé.";
				return;
			}
			$title = "Profile de: " . SessionManager::getUser()->getName();
			$this->render( 'security/Profile/showUser', ['user' => $user, 'title' => $title] );
		}
		
		/**
		 * @param int $id_user
		 *
		 * @return void
		 */
		public function showPublicUser( int $id_user ) : void
		{
			$user = $this->userManager->getUserById( $id_user );
			if( !$user ) {
				echo "Utilisateur non trouvé.";
				return;
			}
			
			$title = "Profile de: " . $user->getName();
			$this->render( 'security/Profile/showUser', ['user' => $user, 'title' => $title] );
		}
	}
