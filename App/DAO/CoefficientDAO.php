<?php

namespace App\DAO;
use Exception;
use App\Model\CoefficientModel;

class CoefficientDAO extends DAO
{
    // Constructor to initialize the CoefficientDAO object
    public function __construct()
    {
        // Call the parent class constructor (DAO) to initialize the database connection
        parent::__construct();
    }

    // Method to select all records from the "Coefficient" table
    public function selectAll()
    {
        // Definition of the SQL query to select all records from the "Coefficient" table
        $sql = "SELECT * FROM Coefficient";

        // Prepare SQL query using database connection
        $stmt = $this->conn->prepare($sql);

        // Execute the prepared query
        $stmt->execute();

        // Returns all query results as class objects (based on DAO class)
        return $stmt->fetchAll(DAO::FETCH_CLASS);
    }
	public function select(int $id)
	{
		// Definition of the SQL query to select all records from the "Coefficient" table
		$sql = "SELECT * FROM Coefficient WHERE id_coef = :id";

		// Prepare SQL query using database connection
		$stmt = $this->conn->prepare($sql);

		// Bind the parameter :id to the value $id
		$stmt->bindValue(':id', $id);

		// Execute the prepared query
		$stmt->execute();

		// Returns all query results as class objects (based on DAO class)
		return $stmt->fetchAll(DAO::FETCH_CLASS);
	}

    // Method to insert a new record into the "Coefficient" table
    public function insert(CoefficientModel $coef)
    {
        try {
            // Definition of the SQL query to insert a new record into the "Coefficient" table
            $sql = "INSERT INTO Coefficient (id_comp, id_module, coef) VALUES (:id_comp, :id_module, :coef)";
            
            // Prepare SQL query using database connection
            $stmt = $this->conn->prepare($sql);
            
            // Bind parameters
            $stmt->bindValue(':id_comp', $coef->id_comp);
            $stmt->bindValue(':id_module', $coef->id_module);
            $stmt->bindValue(':coef', $coef->coef);

            // Execute the prepared query
            $stmt->execute();

            // Close the statement
            $stmt->close();
        } catch (Exception $e) {
            // Throws an exception in case of error during execution
            throw $e;
        }
    }
}