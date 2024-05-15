<?php

namespace App\Model;

use App\DAO\ModuleDAO;
use Exception;

class ModuleModel extends Model
{
    // Public attributes to represent the columns of the Avis table
    public $id_module, $label;

    // Method to get all records from the User table
    public function getAll()
    {
        try {
            // Create a ModuleDAO instance to access the data layer
            $dao = new ModuleDAO();
            // Call ModuleDAO selectAll() method to get all records
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
			// Create a ModuleDAO instance to access the data layer
			$dao = new ModuleDAO();
			// Call ModuleDAO selectAll() method to get all records
			// Results are stored in the $rows property
			$this->rows = $dao->select($id);
		} catch (Exception $e) {
			// Throws an exception in case of error during execution
			throw $e;
		}
	}

     // Method to insert a ModuleDAO record into the Users table
     public function insert()
     {
         try {
             // Create a new ModuleDAO instance to access the data layer
             $dao = new ModuleDAO();
             // Call the insert method of ModuleDAO and pass this UsersModel instance
             $dao->insert($this->label);
         } catch (Exception $e) {
             // Throws an exception in case of error during execution
             throw $e;
         }
     }
}