<?php

namespace App\Controller;

use App\Model\AvisModel;
use Exception;

class AvisController extends Controller
{
    // Static method that will be executed when the corresponding route is accessed
    public static function index(): void
    {
        // Create a new AvisModel instance to access the model layer
        $model = new AvisModel();
        
        // Call AvisModel getAll() method to get all records
        $model->getAll();
        
        // Sends the response in JSON format containing the records obtained
        parent::sendJSONResponse($model->rows);
    }

    public static function show(int $id): void
    {
        // Create a new AvisModel instance to access the model layer
        $model = new AvisModel();
        // Call AvisModel getAll() method to get all records
        $model->get($id);
        
        // Sends the response in JSON format containing the records obtained
        parent::sendJSONResponse($model->rows);
    }

    // Method to handle a POST request to add a new Avis
    public function addAvis()
    {
        $data = parent::receiveJSONRequest()[0];
        try {
            // Create a new AvisModel instance
            $avis = new AvisModel();

            // Assign data from the POST request to the AvisModel object
            $avis->id_etu = $data['id_etu'];
            $avis->avis_master = $data['avis_master'];
            $avis->avis_inge = $data['avis_inge'];

            // Call the insert method of AvisModel to insert the data into the database
            $avis->insert();
        } catch (Exception $e) {
            // Handle the exception (e.g., return an error response)
            return "Error: " . $e->getMessage();
        }
        
        // If everything is successful, return a success message or redirect to another page
        parent::sendJSONResponse("Avis added successfully!");
    }
}