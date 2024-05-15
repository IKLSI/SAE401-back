<?php

namespace App\Model;

use App\DAO\CompetenceDAO;
use Exception;

class CompetenceModel extends Model
{
    // Public attributes to represent the columns of the Competence table
    public $id_comp, $id_semestre, $label;

    // Method to get all records from the User table
    public function getAll()
    {
        try {
            // Create a CompetenceDAO instance to access the data layer
            $dao = new CompetenceDAO();
            // Call CompetenceDAO selectAll() method to get all records
            // Results are stored in the $rows property
            $this->rows = $dao->selectAll();
        } catch (Exception $e) {
            // Throws an exception in case of error during execution
            throw $e;
        }
    }
	public function get(int $id)
	{
		try {
			// Create a CompetenceDAO instance to access the data layer
			$dao = new CompetenceDAO();
			// Call CompetenceDAO selectAll() method to get all records
			// Results are stored in the $rows property
			$this->rows = $dao->select($id);
		} catch (Exception $e) {
			// Throws an exception in case of error during execution
			throw $e;
		}
	}

    // Method to insert a CompetenceModel record into the Competence table
    public function insert()
    {
        try {
            // Create a new CompetenceDAO instance to access the data layer
            $dao = new CompetenceDAO();
            // Call the insert method of CompetenceDAO and pass this CompetenceModel instance
            $dao->insert($this->id_semestre, $this->label);
        } catch (Exception $e) {
            // Throws an exception in case of error during execution
            throw $e;
        }
    }

    public function delete(int $id)
	{
		try {
			// Create a CompetenceDAO instance to access the data layer
			$dao = new CompetenceDAO();
			// Call CompetenceDAO selectAll() method to get all records
			// Results are stored in the $rows property
			$this->rows = $dao->delete($id);
		} catch (Exception $e) {
			// Throws an exception in case of error during execution
			throw $e;
		}
	}
}