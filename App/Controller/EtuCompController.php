<?php

namespace App\Controller;

use App\Model\EtuCompModel;
use Exception;

class EtuCompController extends Controller
{
    // Static method that will be executed when the corresponding route is accessed
    public static function index(): void
    {
        // Create a new EtuCompModel instance to access the model layer
        $model = new EtuCompModel();
        
        // Call EtuCompModel getAll() method to get all records
        $model->getAll();
        
        // Sends the response in JSON format containing the records obtained
        parent::sendJSONResponse($model->rows);
    }

    public static function show(int $id): void
    {
        // Create a new EtuCompModel instance to access the model layer
        $model = new EtuCompModel();
        // Call EtuCompModel getAll() method to get all records
        $model->get($id);
        
        // Sends the response in JSON format containing the records obtained
        parent::sendJSONResponse($model->rows);
    }

    public static function addEtuComp()
    {
        $data = parent::receiveJSONRequest()[0];

        try {
            // Create a new UsersModel instance
            $user = new EtuCompModel();
			
            // Assign data from the POST request to the UsersModel object
            $user->id_etu = $data['id_etu'];
            $user->id_comp = $data['id_comp'];
            $user->moyenne_comp = $data['moyenne_comp'];
            $user->passage = $data['passage'];

            // Call the insert method of UsersModel to insert the data into the database
            $user->insert();
        } catch (Exception $e) {
            // Handle the exception (e.g., return an error response)
            return "Error: " . $e->getMessage();
        }
        
        // If everything is successful, return a success message or redirect to another page
        parent::sendJSONResponse("EtuComp added successfully!");
    }

    public static function delete(int $id): void
    {
        // Create a new EtuCompModel instance to access the model layer
        $model = new EtuCompModel();
        // Call EtuCompModel getAll() method to get all records
        $model->delete($id);
        
        // Sends the response in JSON format containing the records obtained
        parent::sendJSONResponse("EtuComp removed successfully!");
    }
}