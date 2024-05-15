<?php

namespace App\Model;

use App\DAO\EtudiantDAO;
use Exception;

class EtudiantModel extends Model
{
    // Public attributes to represent the columns of the Avis table
    public $id_etu, $code_etu, $nom_etu, $prenom_etu, $groupe_TD, $groupe_TP, $cursus, $alternant;

    // Method to get all records from the User table
    public function getAll()
    {
        try {
            // Create a EtudiantDAO instance to access the data layer
            $dao = new EtudiantDAO();
            // Call EtudiantDAO selectAll() method to get all records
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
			// Create a EtudiantDAO instance to access the data layer
			$dao = new EtudiantDAO();
			// Call EtudiantDAO selectAll() method to get all records
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
            // Create a new EtudiantDAO instance to access the data layer
            $dao = new EtudiantDAO();
            // Call the insert method of EtudiantDAO and pass this EtudiantModel instance
            $dao->insert($this->code_etu, $this->nom_etu, $this->prenom_etu, $this->groupe_TD, $this->groupe_TP, $this->cursus, $this->alternant);
        } catch (Exception $e) {
            // Throws an exception in case of error during execution
            throw $e;
        }
    }

    public function update()
    {
        try {
            // Create a new EtudiantDAO instance to access the data layer
            $dao = new EtudiantDAO();
            // Call the insert method of EtudiantDAO and pass this EtudiantModel instance
            $dao->update($this->id_etu, $this->nom_etu, $this->prenom_etu, $this->groupe_TD, $this->groupe_TP, $this->cursus, $this->alternant);
        } catch (Exception $e) {
            // Throws an exception in case of error during execution
            throw $e;
        }
    }

    public function delete(int $id)
	{
		try {
			// Create a EtudiantDAO instance to access the data layer
			$dao = new EtudiantDAO();
			// Call EtudiantDAO selectAll() method to get all records
			// Results are stored in the $rows property
			$this->rows = $dao->delete($id);
		} catch (Exception $e) {
			// Throws an exception in case of error during execution
			throw $e;
		}
	}
}