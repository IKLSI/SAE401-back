<?php

namespace App\DAO;
use Exception;
use App\Model\UsersModel;

class UsersDAO extends DAO
{
    // Constructor to initialize the UserDAO object
    public function __construct()
    {
        // Call the parent class constructor (DAO) to initialize the database connection
        parent::__construct();
    }

    // Method to select all records from the "User" table
    public function selectAll()
    {
        // Definition of the SQL query to select all records from the "User" table
        $sql = "SELECT * FROM Utilisateur";

        // Prepare SQL query using database connection
        $stmt = $this->conn->prepare($sql);

        // Execute the prepared query
        $stmt->execute();

        // Returns all query results as class objects (based on DAO class)
        return $stmt->fetchAll(DAO::FETCH_CLASS);
    }
	public function select(int $id)
	{
		// Definition of the SQL query to select all records from the "User" table
		$sql = "SELECT * FROM Utilisateur WHERE id_user = :id";

		// Prepare SQL query using database connection
		$stmt = $this->conn->prepare($sql);

		// Bind the parameter :id to the value $id
		$stmt->bindValue(':id', $id);

		// Execute the prepared query
		$stmt->execute();

		// Returns all query results as class objects (based on DAO class)
		return $stmt->fetchAll(DAO::FETCH_CLASS);
	}

    public function insert(String $login, String $password, int $isadmin)
    {
        try {
            // Definition of the SQL query to insert a new record into the "Users" table
            $sql = "INSERT INTO Utilisateur (login_user, password_user, isadmin) VALUES (:login, :password, :isadmin)";
            
            // Prepare SQL query using database connection
            $stmt = $this->conn->prepare($sql);
            
            // Bind parameters
			$stmt->bindValue(':login', $login);
            $stmt->bindValue(':password', $password);
            $stmt->bindValue(':isadmin', $isadmin);

            // Execute the prepared query
            $stmt->execute();
            return "User added successfully!";
        } catch (Exception $e) {
            // Throws an exception in case of error during execution
            throw $e;
        }
    }

    public function delete(int $id)
	{
		// Definition of the SQL query to select all records from the "User" table
		$sql = "DELETE FROM Utilisateur WHERE id_user = :id";

		// Prepare SQL query using database connection
		$stmt = $this->conn->prepare($sql);

		// Bind the parameter :id to the value $id
		$stmt->bindValue(':id', $id);

		// Execute the prepared query
		$stmt->execute();

		// Returns all query results as class objects (based on DAO class)
		return $stmt->fetchAll("User removed successfully!");
	}
	public function verifyUser($login,$password)
	{
		// Definition of the SQL query to select all records from the "User" table
		$sql = "SELECT * FROM Utilisateur WHERE login_user = :login";

		// Prepare SQL query using database connection
		$stmt = $this->conn->prepare($sql);

		// Bind the parameter :id to the value $id
		$stmt->bindValue(':login', $login);

		// Execute the prepared query
		$stmt->execute();

		// Returns all query results as class objects (based on DAO class)
		return $stmt->fetchAll(DAO::FETCH_CLASS);
	}
}