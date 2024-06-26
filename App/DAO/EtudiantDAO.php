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

    public function selectByCode(int $id)
	{
		// Definition of the SQL query to select all records from the "Etudiant" table
		$sql = "SELECT * FROM Etudiant WHERE code_etu = :id";

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
    public function insert(int $id_etu, String $code_etu, String $nom_etu, String $prenom_etu, String $groupe_TD, String $groupe_TP, String $cursus, $alternant)
    {
        try {
            // Definition of the SQL query to insert a new record into the "Etudiant" table
            $sql = "INSERT INTO Etudiant (id_etu, code_etu, nom_etu, prenom_etu, groupe_TD, groupe_TP, cursus, alternant) 
                    VALUES (:id_etu, :code_etu, :nom_etu, :prenom_etu, :groupe_TD, :groupe_TP, :cursus, :alternant)";

            // Prepare SQL query using database connection
            $stmt = $this->conn->prepare($sql);
            
            // Bind parameters
            $stmt->bindValue(':id_etu', $id_etu);
            $stmt->bindValue(':code_etu', $code_etu);
            $stmt->bindValue(':nom_etu', $nom_etu);
            $stmt->bindValue(':prenom_etu', $prenom_etu);
            $stmt->bindValue(':groupe_TD', $groupe_TD);
            $stmt->bindValue(':groupe_TP', $groupe_TP);
            $stmt->bindValue(':cursus', $cursus);
            $stmt->bindValue(':alternant', $alternant);

            // Execute the prepared query
            $stmt->execute();
            return "Etudiant added successfully!";
        } catch (Exception $e) {
            // Throws an exception in case of error during execution
            throw $e;
        }
    }

    public function update(int $id_etu, String $nom_etu, String $prenom_etu, String $cursus, String $groupe_TD, String $groupe_TP, String $alternant)
    {
        try {
            // Definition of the SQL query to insert a new record into the "Etudiant" table
            if (is_null($cursus) || $cursus == "") {
                $sql = "UPDATE Etudiant SET nom_etu = :nom_etu, prenom_etu = :prenom_etu, groupe_TD = :groupe_TD, groupe_TP = :groupe_TP, alternant = :alternant
                    WHERE id_etu = :id_etu";
            } else {
                $sql = "UPDATE Etudiant SET nom_etu = :nom_etu, prenom_etu = :prenom_etu, groupe_TD = :groupe_TD, groupe_TP = :groupe_TP, alternant = :alternant, cursus = :cursus
                    WHERE id_etu = :id_etu";
            }
            
            // Prepare SQL query using database connection
            $stmt = $this->conn->prepare($sql);
            
            // Bind parameters
            $stmt->bindValue(':id_etu', $id_etu);
            $stmt->bindValue(':nom_etu', $nom_etu);
            $stmt->bindValue(':prenom_etu', $prenom_etu);
            $stmt->bindValue(':groupe_TD', $groupe_TD);
            $stmt->bindValue(':groupe_TP', $groupe_TP);
            $stmt->bindValue(':alternant', $alternant);
            
            if (!is_null($cursus) && $cursus != "") {
                $stmt->bindValue(':cursus', $cursus);
            }
            

            // Execute the prepared query
            $stmt->execute();

            return "Etudiant updated successfully!";
        } catch (Exception $e) {
            // Throws an exception in case of error during execution
            throw $e;
        }
    }

    public function delete(int $id)
	{
		// Definition of the SQL query to select all records from the "Etudiant" table
		$sql = "DELETE FROM Etudiant WHERE id_etu = :id";

		// Prepare SQL query using database connection
		$stmt = $this->conn->prepare($sql);

		// Bind the parameter :id to the value $id
		$stmt->bindValue(':id', $id);

		// Execute the prepared query
		$stmt->execute();

		// Returns all query results as class objects (based on DAO class)
		return "Etudiant removed successfully!";
	}
}