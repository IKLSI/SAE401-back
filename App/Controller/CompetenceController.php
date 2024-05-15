<?php

namespace App\Controller;

use App\Model\CompetenceModel;
use Exception;

class CompetenceController extends Controller
{
    // Static method that will be executed when the corresponding route is accessed
    public static function index(): void
    {
        // Create a new CompetenceModel instance to access the model layer
        $model = new CompetenceModel();
        
        // Call CompetenceModel getAll() method to get all records
        $model->getAll();
        
        // Sends the response in JSON format containing the records obtained
        parent::sendJSONResponse($model->rows);
    }

    public static function show(int $id): void
    {
        // Create a new CompetenceModel instance to access the model layer
        $model = new CompetenceModel();
        // Call CompetenceModel getAll() method to get all records
        $model->get($id);
        
        // Sends the response in JSON format containing the records obtained
        parent::sendJSONResponse($model->rows);
    }

    public function addCompetence()
    {
        $data = parent::receiveJSONRequest()[0];

        try {
            // Create a new CompetenceModel instance
            $comp = new CompetenceModel();

            // Assign data from the POST request to the CompetenceModel object
            $comp->id_semestre = $data['id_semestre'];
            $comp->label = $data['label'];

            // Call the insert method of CompetenceModel to insert the data into the database
            $comp->insert();
        } catch (Exception $e) {
            // Handle the exception (e.g., return an error response)
            return "Error: " . $e->getMessage();
        }
        
        // If everything is successful, return a success message or redirect to another page
        parent::sendJSONResponse("Competence added successfully!");
    }

    public static function delete(int $id): void
    {
        // Create a new CompetenceModel instance to access the model layer
        $model = new CompetenceModel();
        // Call CompetenceModel getAll() method to get all records
        $model->delete($id);
        
        // Sends the response in JSON format containing the records obtained
        parent::sendJSONResponse("Competence removed successfully!");
    }
}