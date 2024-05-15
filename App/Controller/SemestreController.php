<?php

namespace App\Controller;

use App\Model\SemestreModel;
use Exception;

class SemestreController extends Controller
{
    // Static method that will be executed when the corresponding route is accessed
    public static function index(): void
    {
        // Create a new SemestreModel instance to access the model layer
        $model = new SemestreModel();
        
        // Call AnneeModel getAll() method to get all records
        $model->getAll();
        
        // Sends the response in JSON format containing the records obtained
        parent::sendJSONResponse($model->rows);
    }

    public static function show(int $id): void
    {
        // Create a new SemestreModel instance to access the model layer
        $model = new SemestreModel();
        // Call SemestreModel getAll() method to get all records
        $model->get($id);
        
        // Sends the response in JSON format containing the records obtained
        parent::sendJSONResponse($model->rows);
    }

    public static function addSemestre()
    {
        $data = parent::receiveJSONRequest()[0];

        try {
            // Create a new SemestreModel instance
            $user = new SemestreModel();
			
            // Assign data from the POST request to the SemestreModel object
            $user->id_annee = $data['id_annee'];
            $user->label = $data['label'];

            // Call the insert method of SemestreModel to insert the data into the database
            $user->insert();
        } catch (Exception $e) {
            // Handle the exception (e.g., return an error response)
            return "Error: " . $e->getMessage();
        }
        
        // If everything is successful, return a success message or redirect to another page
        parent::sendJSONResponse("SemestreModel added successfully!");
    }

    public static function delete(int $id): void
    {
        // Create a new SemestreModel instance to access the model layer
        $model = new SemestreModel();
        // Call SemestreModel getAll() method to get all records
        $model->delete($id);
        
        // Sends the response in JSON format containing the records obtained
        parent::sendJSONResponse("SemestreModel removed successfully!");
    }
}