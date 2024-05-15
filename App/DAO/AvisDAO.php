<?php

namespace App\DAO;
use Exception;
use App\Model\AvisModel;

class AvisDAO extends DAO
{
    // Constructor to initialize the AvisDAO object
    public function __construct()
    {
        // Call the parent class constructor (DAO) to initialize the database connection
        parent::__construct();
    }

    // Method to select all records from the "Avis" table
    public function selectAll()
    {
        // Definition of the SQL query to select all records from the "Avis" table
        $sql = "SELECT * FROM Avis";

        // Prepare SQL query using database connection
        $stmt = $this->conn->prepare($sql);

        // Execute the prepared query
        $stmt->execute();

        // Returns all query results as class objects (based on DAO class)
        return $stmt->fetchAll(DAO::FETCH_CLASS);
    }
	public function select(int $id)
	{
		// Definition of the SQL query to select all records from the "Avis" table
		$sql = "SELECT * FROM Avis WHERE id_avis = :id";

		// Prepare SQL query using database connection
		$stmt = $this->conn->prepare($sql);

		// Bind the parameter :id to the value $id
		$stmt->bindValue(':id', $id);

		// Execute the prepared query
		$stmt->execute();

		// Returns all query results as class objects (based on DAO class)
		return $stmt->fetchAll(DAO::FETCH_CLASS);
	}

    public function insert(int $id_etu, String $avis_master, String $avis_inge)
    {
        try {
            // Definition of the SQL query to insert a new record into the "Avis" table
            $sql = "INSERT INTO Avis (id_etu, avis_master, avis_inge) VALUES (:id_etu, :avis_master, :avis_inge)";
            
            // Prepare SQL query using database connection
            $stmt = $this->conn->prepare($sql);
            
            // Bind parameters
            $stmt->bindValue(':id_etu', $id_etu);
            $stmt->bindValue(':avis_master', $avis_master);
            $stmt->bindValue(':avis_inge', $avis_inge);

            // Execute the prepared query
            $stmt->execute();
            return "Avis added successfully!";
        } catch (Exception $e) {
            // Throws an exception in case of error during execution
            throw $e;
        }
    }

    public function delete(int $id)
	{
		// Definition of the SQL query to select all records from the "Avis" table
		$sql = "DELETE FROM Avis WHERE id_avis = :id";

		// Prepare SQL query using database connection
		$stmt = $this->conn->prepare($sql);

		// Bind the parameter :id to the value $id
		$stmt->bindValue(':id', $id);

		// Execute the prepared query
		$stmt->execute();

		// Returns all query results as class objects (based on DAO class)
		return $stmt->fetchAll(DAO::FETCH_CLASS);
	}

}