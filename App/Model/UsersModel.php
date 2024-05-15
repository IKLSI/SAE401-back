<?php

namespace App\Model;

use App\DAO\UsersDAO;
use App\DAO\UtilisateurDAO;
use Exception;

class UsersModel extends Model
{
    // Public attributes to represent the columns of the User table
    public $id, $login, $password,$isadmin;

    // Method to get all records from the User table
    public function getAll()
    {
        try {
            // Create a UserDAO instance to access the data layer
            $dao = new UsersDAO();
            // Call UserDAO selectAll() method to get all records
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
			// Create a UserDAO instance to access the data layer
			$dao = new UsersDAO();
			// Call UserDAO selectAll() method to get all records
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
             // Create a new UsersDAO instance to access the data layer
             $dao = new UsersDAO();
             // Call the insert method of UsersDAO and pass this UsersModel instance
             $dao->insert($this);
         } catch (Exception $e) {
             // Throws an exception in case of error during execution
             throw $e;
         }
     }
}