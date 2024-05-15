<?php

namespace App\Controller;

use App\Model\ModuleModel;
use Exception;

class ModuleController extends Controller
{
    // Static method that will be executed when the corresponding route is accessed
    public static function index(): void
    {
        // Create a new ModuleModel instance to access the model layer
        $model = new ModuleModel;
        
        // Call ModuleModel getAll() method to get all records
        $model->getAll();
        
        // Sends the response in JSON format containing the records obtained
        parent::sendJSONResponse($model->rows);
    }
	public static function show(int $id): void
    {
		
        // Create a new UserModel instance to access the model layer
        $model = new ModuleModel();
        // Call UsersModel getAll() method to get all records
        $model->get($id);
        
        // Sends the response in JSON format containing the records obtained
        parent::sendJSONResponse($model->rows);
    }

    public static function addModule()
    {
        $data = parent::receiveJSONRequest()[0];

        try {
            // Create a new ModuleModel instance
            $user = new ModuleModel();
			
            // Assign data from the POST request to the ModuleModel object
            $user->label = $data['label'];

            // Call the insert method of ModuleModel to insert the data into the database
            $user->insert();
        } catch (Exception $e) {
            // Handle the exception (e.g., return an error response)
            return "Error: " . $e->getMessage();
        }
        
        // If everything is successful, return a success message or redirect to another page
        parent::sendJSONResponse("User added successfully!");
    }
}