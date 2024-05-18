<?php

namespace App\Model;

use App\DAO\EtuCompDAO;
use Exception;

class EtuCompModel extends Model
{
    // Public attributes to represent the columns of the Avis table
    public $id_etu, $id_comp, $moyenne_comp, $passage, $bonus;

    // Method to get all records from the User table
    public function getAll()
    {
        try {
            // Create a EtuCompDAO instance to access the data layer
            $dao = new EtuCompDAO();
            // Call EtuCompDAO selectAll() method to get all records
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
			// Create a EtuCompDAO instance to access the data layer
			$dao = new EtuCompDAO();
			// Call EtuCompDAO selectAll() method to get all records
			// Results are stored in the $rows property
			$this->rows = $dao->select($id);
		} catch (Exception $e) {
			// Throws an exception in case of error during execution
			throw $e;
		}
	}

    // Method to insert a UsersModel record into the Users table
    public function insert()
    {
        try {
            // Create a new EtuCompDAO instance to access the data layer
            $dao = new EtuCompDAO();
            // Call the insert method of EtuCompDAO and pass this UsersModel instance
            $dao->insert($this->id_etu, $this->id_comp,$this->moyenne_comp,$this->passage, $this->bonus);
        } catch (Exception $e) {
            // Throws an exception in case of error during execution
            throw $e;
        }
    }


    public function update()
    {
        try {
            // Create a new EtuCompDAO instance to access the data layer
            $dao = new EtuCompDAO();
            // Call the insert method of EtuCompDAO and pass this UsersModel instance
            $dao->update($this->id_etu, $this->id_comp,$this->moyenne_comp,$this->passage, $this->bonus);
        } catch (Exception $e) {
            // Throws an exception in case of error during execution
            throw $e;
        }
    }

    public function updatePassage()
    {
        try {
            // Create a new EtuCompDAO instance to access the data layer
            $dao = new EtuCompDAO();
            // Call the insert method of EtuCompDAO and pass this UsersModel instance
            $dao->updatePassage($this->id_etu, $this->id_comp,$this->passage);
        } catch (Exception $e) {
            // Throws an exception in case of error during execution
            throw $e;
        }
    }


    public function delete(int $id)
	{
		try {
			// Create a EtuCompDAO instance to access the data layer
			$dao = new EtuCompDAO();
			// Call EtuCompDAO selectAll() method to get all records
			// Results are stored in the $rows property
			$this->rows = $dao->delete($id);
		} catch (Exception $e) {
			// Throws an exception in case of error during execution
			throw $e;
		}
	}
}