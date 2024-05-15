<?php

namespace App\DAO;
use Exception;

class EtuModuleDAO extends DAO
{
    // Constructor to initialize the EtuModuleDAO object
    public function __construct()
    {
        // Call the parent class constructor (DAO) to initialize the database connection
        parent::__construct();
    }

    // Method to select all records from the "EtuModule" table
    public function selectAll()
    {
        // Definition of the SQL query to select all records from the "EtuModule" table
        $sql = "SELECT * FROM EtuModule";

        // Prepare SQL query using database connection
        $stmt = $this->conn->prepare($sql);

        // Execute the prepared query
        $stmt->execute();

        // Returns all query results as class objects (based on DAO class)
        return $stmt->fetchAll(DAO::FETCH_CLASS);
    }
	public function select(int $id)
	{
		// Definition of the SQL query to select all records from the "EtuModule" table
		$sql = "SELECT * FROM EtuModule WHERE id_etu = :id";

		// Prepare SQL query using database connection
		$stmt = $this->conn->prepare($sql);

		// Bind the parameter :id to the value $id
		$stmt->bindValue(':id', $id);

		// Execute the prepared query
		$stmt->execute();

		// Returns all query results as class objects (based on DAO class)
		return $stmt->fetchAll(DAO::FETCH_CLASS);
	}

    public function insert(int $id_etu, int $id_coef, float $note)
    {
        try {
            // Definition of the SQL query to insert a new record into the "Users" table
            $sql = "INSERT INTO EtuModule (id_etu, id_coef, note) VALUES (:id_etu, :id_coef, :note)";
            
            // Prepare SQL query using database connection
            $stmt = $this->conn->prepare($sql);
            
            // Bind parameters
			$stmt->bindValue(':id_etu', $id_etu);
            $stmt->bindValue(':id_coef', $id_coef);
            $stmt->bindValue(':note', $note);

            // Execute the prepared query
            $stmt->execute();
            return "EtuModule added successfully!";
        } catch (Exception $e) {
            // Throws an exception in case of error during execution
            throw $e;
        }
    }

    public function update(int $id_etu, int $id_coef, float $note)
    {
        try {
            $sql = "UPDATE EtuModule SET note = :note
            WHERE id_etu = :id_etu AND id_coef=:id_coef";
            
            // Prepare SQL query using database connection
            $stmt = $this->conn->prepare($sql);
            
            // Bind parameters
			$stmt->bindValue(':id_etu', $id_etu);
            $stmt->bindValue(':id_coef', $id_coef);
            $stmt->bindValue(':note', $note);

            // Execute the prepared query
            $stmt->execute();
            return "EtuModule updated successfully!";
        } catch (Exception $e) {
            // Throws an exception in case of error during execution
            throw $e;
        }
    }
}