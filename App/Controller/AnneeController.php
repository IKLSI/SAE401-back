<?php

namespace App\Controller;

use App\Model\AnneeModel;
use Exception;

class AnneeController extends Controller
{
    // Static method that will be executed when the corresponding route is accessed
    public static function index(): void
    {
        // Create a new AnneeModel instance to access the model layer
        $model = new AnneeModel();
        
        // Call AnneeModel getAll() method to get all records
        $model->getAll();
        
        // Sends the response in JSON format containing the records obtained
        parent::sendJSONResponse($model->rows);
    }

    public static function show(int $id): void
    {
        // Create a new AnneeModel instance to access the model layer
        $model = new AnneeModel();
        // Call AnneeModel getAll() method to get all records
        $model->get($id);
        
        // Sends the response in JSON format containing the records obtained
        parent::sendJSONResponse($model->rows);
    }


    public function addAnnee()
    {
        $data = parent::receiveJSONRequest()[0];

        try {
            // Create a new AnneeModel instance
            $annee = new AnneeModel();

            // Assign data from the POST request to the AnneeModel object
            $annee->annee = $data['annee'];

            // Call the insert method of AnneeModel to insert the data into the database
            $annee->insert();
        } catch (Exception $e) {
            // Handle the exception (e.g., return an error response)
            return "Error: " . $e->getMessage();
        }
        
        // If everything is successful, return a success message or redirect to another page
        parent::sendJSONResponse("Annee added successfully!");
    }

    
    public static function delete(int $id): void
    {
        // Create a new AnneeModel instance to access the model layer
        $model = new AnneeModel();
        // Call AnneeModel getAll() method to get all records
        $model->delete($id);
        
        // Sends the response in JSON format containing the records obtained
        parent::sendJSONResponse("Annee removed successfully!");
    }
}