<?php

namespace App\Model;

use App\DAO\AvisDAO;
use Exception;

class AvisModel extends Model
{
    // Public attributes to represent the columns of the Avis table
    public $id_avis, $id_etu, $avis_master, $avis_inge;

    // Method to get all records from the User table
    public function getAll()
    {
        try {
            // Create a AvisDAO instance to access the data layer
            $dao = new AvisDAO();
            // Call AvisDAO selectAll() method to get all records
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
			// Create a AvisDAO instance to access the data layer
			$dao = new AvisDAO();
			// Call AvisDAO selectAll() method to get all records
			// Results are stored in the $rows property
			$this->rows = $dao->select($id);
		} catch (Exception $e) {
			// Throws an exception in case of error during execution
			throw $e;
		}
	}

    // Method to insert an AvisModel record into the Avis table
    public function insert()
    {
        try {
            // Create a new AvisDAO instance to access the data layer
            $dao = new AvisDAO();
            // Call the insert method of AvisDAO and pass this AvisModel instance
            $dao->insert($this->id_etu, $this->avis_master, $this->avis_inge);
        } catch (Exception $e) {
            // Throws an exception in case of error during execution
            throw $e;
        }
    }

    public function update()
    {
        try {
            // Create a new AvisDAO instance to access the data layer
            $dao = new AvisDAO();
            // Call the insert method of AvisDAO and pass this AvisModel instance
            $dao->update($this->id_avis, $this->avis_master, $this->avis_inge);
        } catch (Exception $e) {
            // Throws an exception in case of error during execution
            throw $e;
        }
    }

    public function delete(int $id)
	{
		try {
			// Create a AvisDAO instance to access the data layer
			$dao = new AvisDAO();
			// Call AvisDAO selectAll() method to get all records
			// Results are stored in the $rows property
			$this->rows = $dao->delete($id);
		} catch (Exception $e) {
			// Throws an exception in case of error during execution
			throw $e;
		}
	}
}