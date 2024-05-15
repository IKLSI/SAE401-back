<?php

namespace App\DAO;
use App\Model\EtudiantModel;
use Exception;

class EtudiantDAO extends DAO
{
    // Constructor to initialize the EtudiantDAO object
    public function __construct()
    {
        // Call the parent class constructor (DAO) to initialize the database connection
        parent::__construct();
    }

    // Method to select all records from the "Etudiant" table
    public function selectAll()
    {
        // Definition of the SQL query to select all records from the "Etudiant" table
        $sql = "SELECT * FROM Etudiant";

        // Prepare SQL query using database connection
        $stmt = $this->conn->prepare($sql);

        // Execute the prepared query
        $stmt->execute();

        // Returns all query results as class objects (based on DAO class)
        return $stmt->fetchAll(DAO::FETCH_CLASS);
    }
	public function select(int $id)
	{
		// Definition of the SQL query to select all records from the "Etudiant" table
		$sql = "SELECT * FROM Etudiant WHERE id_etu = :id";

		// Prepare SQL query using database connection
		$stmt = $this->conn->prepare($sql);

		// Bind the parameter :id to the value $id
		$stmt->bindValue(':id', $id);

		// Execute the prepared query
		$stmt->execute();

		// Returns all query results as class objects (based on DAO class)
		return $stmt->fetchAll(DAO::FETCH_CLASS);
	}

	// Method to insert a new record into the Etudiant table
    public function insert(EtudiantModel $etudiant)
    {
        try {
            // Definition of the SQL query to insert a new record into the "Etudiant" table
            $sql = "INSERT INTO Etudiant (code_etu, nom_etu, prenom_etu, groupe_TD, groupe_TP, cursus, alternant) 
                    VALUES (:code_etu, :nom_etu, :prenom_etu, :groupe_TD, :groupe_TP, :cursus, :alternant)";
            
            // Prepare SQL query using database connection
            $stmt = $this->conn->prepare($sql);
            
            // Bind parameters
            $stmt->bindValue(':code_etu', $etudiant->code_etu);
            $stmt->bindValue(':nom_etu', $etudiant->nom_etu);
            $stmt->bindValue(':prenom_etu', $etudiant->prenom_etu);
            $stmt->bindValue(':groupe_TD', $etudiant->groupe_TD);
            $stmt->bindValue(':groupe_TP', $etudiant->groupe_TP);
            $stmt->bindValue(':cursus', $etudiant->cursus);
            $stmt->bindValue(':alternant', $etudiant->alternant);

            // Execute the prepared query
            $stmt->execute();

        } catch (Exception $e) {
            // Throws an exception in case of error during execution
            throw $e;
        }
    }
}