<?php

namespace App\Controller;

use App\Model\UsersModel;
use Exception;

class UsersController extends Controller
{
    // Static method that will be executed when the corresponding route is accessed
    public static function getAll(): void
    {
        // Create a new UserModel instance to access the model layer
        $model = new UsersModel();
        
        // Call UsersModel getAll() method to get all records
        $model->getAll();
		
        // Sends the response in JSON format containing the records obtained
        parent::sendJSONResponse($model->rows);
    }
    public static function get(int $id): void
    {
		
        // Create a new UserModel instance to access the model layer
        $model = new UsersModel();
        // Call UsersModel getAll() method to get all records
        $model->get($id);
        
        // Sends the response in JSON format containing the records obtained
        parent::sendJSONResponse($model->rows);
    }

    public static function addUser()
    {
        $data = parent::receiveJSONRequest()[0];
		
		
        try {
            // Create a new UsersModel instance
            $user = new UsersModel();
			
            // Assign data from the POST request to the UsersModel object
            $user->login = $data['login_user'];
            $user->password = $data['password_user'];
            $user->isadmin = $data['isadmin'];

            // Call the insert method of UsersModel to insert the data into the database
            $user->insert();
        } catch (Exception $e) {
            // Handle the exception (e.g., return an error response)
            return "Error: " . $e->getMessage();
        }
        
        // If everything is successful, return a success message or redirect to another page
        parent::sendJSONResponse("User added successfully!");
    }
}