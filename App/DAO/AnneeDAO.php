<?php

namespace App\DAO;
use Exception;
use App\Model\AnneeModel;

class AnneeDAO extends DAO
{
    // Constructor to initialize the EtudiantDAO object
    public function __construct()
    {
        // Call the parent class constructor (DAO) to initialize the database connection
        parent::__construct();
    }

    // Method to select all records from the "Annee" table
    public function selectAll()
    {
        // Definition of the SQL query to select all records from the "Annee" table
        $sql = "SELECT * FROM Annee";

        // Prepare SQL query using database connection
        $stmt = $this->conn->prepare($sql);

        // Execute the prepared query
        $stmt->execute();

        // Returns all query results as class objects (based on DAO class)
        return $stmt->fetchAll(DAO::FETCH_CLASS);
    }
	public function select(int $id)
	{
		// Definition of the SQL query to select all records from the "Annee" table
		$sql = "SELECT * FROM Annee WHERE id_annee = :id";

		// Prepare SQL query using database connection
		$stmt = $this->conn->prepare($sql);

		// Bind the parameter :id to the value $id
		$stmt->bindValue(':id', $id);

		// Execute the prepared query
		$stmt->execute();

		// Returns all query results as class objects (based on DAO class)
		return $stmt->fetchAll(DAO::FETCH_CLASS);
	}

    public function insert(String $annee)
    {
        try {
            // Definition of the SQL query to insert a new record into the "Annee" table
            $sql = "INSERT INTO Annee (annee) VALUES (:annee)";
            
            // Prepare SQL query using database connection
            $stmt = $this->conn->prepare($sql);
            
            // Bind parameters
            $stmt->bindValue(':annee', $annee);

            // Execute the prepared query
            $stmt->execute();
            return "Annee added successfully!";
        } catch (Exception $e) {
            // Throws an exception in case of error during execution
            throw $e;
        }
    }

    public function delete(int $id)
	{
		// Definition of the SQL query to select all records from the "Annee" table
		$sql = "DELETE FROM Annee WHERE id_annee = :id";

		// Prepare SQL query using database connection
		$stmt = $this->conn->prepare($sql);

		// Bind the parameter :id to the value $id
		$stmt->bindValue(':id', $id);

		// Execute the prepared query
		$stmt->execute();

		// Returns all query results as class objects (based on DAO class)
		return $stmt->fetchAll("Annee removed successfully!");
	}
}