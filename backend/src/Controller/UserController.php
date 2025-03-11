<?php
	
	namespace App\Controller;
	
	use App\Core\Controller;
	use App\Core\SessionManager;
	use App\Model\Manager\UserManager;
	use Exception;
	
	class UserController extends Controller
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
		public function createUserForm() : void
		{
			$title = "Page d'inscription";
			$this->guestRender( 'security/Forms/Register', ["title" => $title] );
		}
		
		/**
		 * @throws Exception
		 */
		public function createUserAction() : void
		{
			if( $_SERVER['REQUEST_METHOD'] === 'POST' ) {
				$name = filter_input( INPUT_POST, 'name', FILTER_SANITIZE_FULL_SPECIAL_CHARS );
				$email = filter_input( INPUT_POST, 'email', FILTER_SANITIZE_EMAIL );
				$password = filter_input( INPUT_POST, 'password', FILTER_SANITIZE_FULL_SPECIAL_CHARS );
				
				if( !$name || !$email || !$password ) {
					SessionManager::set( 'warning', "Tous les champs sont requis." );
					header( 'Location: /registerForm' );
					exit;
				}
				
				try {
					$this->userManager->createUser( $name, $email, $password );
					SessionManager::set( 'success', "Utilisateur créé avec succès !" );
					header( 'Location: /loginForm' );
					exit;
				} catch( Exception $e ) {
					SessionManager::set( 'error', "Erreur lors de la création de l'utilisateur: " . $e->getMessage() );
					header( 'Location: /registerForm' );
					exit;
				}
			}
			
			$this->createUserForm();
		}
		
		
		/**
		 * @return void
		 */
		public function createLoginForm() : void
		{
			$title = "Page de Connexion";
			$this->guestRender( 'security/Forms/Login', ["title" => $title] );
		}
		
		/**
		 * Gère la soumission du formulaire de login
		 *
		 * @return void
		 * @throws Exception
		 */
		public function loginAction() : void
		{
			if( $_SERVER['REQUEST_METHOD'] === 'POST' ) {
				$email = filter_input( INPUT_POST, 'email', FILTER_SANITIZE_EMAIL );
				$password = filter_input( INPUT_POST, 'password', FILTER_SANITIZE_FULL_SPECIAL_CHARS );
				
				$user = $this->userManager->getUserByEmail( $email );
				
				if( $user && password_verify( $password, $user->password ) ) {
					$_SESSION['user_id'] = $user->id_user;
					$_SESSION['user_email'] = $user->email;
					$_SESSION['user_name'] = $user->name;
					
					SessionManager::set( 'success', "Vous êtes bien Connecté." );
					header( 'Location: /' );
				} else {
					SessionManager::set( 'error', "Identifiant incorect." );
					header( 'Location: /loginForm' );
				}
				exit;
			}
		}
		
		/**
		 * @throws Exception
		 */
		public function editUser( int $id_user ) : void
		{
			$user = $this->userManager->getUserById( $id_user );
			if( !$user ) {
				SessionManager::set( 'warning', "Utilisateur non trouvé." );
				header( 'Location: /users' );
				exit;
			}
			
			if( $_SERVER['REQUEST_METHOD'] === 'POST' ) {
				$name = filter_input( INPUT_POST, 'name', FILTER_SANITIZE_FULL_SPECIAL_CHARS );
				$email = filter_input( INPUT_POST, 'email', FILTER_SANITIZE_EMAIL );
				$password = filter_input( INPUT_POST, 'password', FILTER_SANITIZE_FULL_SPECIAL_CHARS );
				
				$this->userManager->updateUser( $id_user, $name, $email, $password );
				SessionManager::set( 'success', "Utilisateur mis à jour avec succès !" );
				header( 'Location: /users' );
				exit;
			}
			
			$title = "Edition de " . $user->getName();
			$this->render( 'security/Forms/editUser', ['user' => $user, 'title' => $title] );
		}
		
		/**
		 * @throws Exception
		 */
		public function deleteUser( int $id_user ) : void
		{
			$user = $this->userManager->getUserById( $id_user );
			if( !$user ) {
				SessionManager::set( 'warning', "Utilisateur non trouvé." );
				header( 'Location: /users' );
				exit;
			}
			
			$this->userManager->deleteUser( $id_user );
			SessionManager::set( 'success', "Utilisateur supprimé avec succès." );
			header( 'Location: /users' );
			exit;
		}
		
		/**
		 * @return void
		 */
		public function logout() : void
		{
			SessionManager::logout();
		}
		
	}
