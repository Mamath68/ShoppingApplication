<?php
	
	namespace App\Model\Entity;
	
	
	/**
	 * Class Entity du Users
	 */
	final class Users
	{
		/**
		 * @var int
		 */
		private int $id_user;
		/**
		 * @var string
		 */
		private string $name;
		/**
		 * @var string
		 */
		private string $email;
		/**
		 * @var string
		 */
		private string $password;
		
		/**
		 * @return int
		 */
		public function getId() : int
		{
			return $this->id_user;
		}
		
		/**
		 * @return string
		 */
		public function getName() : string
		{
			return $this->name;
		}
		
		/**
		 * @return string
		 */
		public function getEmail() : string
		{
			return $this->email;
		}
		
		/**
		 * @param int $id
		 *
		 * @return $this
		 */
		public function setId( int $id ) : self
		{
			$this->id_user = $id;
			return $this;
		}
		
		/**
		 * @param string $name
		 *
		 * @return $this
		 */
		public function setName( string $name ) : self
		{
			$this->name = $name;
			return $this;
		}
		
		/**
		 * @param string $email
		 *
		 * @return $this
		 */
		public function setEmail( string $email ) : self
		{
			$this->email = $email;
			return $this;
		}
		
		/**
		 * @return string
		 */
		public function getPassword() : string
		{
			return $this->password;
		}
		
		/**
		 * @param string $password
		 *
		 * @return void
		 */
		public function setPassword( string $password ) : void
		{
			$this->password = $password;
		}
		
		public function __toString() : string
		{
			return $this->id_user . ' ' . $this->name . ' ' . $this->email;
		}
	}
