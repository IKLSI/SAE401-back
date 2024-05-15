<?php

namespace App\Model;

use App\DAO\EtuSemestreDAO;
use Exception;

class EtuSemestreModel extends Model
{
    // Public attributes to represent the columns of the Avis table
    public $id_etu, $id_semestre, $absences, $rang, $moyenne;

    // Method to get all records from the User table
    public function getAll()
    {
        try {
            // Create a EtuSemestreDAO instance to access the data layer
            $dao = new EtuSemestreDAO();
            // Call EtuSemestreDAO selectAll() method to get all records
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
			// Create a EtuSemestreDAO instance to access the data layer
			$dao = new EtuSemestreDAO();
			// Call EtuSemestreDAO selectAll() method to get all records
			// Results are stored in the $rows property
			$this->rows = $dao->select($id);
		} catch (Exception $e) {
			// Throws an exception in case of error during execution
			throw $e;
		}
	}
}