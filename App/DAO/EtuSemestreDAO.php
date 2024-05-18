<?php

namespace App\DAO;
use Exception;

class EtuSemestreDAO extends DAO
{
    // Constructor to initialize the EtuSemestreDAO object
    public function __construct()
    {
        // Call the parent class constructor (DAO) to initialize the database connection
        parent::__construct();
    }

    // Method to select all records from the "EtuSemestre" table
    public function selectAll()
    {
        // Definition of the SQL query to select all records from the "EtuSemestre" table
        $sql = "SELECT * FROM EtuSemestre";

        // Prepare SQL query using database connection
        $stmt = $this->conn->prepare($sql);

        // Execute the prepared query
        $stmt->execute();

        // Returns all query results as class objects (based on DAO class)
        return $stmt->fetchAll(DAO::FETCH_CLASS);
    }
	public function select(int $id)
	{
		// Definition of the SQL query to select all records from the "EtuSemestre" table
		$sql = "SELECT * FROM EtuSemestre WHERE id_etu = :id";

		// Prepare SQL query using database connection
		$stmt = $this->conn->prepare($sql);

		// Bind the parameter :id to the value $id
		$stmt->bindValue(':id', $id);

		// Execute the prepared query
		$stmt->execute();

		// Returns all query results as class objects (based on DAO class)
		return $stmt->fetchAll(DAO::FETCH_CLASS);
	}

    public function insert(int $id_etu, int $id_semestre, int $absences, int $rang, float $moyenne, String $validation)
    {
        try {
            // Definition of the SQL query to insert a new record into the "Users" table
            $sql = "INSERT INTO EtuSemestre (id_etu, id_semestre, absences, rang, moyenne, validation) VALUES (:id_etu, :id_semestre, :absences, :rang, :moyenne, :validation)";
            // Prepare SQL query using database connection
            $stmt = $this->conn->prepare($sql);
            
            // Bind parameters
			$stmt->bindValue(':id_etu', $id_etu);
            $stmt->bindValue(':id_semestre', $id_semestre);
            $stmt->bindValue(':absences', $absences);
            $stmt->bindValue(':rang', $rang);
            $stmt->bindValue(':moyenne', $moyenne);
            $stmt->bindValue(':validation', $validation);

            // Execute the prepared query
            $stmt->execute();
            return "EtuSemestre added successfully!";
        } catch (Exception $e) {
            // Throws an exception in case of error during execution
            throw $e;
        }
    }

    public function update(int $id_etu, int $id_semestre, int $absences, int $rang, float $moyenne, String $validation)
    {
        try {
            // Definition of the SQL query to insert a new record into the "Users" table
            $sql = "UPDATE EtuSemestre absences=:absences, rang=:rang, moyenne=:moyenne, validation=:validation
                    WHERE id_etu=:id_etu and id_semestre=:id_semestre";
            // Prepare SQL query using database connection
            $stmt = $this->conn->prepare($sql);
            
            // Bind parameters
			$stmt->bindValue(':id_etu', $id_etu);
            $stmt->bindValue(':id_semestre', $id_semestre);
            $stmt->bindValue(':absences', $absences);
            $stmt->bindValue(':rang', $rang);
            $stmt->bindValue(':moyenne', $moyenne);
            $stmt->bindValue(':validation', $validation);

            // Execute the prepared query
            $stmt->execute();
            return "EtuSemestre updated successfully!";
        } catch (Exception $e) {
            // Throws an exception in case of error during execution
            throw $e;
        }
    }

    public function updateValidation(int $id_etu, int $id_semestre, String $validation)
    {
        try {
            // Definition of the SQL query to insert a new record into the "Users" table
            $sql = "UPDATE EtuSemestre validation=:validation
                    WHERE id_etu=:id_etu and id_semestre=:id_semestre";
            // Prepare SQL query using database connection
            $stmt = $this->conn->prepare($sql);
            
            // Bind parameters
			$stmt->bindValue(':id_etu', $id_etu);
            $stmt->bindValue(':id_semestre', $id_semestre);
            $stmt->bindValue(':validation', $validation);

            // Execute the prepared query
            $stmt->execute();
            return "EtuSemestre updated successfully!";
        } catch (Exception $e) {
            // Throws an exception in case of error during execution
            throw $e;
        }
    }

    public function delete(int $id)
	{
		// Definition of the SQL query to select all records from the "EtuSemestre" table
		$sql = "DELETE FROM EtuSemestre WHERE id_etu = :id";

		// Prepare SQL query using database connection
		$stmt = $this->conn->prepare($sql);

		// Bind the parameter :id to the value $id
		$stmt->bindValue(':id', $id);

		// Execute the prepared query
		$stmt->execute();

		// Returns all query results as class objects (based on DAO class)
		return $stmt->fetchAll("EtuSemestre removed successfully!");
	}
}