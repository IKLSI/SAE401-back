<?php

namespace App\DAO;
use Exception;

class SemestreDAO extends DAO
{
    // Constructor to initialize the EtudiantDAO object
    public function __construct()
    {
        // Call the parent class constructor (DAO) to initialize the database connection
        parent::__construct();
    }

    // Method to select all records from the "Semestre" table
    public function selectAll()
    {
        // Definition of the SQL query to select all records from the "Semestre" table
        $sql = "SELECT * FROM Semestre";

        // Prepare SQL query using database connection
        $stmt = $this->conn->prepare($sql);

        // Execute the prepared query
        $stmt->execute();

        // Returns all query results as class objects (based on DAO class)
        return $stmt->fetchAll(DAO::FETCH_CLASS);
    }
	public function select(int $id)
	{
		// Definition of the SQL query to select all records from the "Semestre" table
		$sql = "SELECT * FROM Semestre WHERE id_semestre = :id";

		// Prepare SQL query using database connection
		$stmt = $this->conn->prepare($sql);

		// Bind the parameter :id to the value $id
		$stmt->bindValue(':id', $id);

		// Execute the prepared query
		$stmt->execute();

		// Returns all query results as class objects (based on DAO class)
		return $stmt->fetchAll(DAO::FETCH_CLASS);
	}

    public function insert(String $label, int $id_annee)
    {
        try {
            // Definition of the SQL query to insert a new record into the "Users" table
            $sql = "INSERT INTO Semestre (label, id_annee) VALUES (:label, :id_annee)";
            
            // Prepare SQL query using database connection
            $stmt = $this->conn->prepare($sql);
            
            // Bind parameters
			$stmt->bindValue(':label', $label);
            $stmt->bindValue(':id_annee', $id_annee);

            // Execute the prepared query
            $stmt->execute();
            return "Semestre added successfully!";
        } catch (Exception $e) {
            // Throws an exception in case of error during execution
            throw $e;
        }
    }

    public function delete(int $id)
	{
		// Definition of the SQL query to select all records from the "Semestre" table
		$sql = "DELETE FROM Semestre WHERE id_semestre = :id";

		// Prepare SQL query using database connection
		$stmt = $this->conn->prepare($sql);

		// Bind the parameter :id to the value $id
		$stmt->bindValue(':id', $id);

		// Execute the prepared query
		$stmt->execute();

		// Returns all query results as class objects (based on DAO class)
		return $stmt->fetchAll("Semestre removed successfully!");
	}
}