<?php

namespace App\Model;

use App\DAO\UsersDAO;
use App\DAO\UtilisateurDAO;
use Exception;
use Ramsey\Uuid\Uuid;

class UsersModel extends Model
{
	// Public attributes to represent the columns of the User table
	public $id, $login, $password, $isadmin, $uuid;

	// Method to get all records from the User table
	public function getAll()
	{
		try {
			// Create a UserDAO instance to access the data layer
			$dao = new UsersDAO();
			// Call UserDAO selectAll() method to get all records
			// Results are stored in the $rows property

			$this->rows = $dao->selectAll();
		} catch (Exception $e) {
			// Throws an exception in case of error during execution
			throw $e;
		}
	}
	public function get(int $id)
	{
		try {
			// Create a UserDAO instance to access the data layer
			$dao = new UsersDAO();
			// Call UserDAO selectAll() method to get all records
			// Results are stored in the $rows property
			$this->rows = $dao->select($id);
		} catch (Exception $e) {
			// Throws an exception in case of error during execution
			throw $e;
		}
	}

	// Method to insert a UsersModel record into the Users table
	public function insert()
	{
		try {
			// Create a new UsersDAO instance to access the data layer
			$dao = new UsersDAO();
			// Call the insert method of UsersDAO and pass this UsersModel instance
			$dao->insert($this->login, $this->password, $this->isadmin);
		} catch (Exception $e) {
			// Throws an exception in case of error during execution
			throw $e;
		}
	}

	public function delete(int $id)
	{
		try {
			// Create a UserDAO instance to access the data layer
			$dao = new UsersDAO();
			// Call UserDAO selectAll() method to get all records
			// Results are stored in the $rows property
			$this->rows = $dao->delete($id);
		} catch (Exception $e) {
			// Throws an exception in case of error during execution
			throw $e;
		}
	}
	public function verifyUser()
	{
		if (isset($_SERVER['PHP_AUTH_USER'])  && isset($_SERVER['PHP_AUTH_PW']) ) {
			$login = $_SERVER['PHP_AUTH_USER'];
			$password = $_SERVER['PHP_AUTH_PW'];
			try {
				// Create a UserDAO instance to access the data layer
				$dao = new UsersDAO();
				// Call UserDAO selectAll() method to get all records
				// Results are stored in the $rows property
				$this->rows = $dao->verifyUser($login);
				if (password_verify($password, $this->rows[0]->password_user)) {
					$this->id = $this->rows[0]->id_user;
					$this->login = $this->rows[0]->login_user;
					$this->isadmin = $this->rows[0]->isadmin;
					$this->uuid = $dao->updateUuid($this->id, Uuid::uuid7());
				}

			} catch (Exception $e) {
				// Throws an exception in case of error during execution
				throw $e;
			}
		} else {
			$uuid = $_SERVER['HTTP_AUTHORIZATION'];
			try {
				// Create a UserDAO instance to access the data layer
				$dao = new UsersDAO();
				$this->rows = $dao->verifyUuid($uuid);
				if ($this->rows) {
					$login = $this->rows[0]->login_user;
					$password = $this->rows[0]->password_user;
					$this->id = $this->rows[0]->id_user;
					$this->uuid = $this->rows[0]->uuid_user;
					$this->isadmin = $this->rows[0]->isadmin;
				}
			} catch (Exception $e) {
				// Throws an exception in case of error during execution
				throw $e;
			}
		}

	}
}