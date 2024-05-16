<?php

namespace App\DAO;
use App\Model\FichierModel;
use Exception;

class FichierDAO extends DAO
{
    // Constructor to initialize the FichierDAO object
    public function __construct()
    {
        // Call the parent class constructor (DAO) to initialize the database connection
        parent::__construct();
    }

    // Method to select all records from the "Fichier" table
    public function selectAll()
    {
        // Definition of the SQL query to select all records from the "Fichier" table
        $sql = "SELECT * FROM Fichier";

        // Prepare SQL query using database connection
        $stmt = $this->conn->prepare($sql);

        // Execute the prepared query
        $stmt->execute();

        // Returns all query results as class objects (based on DAO class)
        return $stmt->fetchAll(DAO::FETCH_CLASS);
    }
	public function select(int $id)
	{
		// Definition of the SQL query to select all records from the "Fichier" table
		$sql = "SELECT * FROM Fichier WHERE id_fichier = :id";

		// Prepare SQL query using database connection
		$stmt = $this->conn->prepare($sql);

		// Bind the parameter :id to the value $id
		$stmt->bindValue(':id', $id);

		// Execute the prepared query
		$stmt->execute();

		// Returns all query results as class objects (based on DAO class)
		return $stmt->fetchAll(DAO::FETCH_CLASS);
	}

	// Method to insert a new record into the Fichier table
    public function insert($nom_fichier, $type, $id_annee, $id_semestre)
    {
        try {
            // Definition of the SQL query to insert a new record into the "Fichier" table
            $sql = "INSERT INTO Fichier (nom_fichier, type, id_annee, id_semestre) 
                    VALUES (:nom_fichier, :type, :id_annee, :id_semestre)";
            // Prepare SQL query using database connection
            $stmt = $this->conn->prepare($sql);
            
            // Bind parameters
            $stmt->bindValue(':nom_fichier', $nom_fichier);
            $stmt->bindValue(':type', $type);
            $stmt->bindValue(':id_annee', $id_annee);
            $stmt->bindValue(':id_semestre', $id_semestre);

            // Execute the prepared query
            $stmt->execute();
            return "Fichier added successfully!";
        } catch (Exception $e) {
            // Throws an exception in case of error during execution
            throw $e;
        }
    }

    public function update(int $id_fichier, String $nom_fichier)
    {
        try {
            // Definition of the SQL query to insert a new record into the "Etudiant" table
            $sql = "UPDATE Fichier SET nom_fichier = :nom_fichier
                    WHERE id_fichier = :id_fichier";
            
            // Prepare SQL query using database connection
            $stmt = $this->conn->prepare($sql);
            
            // Bind parameters
            $stmt->bindValue(':nom_fichier', $nom_fichier);
            $stmt->bindValue(':id_fichier', $id_fichier);

            // Execute the prepared query
            $stmt->execute();
            return "Fichier updated successfully!";
        } catch (Exception $e) {
            // Throws an exception in case of error during execution
            throw $e;
        }
    }

    public function delete(int $id)
	{
		// Definition of the SQL query to select all records from the "Fichier" table
		$sql = "DELETE FROM Fichier WHERE id_etu = :id";

		// Prepare SQL query using database connection
		$stmt = $this->conn->prepare($sql);

		// Bind the parameter :id to the value $id
		$stmt->bindValue(':id', $id);
        
		// Execute the prepared query
		$stmt->execute();

		// Returns all query results as class objects (based on DAO class)
		return "Fichier removed successfully!";
	}
}