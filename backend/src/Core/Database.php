<?php
	
	namespace App\Core;
	
	use PDO;
	use PDOException;
	
	/**
	 * Class Qui gère la connexion à la Base de donnée
	 */
	class Database
	{
		/**
		 * @var Database|null
		 */
		private static ?Database $instance = null;
		/**
		 * @var PDO
		 */
		private PDO $pdo;
		
		/**
		 * Constructeur qui gère la connexion
		 */
		private function __construct()
		{
			$dbHost = "127.0.0.1";
			$dbName = "php-expo-native";
			$dbUser = "Mamath68200";
			$dbPass = "Teutin@181166";
			
			try {
				$this->pdo = new PDO( "mysql:host=$dbHost;dbname=$dbName;charset=utf8", $dbUser, $dbPass, [
					PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
					PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
				] );
			} catch( PDOException $e ) {
				die( "Erreur de connexion à la base de données: " . $e->getMessage() );
			}
		}
		
		/**
		 * @return Database
		 */
		public static function getInstance() : Database
		{
			if( self::$instance === null ) {
				self::$instance = new self();
			}
			return self::$instance;
		}
		
		/**
		 * @return PDO
		 */
		public function getPDO() : PDO
		{
			return $this->pdo;
		}
	}
