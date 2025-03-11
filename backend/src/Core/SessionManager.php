<?php
	
	namespace App\Core;
	
	use App\Model\Entity\Users;
	
	/**
	 * Class qui gère la session
	 */
	class SessionManager
	{
		/**
		 * Lance la session si elle n’est pas déjà active.
		 */
		public static function start() : void
		{
			if( session_status() === PHP_SESSION_NONE ) {
				session_start();
			}
		}
		
		/**
		 * Définis une valeur dans la session.
		 *
		 * @param string $key
		 * @param mixed  $value
		 */
		public static function set( string $key, mixed $value ) : void
		{
			self::start();
			$_SESSION[ $key ] = $value;
		}
		
		/**
		 * Récupère une valeur de la session.
		 *
		 * @param string $key
		 *
		 * @return mixed|null
		 */
		public static function get( string $key ) : mixed
		{
			self::start();
			return $_SESSION[ $key ] ?? null;
		}
		
		/**
		 * Supprime une clé de la session.
		 *
		 * @param string $key
		 */
		public static function remove( string $key ) : void
		{
			self::start();
			unset( $_SESSION[ $key ] );
		}
		
		/**
		 * Vérifie si l'utilisateur est connecté
		 *
		 * @return bool
		 */
		public static function isLoggedIn() : bool
		{
			return isset( $_SESSION['user_id'] );
		}
		
		/**
		 * Vérifie si l'utilisateur est un administrateur
		 *
		 * @return bool
		 */
		public static function isAdmin() : bool
		{
			if( self::getUser() && self::getUser()->getEmail() == "mathieu.stamm@gmail.com" ) {
				return true;
			}
			return false;
		}
		
		public static function getUser() : ?Users
		{
			if( !isset( $_SESSION['user_id'], $_SESSION['user_name'], $_SESSION['user_email'] ) ) {
				return null;
			}
			
			$user = new Users();
			$user->setId( $_SESSION['user_id'] )
				->setName( $_SESSION['user_name'] )
				->setEmail( $_SESSION['user_email'] );
			
			return $user;
		}
		
		
		/**
		 * Déconnecte l'utilisateur
		 */
		public static function logout() : void
		{
			session_start();
			session_unset();
			session_destroy();
			header( 'Location: /' );
		}
	}
