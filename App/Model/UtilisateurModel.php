<?php

namespace App\Model;

use App\DAO\UtilisateurDAO;
use Exception;

class UserModel extends Model
{
    // Public attributes to represent the columns of the User table
    public $id, $name;

    // Method to get all records from the User table
    public function getAll()
    {
        try {
            // Create a UserDAO instance to access the data layer
            $dao = new UtilisateurDAO();
            // Call UserDAO selectAll() method to get all records
            // Results are stored in the $rows property
            $this->rows = $dao->selectAll();
        } catch (Exception $e) {
            // Throws an exception in case of error during execution
            throw $e;
        }
    }
}