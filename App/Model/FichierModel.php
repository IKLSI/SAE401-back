<?php

namespace App\Model;

use App\DAO\FichierDAO;
use Exception;

class FichierModel extends Model
{
    // Public attributes to represent the columns of the Fichier table
    public $id_fichier, $nom_fichier, $type, $id_annee, $id_semestre;

    // Method to get all records from the Fichier table
    public function getAll()
    {
        try {
            // Create a FichierDAO instance to access the data layer
            $dao = new FichierDAO();
            // Call FichierDAO selectAll() method to get all records
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
			// Create a FichierDAO instance to access the data layer
			$dao = new FichierDAO();
			// Call FichierDAO selectAll() method to get all records
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
            // Create a new FichierDAO instance to access the data layer
            $dao = new FichierDAO();
            // Call the insert method of FichierDAO and pass this EtudiantModel instance
            $dao->insert($this->nom_fichier, $this->type, $this->id_annee, $this->id_semestre);
        } catch (Exception $e) {
            // Throws an exception in case of error during execution
            throw $e;
        }
    }

    public function update()
    {
        try {
            // Create a new EtudiantDAO instance to access the data layer
            $dao = new FichierDAO();
            // Call the insert method of EtudiantDAO and pass this EtudiantModel instance
            $dao->update($this->id_fichier, $this->nom_fichier);
        } catch (Exception $e) {
            // Throws an exception in case of error during execution
            throw $e;
        }
    }

    public function delete(int $id)
	{
		try {
			// Create a FichierDAO instance to access the data layer
			$dao = new FichierDAO();
			// Call FichierDAO selectAll() method to get all records
			// Results are stored in the $rows property
			$this->rows = $dao->delete($id);
		} catch (Exception $e) {
			// Throws an exception in case of error during execution
			throw $e;
		}
	}
}