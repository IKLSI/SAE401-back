<?php

namespace App\Model;

use App\DAO\EtuModuleDAO;
use Exception;

class EtuModuleModel extends Model
{
    // Public attributes to represent the columns of the Avis table
    public $id_etu, $id_coef, $note;

    // Method to get all records from the User table
    public function getAll()
    {
        try {
            // Create a EtuModuleDAO instance to access the data layer
            $dao = new EtuModuleDAO();
            // Call EtuModuleDAO selectAll() method to get all records
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
			// Create a EtuModuleDAO instance to access the data layer
			$dao = new EtuModuleDAO();
			// Call EtuModuleDAO selectAll() method to get all records
			// Results are stored in the $rows property
			$this->rows = $dao->select($id);
		} catch (Exception $e) {
			// Throws an exception in case of error during execution
			throw $e;
		}
	}

    // Method to insert a EtuModuleDAO record into the Users table
    public function insert()
    {
        try {
            // Create a new UsersDAO instance to access the data layer
            $dao = new EtuModuleDAO();
            // Call the insert method of EtuModuleDAO and pass this UsersModel instance
            $dao->insert($this->id_etu, $this->id_coef,$this->note);
        } catch (Exception $e) {
            // Throws an exception in case of error during execution
            throw $e;
        }
    }

    // Method to update a EtuModuleDAO record into the Users table
    public function update()
    {
        try {
            // Create a new UsersDAO instance to access the data layer
            $dao = new EtuModuleDAO();
            // Call the insert method of EtuModuleDAO and pass this UsersModel instance
            $dao->update($this->id_etu, $this->id_coef,$this->note);
        } catch (Exception $e) {
            // Throws an exception in case of error during execution
            throw $e;
        }
    }

    public function delete(int $id)
	{
		try {
			// Create a EtuModuleDAO instance to access the data layer
			$dao = new EtuModuleDAO();
			// Call EtuModuleDAO selectAll() method to get all records
			// Results are stored in the $rows property
			$this->rows = $dao->delete($id);
		} catch (Exception $e) {
			// Throws an exception in case of error during execution
			throw $e;
		}
	}
}