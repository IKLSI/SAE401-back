<?php

namespace App\Model;

use App\DAO\SemestreDAO;
use Exception;

class SemestreModel extends Model
{
    // Public attributes to represent the columns of the Avis table
    public $id_semestre, $label, $id_annee;

    // Method to get all records from the User table
    public function getAll()
    {
        try {
            // Create a SemestreDAO instance to access the data layer
            $dao = new SemestreDAO();
            // Call SemestreDAO selectAll() method to get all records
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
			// Create a SemestreDAO instance to access the data layer
			$dao = new SemestreDAO();
			// Call SemestreDAO selectAll() method to get all records
			// Results are stored in the $rows property
			$this->rows = $dao->select($id);
		} catch (Exception $e) {
			// Throws an exception in case of error during execution
			throw $e;
		}
	}

     // Method to insert a SemestreModel record into the Users table
     public function insert()
     {
         try {
             // Create a new SemestreDAO instance to access the data layer
             $dao = new SemestreDAO();
             // Call the insert method of SemestreDAO and pass this SemestreModel instance
             $dao->insert($this->label, $this->id_annee);
         } catch (Exception $e) {
             // Throws an exception in case of error during execution
             throw $e;
         }
     }
}