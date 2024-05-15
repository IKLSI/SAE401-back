<?php

namespace App\Model;

use App\DAO\AnneeDAO;
use Exception;

class AnneeModel extends Model
{
    // Public attributes to represent the columns of the Avis table
    public $id_annee, $annee;

    // Method to get all records from the User table
    public function getAll()
    {
        try {
            // Create a AnneeDAO instance to access the data layer
            $dao = new AnneeDAO();
            // Call AnneeDAO selectAll() method to get all records
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
			// Create a AnneeDAO instance to access the data layer
			$dao = new AnneeDAO();
			// Call AnneeDAO selectAll() method to get all records
			// Results are stored in the $rows property
			$this->rows = $dao->select($id);
		} catch (Exception $e) {
			// Throws an exception in case of error during execution
			throw $e;
		}
	}

    public function insert()
    {
        try {
            // Create a new AnneeDAO instance to access the data layer
            $dao = new AnneeDAO();
            // Call the insert method of AnneeDAO and pass this AnneeModel instance
            $dao->insert($this->annee);
        } catch (Exception $e) {
            // Throws an exception in case of error during execution
            throw $e;
        }
    }

    public function delete(int $id)
	{
		try {
			// Create a AnneeDAO instance to access the data layer
			$dao = new AnneeDAO();
			// Call AnneeDAO selectAll() method to get all records
			// Results are stored in the $rows property
			$this->rows = $dao->delete($id);
		} catch (Exception $e) {
			// Throws an exception in case of error during execution
			throw $e;
		}
	}

    
}