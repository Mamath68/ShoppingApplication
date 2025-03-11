<?php
	
	namespace App\Model\Manager;
	
	use App\Core\Database;
	use App\Model\Entity\Users;
	use Exception;
	use PDO;
	use PDOException;
	
	/**
	 * UserManager
	 */
	class UserManager
	{
		/**
		 * @var PDO
		 */
		private PDO $pdo;
		
		protected string $tableName = "users";
		
		public function __construct()
		{
			$this->pdo = Database::getInstance()->getPDO();
		}
		
		/**
		 * Récupère tous les utilisateurs avec une option de pagination
		 */
		public function getAllUsers() : array
		{
			$sql = "SELECT * FROM $this->tableName";
			
			$stmt = $this->pdo->prepare( $sql );
			
			$stmt->execute();
			$usersData = $stmt->fetchAll( PDO::FETCH_OBJ );
			$users = [];
			
			foreach( $usersData as $data ) {
				$users[] = ( new Users() )
					->setId( $data->id_user )
					->setName( $data->name )
					->setEmail( $data->email );
			}
			
			return $users;
		}
		
		/**
		 * Récupère un utilisateur par son ID
		 */
		public function getUserById( int $id_user ) : ?Users
		{
			$sql = "SELECT * FROM users WHERE id_user = :id_user"; // Assure-toi que c’est bien "users"
			$stmt = $this->pdo->prepare( $sql );
			$stmt->bindValue( ':id_user', $id_user, PDO::PARAM_INT );
			$stmt->execute();
			
			$data = $stmt->fetch( PDO::FETCH_OBJ );
			if( !$data ) {
				return null;
			}
			
			return ( new Users() )
				->setId( $data->id_user )
				->setName( $data->name )
				->setEmail( $data->email );
		}
		
		
		/**
		 * @param string $email
		 *
		 * @return mixed
		 */
		public function getUserByEmail( string $email ) : mixed
		{
			$stmt = $this->pdo->prepare( "SELECT * FROM $this->tableName WHERE email = :email" );
			$stmt->bindParam( ':email', $email );
			$stmt->execute();
			return $stmt->fetch( PDO::FETCH_OBJ );
		}
		
		/**
		 * Crée un nouvel utilisateur et retourne son ID
		 *
		 * @throws Exception
		 */
		public function createUser( string $name, string $email, string $password ) : int
		{
			try {
				// Vérification de l'encodage JSON
				if( json_last_error() !== JSON_ERROR_NONE ) {
					throw new Exception( 'Erreur lors de l\'encodage JSON: ' . json_last_error_msg() );
				}
				
				// Préparation et exécution de la requête SQL
				$stmt = $this->pdo->prepare( "INSERT INTO users (name, email, password) VALUES (:name, :email, :password)" );
				$stmt->execute( [
					'name' => $name,
					'email' => $email,
					'password' => password_hash( $password, PASSWORD_DEFAULT ),
				] );
				
				return (int) $this->pdo->lastInsertId();
			} catch( PDOException $e ) {
				throw new Exception( "Erreur lors de la création de l'utilisateur: " . $e->getMessage() );
			}
		}
		
		
		/**
		 * Mets à jour un utilisateur. Si un nouveau mot de passe est fourni, il est mis à jour.
		 *
		 * @throws Exception
		 */
		public function updateUser( int $id_user, string $name, string $email, ?string $password = null ) : void
		{
			try {
				if( $password ) {
					$stmt = $this->pdo->prepare( "UPDATE users SET name = :name, email = :email, password = :password WHERE id_user = :id_user" );
					$stmt->execute( [
						'name' => $name,
						'email' => $email,
						'password' => password_hash( $password, PASSWORD_DEFAULT ),
						'id_user' => $id_user
					] );
				} else {
					$stmt = $this->pdo->prepare( "UPDATE users SET name = :name, email = :email WHERE id_user = :id_user" );
					$stmt->execute( [
						'name' => $name,
						'email' => $email,
						'id_user' => $id_user
					] );
				}
			} catch( PDOException $e ) {
				throw new Exception( "Erreur lors de la mise à jour de l'utilisateur: " . $e->getMessage() );
			}
		}
		
		/**
		 * Supprime un utilisateur
		 *
		 * @throws Exception
		 */
		public function deleteUser( int $id_user ) : void
		{
			try {
				$stmt = $this->pdo->prepare( "DELETE FROM users WHERE id_user = :id_user" );
				$stmt->execute( ['id_user' => $id_user] );
			} catch( PDOException $e ) {
				throw new Exception( "Erreur lors de la suppression de l'utilisateur: " . $e->getMessage() );
			}
		}
	}
